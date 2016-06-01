<?php
/**
 * PHP version 5.6
 *
 * This source file is subject to the license that is bundled with this package in the file LICENSE.
 */
class NumberToWords
{
    private $units = [
        'one',
        'two',
        'three',
        'four',
        'five',
        'six',
        'seven',
        'eight',
        'nine',
    ];

    private $tens = [
        'ten',
        'twenty',
        'thirty',
        'forty',
        'fifty',
        'sixty',
        'seventy',
        'eighty',
        'ninety',
    ];

    private $teens = [
        'eleven',
        'twelve',
        'thirteen',
        'fourteen',
        'fifteen',
        'sixteen',
        'seventeen',
        'eighteen',
        'nineteen',
    ];

    private $suffixes = [
        '',
        ' thousand',
        ' millions',
    ];

    const UNITS = 0;
    const DOZENS = 1;
    const HUNDREDS = 2;

    public function convert($number)
    {
        $blocks = $this->extractBlocks($number);

        $words = '';
        $blocksCount = count($blocks);
        foreach (range(0, $blocksCount - 1) as $i) {
            $words .= $this->convertHundreds($blocks[$i]) . $this->suffixes[$blocksCount - $i - 1] . ' ';
        }

        return trim($words);
    }

    /**
     * @param $number
     * @return string
     */
    private function convertHundreds($number)
    {
        $words = '';
        if ((int) $number === 0) {
            return $words;
        }

        do {
            $exponent = strlen((int) $number) - 1;
            $divisor = (10 ** $exponent);
            $digit = (int) ($number / $divisor);
            $number = $number % $divisor;
            switch ($exponent) {
                case self::UNITS:
                    $words .= " {$this->units[$digit - 1]}";
                    break;
                case self::DOZENS:
                    // Numbers between 11 and 19
                    if ($digit === 1 && $number !== 0) {
                        $words .= " {$this->teens[$number - 1]}";
                        $number = 0;
                    } else {
                        $words .= " {$this->tens[$digit - 1]}";
                    }
                    break;
                case self::HUNDREDS:
                    $words .= " {$this->units[$digit - 1]} hundred";
                    break;
            }
        } while ($number > 0);

        return trim($words);
    }

    /**
     * Numbers are separated in blocks of 3 digits, for instance:
     *
     * 1000 is separated as 1,000
     * 23987 is separated as 23,987
     * 3458760 is separated as 3, 458, 760
     *
     * @param $number
     * @return array
     */
    private function extractBlocks($number)
    {
        $length = strlen($number);
        $offset = $length % 3;

        // `$i` is always a multiple of 3
        $blocks = array_map(function ($i) use ($number, $length, $offset) {
            $size = 3;
            $start = $i;
            // Only the first block can have a size different from 3
            if ($i === 0 && $offset != 0) {
                $size = $offset;
            }
            // Adjust initial index for numbers with a length not divisible by 3
            if ($i !== 0 && $offset != 0) {
                $start = $i - (3 - $offset);
            }

            return substr($number, $start, $size);

        }, range(0, $length <= 3 ? 0 : $length - 1, 3)); // Generate values multiples of 3

        return $blocks;
    }
}
