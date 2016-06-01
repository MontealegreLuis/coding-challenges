<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
use PHPUnit_Framework_TestCase as TestCase;

class NumberToWordsTest extends TestCase
{
    /** @var NumberToWords */
    private $numberToWords;

    /**
     * @return NumberToWords
     */
    public function setUp()
    {
        $this->numberToWords = new NumberToWords();
    }

    /**
     * @test
     * @dataProvider digitsGenerator
     */
    function it_converts_numbers_between_1_and_9($number, $text)
    {
        $this->assertEquals($text, $this->numberToWords->convert($number));
    }

    function digitsGenerator()
    {
        return [
            ['number' => 1, 'text' => 'one'],
            ['number' => 2, 'text' => 'two'],
            ['number' => 3, 'text' => 'three'],
            ['number' => 4, 'text' => 'four'],
            ['number' => 5, 'text' => 'five'],
            ['number' => 6, 'text' => 'six'],
            ['number' => 7, 'text' => 'seven'],
            ['number' => 8, 'text' => 'eight'],
            ['number' => 9, 'text' => 'nine'],
        ];
    }

    /**
     * @test
     * @dataProvider teensGenerator
     */
    function it_converts_numbers_between_11_and_19($number, $text)
    {
        $this->assertEquals($text, $this->numberToWords->convert($number));
    }

    function teensGenerator()
    {
        return [
            ['number' => 11, 'text' => 'eleven'],
            ['number' => 12, 'text' => 'twelve'],
            ['number' => 13, 'text' => 'thirteen'],
            ['number' => 14, 'text' => 'fourteen'],
            ['number' => 15, 'text' => 'fifteen'],
            ['number' => 16, 'text' => 'sixteen'],
            ['number' => 17, 'text' => 'seventeen'],
            ['number' => 18, 'text' => 'eighteen'],
            ['number' => 19, 'text' => 'nineteen'],
        ];
    }

    /**
     * @test
     * @dataProvider tensGenerator
     */
    function it_converts_multiples_of_10_less_than_100($number, $text)
    {
        $this->assertEquals($text, $this->numberToWords->convert($number));
    }

    function tensGenerator()
    {
        return [
            ['number' => 10, 'text' => 'ten'],
            ['number' => 20, 'text' => 'twenty'],
            ['number' => 30, 'text' => 'thirty'],
            ['number' => 40, 'text' => 'forty'],
            ['number' => 50, 'text' => 'fifty'],
            ['number' => 60, 'text' => 'sixty'],
            ['number' => 70, 'text' => 'seventy'],
            ['number' => 80, 'text' => 'eighty'],
            ['number' => 90, 'text' => 'ninety'],
        ];
    }

    /**
     * @test
     * @dataProvider lessThan100Generator
     */
    function it_converts_numbers_between_21_and_99_not_multiples_of_ten(
        $number,
        $text
    ) {
        $this->assertEquals($text, $this->numberToWords->convert($number));
    }

    function lessThan100Generator()
    {
        return [
            ['number' => 21, 'text' => 'twenty one'],
            ['number' => 56, 'text' => 'fifty six'],
            ['number' => 88, 'text' => 'eighty eight'],
            ['number' => 93, 'text' => 'ninety three'],
            ['number' => 99, 'text' => 'ninety nine'],
        ];
    }

    /**
     * @test
     * @dataProvider multiplesOf100Generator
     */
    function it_converts_multiples_of_100_less_than_1000($number, $text)
    {
        $this->assertEquals($text, $this->numberToWords->convert($number));
    }

    function multiplesOf100Generator()
    {
        return [
            ['number' => 100, 'text' => 'one hundred'],
            ['number' => 200, 'text' => 'two hundred'],
            ['number' => 400, 'text' => 'four hundred'],
            ['number' => 700, 'text' => 'seven hundred'],
            ['number' => 900, 'text' => 'nine hundred'],
        ];
    }

    /**
     * @test
     * @dataProvider multiplesOf100Generator
     */
    function it_converts_numbers_between_101_and_999_not_multiples_of_100(
        $number,
        $text
    ) {
        $this->assertEquals($text, $this->numberToWords->convert($number));
    }

    function nonMultiplesOf100Generator()
    {
        return [
            ['number' => 101, 'text' => 'one hundred one'],
            ['number' => 213, 'text' => 'two hundred thirteen'],
            ['number' => 425, 'text' => 'four hundred twenty five'],
            ['number' => 750, 'text' => 'seven hundred fifty'],
            ['number' => 999, 'text' => 'nine hundred ninety nine'],
        ];
    }

    /**
     * @test
     * @dataProvider numbersBetween1000And999999Generator
     */
    function it_converts_numbers_between_1000_and_999999($number, $text)
    {
        $this->assertEquals($text, $this->numberToWords->convert($number));
    }

    function numbersBetween1000And999999Generator()
    {
        return [
            ['number' => 1000, 'text' => 'one thousand'],
            ['number' => 2001, 'text' => 'two thousand one'],
            ['number' => 3012, 'text' => 'three thousand twelve'],
            ['number' => 4025, 'text' => 'four thousand twenty five'],
            ['number' => 5211, 'text' => 'five thousand two hundred eleven'],
            ['number' => 12300, 'text' => 'twelve thousand three hundred'],
            ['number' => 55121, 'text' => 'fifty five thousand one hundred twenty one'],
            ['number' => 100000, 'text' => 'one hundred thousand'],
            ['number' => 200001, 'text' => 'two hundred thousand one'],
            ['number' => 520230, 'text' => 'five hundred twenty thousand two hundred thirty'],
            ['number' => 823011, 'text' => 'eight hundred twenty three thousand eleven'],
            ['number' => 999999, 'text' => 'nine hundred ninety nine thousand nine hundred ninety nine'],
        ];
    }

    /**
     * @test
     * @dataProvider numbersBetween1000And999999Generator
     */
    function it_converts_numbers_between_1_million_and_999_millions(
        $number,
        $text
    ) {
        $this->assertEquals($text, $this->numberToWords->convert($number));
    }

    function millionsGenerator()
    {
        return [
            ['number' => 1000000, 'text' => 'one millions'],
            ['number' => 2000001, 'text' => 'two millions one'],
            ['number' => 3000012, 'text' => 'three millions twelve'],
            ['number' => 4000025, 'text' => 'four millions twenty five'],
            ['number' => 15000211, 'text' => 'fifteen millions two hundred eleven'],
            ['number' => 123100145, 'text' => 'one hundred twenty three millions one hundred thousand one hundred forty five'],
            ['number' => 999999999, 'text' => 'nine hundred ninety nine millions nine hundred ninety nine thousand nine hundred ninety nine'],
        ];
    }
}
