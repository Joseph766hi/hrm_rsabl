<?php

if (! function_exists('debugCode')) {
    function debugCode($r=array(),$f=TRUE)
    {
        echo "<pre>";
        print_r($r);
        echo "</pre>";

        if($f==TRUE) 
            die;
    }
}