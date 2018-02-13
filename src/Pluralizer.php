<?php

namespace DivineOmega\WordInfo;

use Doctrine\Common\Inflector\Inflector;

class Pluralizer
{
    private $irregular = [
        'goose' => 'geese',
    ];

    private $uncountable = [
        'audio',
        'education',
        'love',
        'pokemon',
        'mathematics',
    ];

    private $word;

    public function __construct(Word $word)
    {
        $this->word = $word;
    }

    public function pluralize()
    {
        if ($this->isUncountable()) {
            return new Word($this->word);
        }

        foreach ($this->irregular as $singular => $plural) {
            if ($singular == $this->word) {
                return new Word($plural);
            }
        }

        $plural = Inflector::pluralize((string) $this->word);

        return new Word($plural);
    }

    public function singularize()
    {
        if ($this->isUncountable()) {
            return new Word($this->word);
        }

        foreach ($this->irregular as $singular => $plural) {
            if ($plural == $this->word) {
                return new Word($singular);
            }
        }

        $singular = Inflector::singularize((string) $this->word);

        return new Word($singular);
    }

    private function isUncountable()
    {
        return in_array($this->word, $this->uncountable);
    }
}
