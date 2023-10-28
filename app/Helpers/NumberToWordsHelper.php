<?php

function numberToWords($number)
{
    $units = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine');
    $teens = array('', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen');
    $tens = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety');
    $thousands = array('', 'thousand', 'million', 'billion', 'trillion');

    $number = number_format($number, 2, '.', ',');
    list($cedis, $peswas) = explode('.', $number);

    $cedis = explode(',', $cedis);
    $cedisCount = count($cedis);

    if ($cedisCount === 1 && (int) $cedis[0] === 0) {
        return 'zero cedis';
    }

    $words = [];

    for ($i = 0; $i < $cedisCount; $i++) {
        $part = (int) $cedis[$i];
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

            if ($i < $cedisCount - 1) {
                $words[] = $thousands[$i];
            }
        }
    }

    $cedisStr = implode(' ', $words);

    if ((int) $peswas === 0) {
        return $cedisStr . ' cedis';
    }

    $peswasStr = $units[(int) $peswas] . ' peswas';

    return $cedisStr . ' cedis and ' . $peswasStr;
}