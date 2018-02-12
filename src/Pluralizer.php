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
        'mathematics'
    ];

    private $word;

    public function __construct(string $word)
    {
        $this->word = $word;
    }

    public function pluralize()
    {
        if ($this->isUncountable()) {
            return $this->word;
        }

        foreach($this->irregular as $singular => $plural) {
            if ($singular==$this->word) {
                return $plural;
            }
        }

        return Inflector::pluralize($this->word);
    }

    public function singularize()
    {
        if ($this->isUncountable()) {
            return $this->word;
        }

        foreach($this->irregular as $singular => $plural) {
            if ($plural==$this->word) {
                return $singular;
            }
        }        

        return Inflector::singularize($this->word);
    }

    private function isUncountable()
    {
        return (in_array($this->word, $this->uncountable));
    }
}