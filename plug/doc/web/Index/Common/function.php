<?php


function XU($action,$cs,$jumpurl) { 

    if ($jumpurl) {
        $value="href= '$jumpurl'  target='_blank'";
    }else{
        $value='href=\'' .U($action,$cs). '\'';
    }
    return $value;

}


