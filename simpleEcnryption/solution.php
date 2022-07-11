<?php

function encrypt($text, $n) {

    if($text == "" || $text == null || $n <= 0) {
        return $text;
    }

    $len = mb_strlen($text);
    $result = $text;
    
     do {
        $odd = null;
        $even = null;
        

         for($i = 0; $i < $len; $i++) {
             if($i%2 == 0) {
                 $even[] = mb_substr($result, $i, 1);
             }
             else {
                 $odd[] = mb_substr($result, $i, 1);
             }
         }
         
        $result = implode($odd) . implode($even);

        $n -= 1;
     } while($n != 0);

     return $result;
}

function decrypt($text, $n) {
    
    if($text == "" || $text == null || $n <= 0) {
        return $text;
    }
  
  $res = $text;

    do {
        $arr = [];
        $len = mb_strlen($text);
    
        for($i = 0; $i < $len; $i++) {
            $arr[$i] = mb_substr($res, $i, 1);
        }
        
        $halved = array_chunk($arr, (count($arr)/2));
        
        $halved_count = count($halved[0]) + count($halved[1]);
        $result = null;
        for($x = 0; $x < ($halved_count/2); $x++) {
            $word = $halved[1][$x] . $halved[0][$x];
            $result[$x] = $word;
        }
    
        if(count($halved) % 2 != 0) {
            $res = implode($result) . implode(end($halved));
        }
        else {
            $res = implode($result);
        }
      
        $n -= 1;
    } while($n != 0);

    return $res;
}