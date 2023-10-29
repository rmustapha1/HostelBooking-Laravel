<?php

function numberToWords($number) {
    $words = [
        0 => 'Zero',
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine'
    ];

    $teens = [
        11 => 'Eleven',
        12 => 'Twelve',
        13 => 'Thirteen',
        14 => 'Fourteen',
        15 => 'Fifteen',
        16 => 'Sixteen',
        17 => 'Seventeen',
        18 => 'Eighteen',
        19 => 'Nineteen'
    ];

    $tens = [
        10 => 'Ten',
        20 => 'Twenty',
        30 => 'Thirty',
        40 => 'Forty',
        50 => 'Fifty',
        60 => 'Sixty',
        70 => 'Seventy',
        80 => 'Eighty',
        90 => 'Ninety'
    ];

    if (array_key_exists($number, $words)) {
        return $words[$number];
    }

    if ($number >= 11 && $number <= 19) {
        return $teens[$number];
    }

    if ($number >= 10 && $number <= 90 && $number % 10 == 0) {
        return $tens[$number];
    }

    if ($number >= 21 && $number <= 99) {
        $tensDigit = floor($number / 10) * 10;
        $unitDigit = $number % 10;
        return $tens[$tensDigit] . '-' . $words[$unitDigit];
    }

    if ($number >= 100 && $number <= 999) {
        $hundredsDigit = floor($number / 100);
        $remainingNumber = $number % 100;
        $remainingWords = numberToWords($remainingNumber);
        return $words[$hundredsDigit] . ' Hundred' . ($remainingNumber > 0 ? ' and ' . $remainingWords : '');
    }

    if ($number >= 1000 && $number <= 999999) {
        $thousandsDigit = floor($number / 1000);
        $remainingNumber = $number % 1000;
        $remainingWords = numberToWords($remainingNumber);
        return numberToWords($thousandsDigit) . ' Thousand' . ($remainingNumber > 0 ? ' and ' . $remainingWords : '');
    }

    // Add more cases for larger numbers if needed

    return 'Number out of range';
}

