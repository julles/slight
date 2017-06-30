<?php

function toCamelCase($value){
    $value = ucwords(str_replace(array('-', '_'), ' ', $value));
    
    $value = str_replace(' ', '', $value);
    
    return lcfirst($value);
}

