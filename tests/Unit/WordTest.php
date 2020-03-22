<?php

namespace DivineOmega\WordInfo\Tests;

use DivineOmega\WordInfo\Word;
use PHPUnit\Framework\TestCase;

final class WordTest extends TestCase
{
    private function convertObjectValueToString(array $objectArray)
    {
        foreach ($objectArray as $index => $object) {
            $objectArray[$index] = (string) $object;
        }

        return $objectArray;
    }

    public function testRhymes()
    {
        $rhymes = (new Word('cat'))->rhymes();

        $expected = $this->convertObjectValueToString($rhymes);

        $this->assertEquals($expected, $rhymes);
    }

    public function testHalfRhymes()
    {
        $rhymes = (new Word('violet'))->halfRhymes();

        $expected = $this->convertObjectValueToString($rhymes);

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

        $this->assertTrue($offensive);
    }

    public function testOffensive2()
    {
        $offensive = (new Word('crap'))->offensive();

        $this->assertTrue($offensive);
    }

    public function testOffensive3()
    {
        $offensive = (new Word('shit'))->offensive();

        $this->assertTrue($offensive);
    }

    public function testOffensive4()
    {
        $offensive = (new Word('shitty'))->offensive();

        $this->assertTrue($offensive);
    }

    public function testNotOffensive()
    {
        $offensive = (new Word('cake'))->offensive();

        $this->assertFalse($offensive);
    }

    public function testPortmanteaus1()
    {
        $portmanteaus = (new Word('computer'))->portmanteaus();

        $expected = $this->convertObjectValueToString($portmanteaus);

        $this->assertEquals($expected, $portmanteaus);
    }

    public function testPortmanteaus2()
    {
        $portmanteaus = (new Word('cheese'))->portmanteaus();

        $expected = $this->convertObjectValueToString($portmanteaus);

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
