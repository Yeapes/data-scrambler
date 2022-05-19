<?php

function getKey($key){
    printf(" value = '%s' ",$key);
}
function scrambleData($Originaldata, $key){
    $originalKey = "abcdefghijklmnopqrstuvwxyz1234567890";
    $data = '';
    $length = strlen($Originaldata);

    for($i = 0; $i < $length; $i++){
        $currentChar = $Originaldata[$i];
        $position = strpos($originalKey,$currentChar);

        if($position !== false){
             $data .= $key[$position];   
        }else{
            $data .= $currentChar;
        }
    }
    return $data;
}


function decodeData($Originaldata, $key){
    $originalKey = "abcdefghijklmnopqrstuvwxyz1234567890";
    $data = '';
    $length = strlen($Originaldata);

    for($i = 0; $i < $length; $i++){
        $currentChar = $Originaldata[$i];
        $position = strpos($originalKey,$currentChar);

        if($position !== false){
             $data .= $originalKey[$position];   
        }else{
            $data .= $currentChar;
        }
    }
    return $data;
}