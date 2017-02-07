<?php
/**
 * Check simple numbers that is located near the middle of some interval
 */

/*
 * @param integer $number
 * @return boolean return true if number is simple and false - otherwise
 */
function isSimple($number) {
    $simple = true;
    for ($i = 2, $n = $number / 2; $i < $n; $i++) {
        if ($number % $i == 0) {

            $simple = false;
            break;
        }
    }
    return $simple;
}

// start of interval
$start = 3;

// finish of interval
$finish = 11;

$result = false;
if ($start >= $finish && $start > 0 && $finish > 0) throw new Exception('Uncorrect numbers');

// get middle of interval
$mid = round(($finish + $start) / 2);

if (isSimple($mid)) {
    $result = $mid;
} else {
    for ($i = 1, $n = $mid - $start; $i <= $n; $i++) {
        if (isSimple($mid - $i)) {
            $result[] = $mid - $i;
        }
        if (isSimple($mid + $i)) {
            $result[] = $mid + $i;
        }
        if (!empty($result)) break;
    }
}

if (is_array($result)) {
    $result = implode(', ', $result);
}
echo $result;