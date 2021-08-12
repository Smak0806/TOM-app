<?php

function prePrint($args){
    $data = print_r($args);
    $string = "<pre>";
    $string .= $data;
    $string .= "</pre>";
    
    return $string . "<br>";
}

function _log($logfile, $data){
    $log = fopen($logfile, 'w');
	fwrite($log, $data);
    fclose($log);
}

function debugBreak(){
    die("Debug Breakpoint.");
}