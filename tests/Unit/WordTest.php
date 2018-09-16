<?php

use DivineOmega\WordInfo\Word;
use PHPUnit\Framework\TestCase;

final class WordTest extends TestCase
{
    public function testRhymes()
    {
        $rhymes = (new Word('cat'))->rhymes();

        $expected = ['aristocrat', 'at', 'bat', 'caveat', 'chat', 'democrat', 'diplomat',
                    'fat', 'flat', 'habitat', 'hat', 'mat', 'pat', 'rat', 'sat', 'spat',
                    'stat', 'tat', 'that', 'thermostat', 'vat', ];

        $this->assertEquals($expected, $rhymes);
    }

    public function testHalfRhymes()
    {
        $rhymes = (new Word('violet'))->halfRhymes();

        $expected = ['cyclist', 'finalist', 'hybridised', 'iodised', 'ionised', 'lionised',
                    'motorcyclist', 'nihilist', 'piloted', 'pirated', 'playacted', 'revivalist',
                    'rioted', 'scientist', 'semifinalist', 'survivalist', ];

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

        $expected = ['computarena', 'computarise', 'computarisen', 'computarises', 'computarising', 'computaristocratic', 'computaroma',
                    'computarose', 'computaround', 'computarousal', 'computarouse', 'computaroused', 'computarousing', 'computarrange',
                    'computarranged', 'computarrangement', 'computarrangements', 'computarranging', 'computarray', 'computarrears', 'computarrest',
                    'computarrested', 'computarresting', 'computarrests', 'computarrhythmias', 'computarrival', 'computarrivals', 'computarrive',
                    'computarrived', 'computarrives', 'computarriving', 'computerena', 'computeriginal', 'computeriginality', 'computeriginally',
                    'computeriginals', 'computeriginate', 'computeriginated', 'computeriginates', 'computeriginating', 'computerine', 'computerise',
                    'computerisen', 'computerises', 'computerising', 'computeristocratic', 'computermination', 'computeroma', 'computerose',
                    'computeround', 'computerousal', 'computerouse', 'computeroused', 'computerousing', 'computerrain', 'computerrestrial',
                    'computerrific', 'computerrrange', 'computerrranged', 'computerrrangement', 'computerrrangements', 'computerrranging',
                    'computerrray', 'computerrrears', 'computerrrest', 'computerrrested', 'computerrresting', 'computerrrests', 'computerrrhythmias',
                    'computerrrival', 'computerrrivals', 'computerrrive', 'computerrrived', 'computerrrives', 'computerrriving', 'computerus',
                    'computeryrannical', 'computoriginal', 'computoriginality', 'computoriginally', 'computoriginals', 'computoriginate',
                    'computoriginated', 'computoriginates', 'computoriginating', 'computyrannical', 'incomputer', 'outcomputer', 'silicaomputer',
                    'silicomputer', 'welcomputer', ];

        $this->assertEquals($expected, $portmanteaus);
    }

    public function testPortmanteaus2()
    {
        $portmanteaus = (new Word('cheese'))->portmanteaus();

        $expected = ['chease', 'cheased', 'cheasel', 'cheasement', 'cheasements', 'cheases', 'cheasier', 'cheasiest', 'cheasily', 'cheasing',
                    'cheasy', 'cheasygoing', 'chies', 'chiheese', 'chiis', 'chization', 'chys', ];

        $this->assertEquals($expected, $portmanteaus);
    }

    public function pluraliseProvider()
    {
        return [
            ['cat', 'cats'],
            ['mitten', 'mittens'],
            ['sausage', 'sausages'],
            ['child', 'children'],
            ['goose', 'geese'],
            ['person', 'people'],
            ['woman', 'women'],
            ['man', 'men'],
            ['audio', 'audio'],
            ['education', 'education'],
            ['rice', 'rice'],
            ['love', 'love'],
            ['pokemon', 'pokemon'],
            ['sheep', 'sheep'],
            ['sex', 'sexes'],
            ['mouse', 'mice'],
            ['mathematics', 'mathematics'],
            ['information', 'information'],
            ['tooth', 'teeth'],
        ];
    }

    /**
     * @dataProvider pluraliseProvider
     */
    public function testPluralise($singular, $plural)
    {
        $word = new Word($singular);

        $this->assertEquals($plural, $word->plural());
    }

    /**
     * @dataProvider pluraliseProvider
     */
    public function testSingularise($singular, $plural)
    {
        $word = new Word($plural);

        $this->assertEquals($singular, $word->singular());
    }
}
