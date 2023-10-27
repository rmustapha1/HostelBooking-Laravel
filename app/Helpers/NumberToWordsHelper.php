<?php

function numberToWords($number)
{
    $units = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine');
    $teens = array('', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen');
    $tens = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety');
    $thousands = array('', 'thousand', 'million', 'billion', 'trillion');

    $number = number_format($number, 2, '.', ',');
    list($dollars, $cents) = explode('.', $number);

    $dollars = explode(',', $dollars);
    $dollarsCount = count($dollars);

    if ($dollarsCount === 1 && (int) $dollars[0] === 0) {
        return 'zero dollars';
    }

    $words = [];

    for ($i = 0; $i < $dollarsCount; $i++) {
        $part = (int) $dollars[$i];
        $digits = str_split(strrev($part));

        if ($part > 0) {
            if (isset($digits[1]) && $digits[1] == 1) {
                $digits[0] += 10;
                $digits[1] = 0;
            }

            if ($digits[0] > 0) {
                $words[] = $units[$digits[0]];
            }

            if ($digits[1] > 0) {
                $words[] = $tens[$digits[1]];
            }

            if ($digits[2] > 0) {
                $words[] = $units[$digits[2]] . ' hundred';
            }

            if ($i < $dollarsCount - 1) {
                $words[] = $thousands[$i];
            }
        }
    }

    $dollarsStr = implode(' ', $words);

    if ((int) $cents === 0) {
        return $dollarsStr . ' dollars';
    }

    $centsStr = $units[(int) $cents] . ' cents';

    return $dollarsStr . ' dollars and ' . $centsStr;
}
