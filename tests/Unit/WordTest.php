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

    public function testOffensive1()
    {
        $offensive = (new Word('fuck'))->offensive();
        $expected = true;

        $this->assertEquals($expected, $offensive);
    }

    public function testOffensive2()
    {
        $offensive = (new Word('crap'))->offensive();
        $expected = true;

        $this->assertEquals($expected, $offensive);
    }

    public function testOffensive3()
    {
        $offensive = (new Word('shit'))->offensive();
        $expected = true;

        $this->assertEquals($expected, $offensive);
    }

    public function testOffensive4()
    {
        $offensive = (new Word('shitty'))->offensive();
        $expected = true;

        $this->assertEquals($expected, $offensive);
    }

    public function testNotOffensive()
    {
        $offensive = (new Word('cake'))->offensive();
        $expected = false;

        $this->assertEquals($expected, $offensive);
    }

    public function testPortmanteaus1()
    {
        $portmanteaus = (new Word('computer'))->portmanteaus();
        
        $expected = ['computerena', 'computarena', 'computeriginal', 'computoriginal', 'computeriginality', 
                    'computoriginality', 'computeriginally', 'computoriginally', 'computeriginals', 'computoriginals', 
                    'computeriginate', 'computoriginate', 'computeriginated', 'computoriginated', 'computeriginates', 
                    'computoriginates', 'computeriginating', 'computoriginating', 'computerine', 'computerise', 
                    'computarise', 'computerisen', 'computarisen', 'computerises', 'computarises', 'computerising',
                    'computarising', 'computeristocratic', 'computaristocratic', 'computermination', 'computeroma', 
                    'computaroma', 'computerose', 'computarose', 'computeround', 'computaround', 'computerousal', 
                    'computarousal', 'computerouse', 'computarouse', 'computeroused', 'computaroused', 'computerousing', 
                    'computarousing', 'computerrain', 'computerrestrial', 'computerrific', 'computerrrange', 
                    'computarrange', 'computerrranged', 'computarranged', 'computerrrangement', 'computarrangement', 
                    'computerrrangements', 'computarrangements', 'computerrranging', 'computarranging', 'computerrray', 
                    'computarray', 'computerrrears', 'computarrears', 'computerrrest', 'computarrest', 'computerrrested', 
                    'computarrested', 'computerrresting', 'computarresting','computerrrests', 'computarrests', 
                    'computerrrhythmias', 'computarrhythmias', 'computerrrival', 'computarrival', 'computerrrivals', 
                    'computarrivals', 'computerrrive', 'computarrive', 'computerrrived', 'computarrived', 
                    'computerrrives', 'computarrives', 'computerrriving', 'computarriving', 'computerus', 
                    'computeryrannical', 'computyrannical', 'incomputer', 'outcomputer', 'silicaomputer', 
                    'silicomputer', 'welcomputer'];

        $this->assertEquals($expected, $portmanteaus);
    }

    public function testPortmanteaus2()
    {
        $portmanteaus = (new Word('cheese'))->portmanteaus();

        $expected = ['chease','cheased','cheasel','cheasement','cheasements','cheases','cheasier','cheasiest','cheasily',
                    'cheasing','cheasy','cheasygoing','chies','chiheese','chiis','chization','chys'];

        $this->assertEquals($expected, $portmanteaus);
    }

    public function cacheTest()
    {
        $this->testRhymes();
        $this->testRhymes();
        $this->testSyllables1();
        $this->testSyllables1();
        $this->testPortmanteaus1();
        $this->testPortmanteaus1();
    }

}