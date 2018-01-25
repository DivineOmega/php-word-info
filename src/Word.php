<?php
namespace DivineOmega\WordInfo;

use rapidweb\RWFileCache\RWFileCache;


class Word {

    private $word;
    private $cache;

    public function __construct(string $word)
    {
        $this->word = $word;
        $this->setupCache();
    }

    public function __toString()
    {
        return $this->word;
    }

    private function setupCache()
    {
        $this->cache = new RWFileCache;
        $this->cache->changeConfig(['cacheDirectory' => '/tmp/php-word-info-cache/']);
    }

    public function rhymes($halfRhymes = false)
    {
        $cacheKey = $this->word.'.rhymes';

        if ($halfRhymes) {
            $cacheKey = $this->word.'.halfRhymes';
        }

        $value = $this->cache->get($cacheKey);

        if ($value) {
            return $value;
        }

        $response = file_get_contents('http://rhymebrain.com/talk?function=getRhymes&word='.urlencode($this->word));
        $responseItems = json_decode($response);

        $rhymes = [];

        foreach($responseItems as $responseItem) {
            if ($halfRhymes) {
                if ($responseItem->score < 300) {
                    $rhymes[] = new Word($responseItem->word);
                }
            } else {
              if($responseItem->score == 300) {
                $rhymes[] = new Word($responseItem->word);
              }
            }
        }

        sort($rhymes);

        $this->cache->set($cacheKey, $rhymes);
        
        return $rhymes;
    }

    public function halfRhymes()
    {
        return $this->rhymes(true);
    }

}