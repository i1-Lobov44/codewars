<?php

function generateHashtag($str) {
    (trim($str) != '') ? $str = str_replace(" ", "", ucwords($str)) : $str = false;
    return (mb_strlen($str) >= 140) || $str == false ? false : "#" . $str;
}