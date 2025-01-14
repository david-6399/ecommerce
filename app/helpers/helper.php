<?php

function getUrlName($url,$class){
    $urlName = request()->path();
    if(str_contains($urlName,$url)){
        return $class;
    }else{
        return '';
    }
}