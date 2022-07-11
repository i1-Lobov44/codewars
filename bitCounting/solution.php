<?php

function countBits($n) 
{
    if($n < 0) {
        return false;
    }

    $n = decbin($n);
    $length = mb_strlen($n);
    $count = 0;

    for($i = 0; $i <= $length; $i++) {
        $num = mb_substr($n, $i, 1);
        if($num == 1) {
            $count += 1;
        }
    }
    echo nl2br("\n".$count);
  return $count;
  
}