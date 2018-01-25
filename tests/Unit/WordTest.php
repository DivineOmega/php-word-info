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

}