<?php

class Solution {

    const ALPHABET = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        "M" => 1000,
    ];

    /**
     * @param string $string
     * @return Integer
     */
    public static function romanToInt(string $string): int
    {
        $string = trim($string);
        $sAsInt = 0;
        $beforeVal = 0;
        try {
            if ($string == '') {
                throw new Exception('String is empty');
            }

            $stringAsArr = str_split($string, 1);
            if (count($stringAsArr) > 15) {
                throw new Exception('Exceeded the number of characters in the string. Max 15');
            }

            foreach ($stringAsArr as $symbol) {
                if (!array_key_exists($symbol, self::ALPHABET)) {
                    throw new Exception('String has undefined symbol - {' . $symbol . '}');
                }

                $currentVal = self::ALPHABET[$symbol];
                $sAsInt += $currentVal - ($currentVal > $beforeVal ? 2 * $beforeVal : 0);
                $beforeVal = $currentVal;
            }
            if ($sAsInt > 3999) {
                throw new Exception('Roman numeral out the range [1, 3999]');
            }
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        return $sAsInt;
    }
}


p('resul {'. Solution::romanToInt('MCMXCIV') . '}');

function p($value, $die = false, $bHtml = true)
{
    if (is_bool($value))
        $value = 'bool: ' . ($value == true ? 'true' : 'false');

    $sReturn = print_r($value, true);

    $debug_backtrace = debug_backtrace();


    if (defined("STDIN")) /* php-cli */ {
        echo "\r\n==========\r\n" . $sReturn . "\r\n==========\r\n";
    } else {
        if ($bHtml)
            $sReturn = htmlspecialchars($sReturn);

        echo "<pre data-source=\"" . substr($debug_backtrace[1]["file"], mb_strlen($_SERVER["DOCUMENT_ROOT"])) . ":" . $debug_backtrace[1]["line"] . "\" style=\"overflow:auto; color: #000; background-color: white; border: 1px solid #CCC; padding: 5px; font-size: 12px; z-index:800;\">" . $sReturn . "</pre>";
    }

    if ($die) {
        ob_get_flush();
        die();
    }
}

