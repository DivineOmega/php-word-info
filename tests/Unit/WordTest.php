<?php

use PHPUnit\Framework\TestCase;
use DivineOmega\WordInfo\Word;

final class WordTest extends TestCase
{
    public function testRhymes()
    {
        $rhymes = (new Word('cat'))->rhymes();

        $expected = ['aristocrat', 'at', 'bat', 'caveat', 'chat', 'democrat', 'diplomat', 
                    'fat', 'flat', 'habitat', 'hat', 'mat', 'pat', 'rat', 'sat', 'spat', 
                    'stat', 'tat', 'that', 'thermostat', 'vat'];

        $this->assertEquals($expected, $rhymes);
    }

    public function testHalfRhymes()
    {
        $rhymes = (new Word('violet'))->halfRhymes();

        $expected = ['cyclist', 'finalist', 'hybridised', 'iodised', 'ionised', 'lionised', 
                    'motorcyclist', 'nihilist', 'piloted', 'pirated', 'playacted', 'revivalist', 
                    'rioted', 'scientist', 'semifinalist', 'survivalist'];

        $this->assertEquals($expected, $rhymes);
    }

    public function testSyllables1()
    {
        $syllables = (new Word('hi'))->syllables();
        $expected = 1;

        $this->assertEquals($expected, $syllables);
    }

    public function testSyllables2()
    {
        $syllables = (new Word('hello'))->syllables();
        $expected = 2;

        $this->assertEquals($expected, $syllables);
    }

    public function testSyllables3()
    {
        $syllables = (new Word('happiness'))->syllables();
        $expected = 3;

        $this->assertEquals($expected, $syllables);
    }

    public function testOffensive()
    {
        $offensive = (new Word('fuck'))->offensive();
        $expected = true;

        $this->assertEquals($expected, $offensive);
    }

    public function testNotOffensive()
    {
        $offensive = (new Word('cake'))->offensive();
        $expected = false;

        $this->assertEquals($expected, $offensive);
    }

}