<?php
function print_pattern($num)
{
    $minValue = 1;
    $chars = ['+', '-', '*'];
    $minKey = min(array_keys($chars));
    $maxKey = max(array_keys($chars));

    $key = $minKey;
    for ($i=$minValue; $i <= $num; $i++) {
        for ($j=1; $j <= $i; $j++) {
            echo $chars[$key]." ";
        }
        echo "<br>";
        $key++;
        if($key > $maxKey) $key = $minKey;
    }

    for ($i=$num-1; $i >= $minValue ; $i--) {
        for ($j=1; $j <= $i; $j++) {
            echo $chars[$key]." ";
        }
        if($i != $minValue) echo "<br>";
        $key++;
        if($key > $maxKey) $key = $minKey;
    }
}


$num = 5;
print_pattern($num);
?>