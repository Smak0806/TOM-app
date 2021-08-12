<?php

    include "common.php";

    static $csvPath = "../csv/";

    $fileName = $_POST['fileName'];
    $content_to_write = $_POST['data'];
    $errNo = "0";
    
    $archivo_a_escribir = fopen($csvPath.$fileName, 'w');
	fwrite($archivo_a_escribir, $content_to_write);
    fclose($archivo_a_escribir);

    //compruebo el formato del CSV.
    $myCSV = fopen($csvPath.$fileName, "r") or die("Unable to open file!");
    //while (($data = fgetcsv($myCSV)) !== FALSE) {
        $errNo="404";
        $_GET["errNo"] = $errNo;
        $_COOKIE["fileName"] = $fileName;
        $_COOKIE["csvContent"] = $content_to_write;
        print_r($_GET);
        header("Location:../uploadCSVpage.php?errNo=".$_GET["errNo"]);
    
        die();
    //}

    

    

    $archivo_a_leer = fopen($csvPath.$fileName, 'r');
    $readedFile = fread($archivo_a_leer, filesize($csvPath.$fileName));
    

    if($content_to_write === $readedFile){
        echo "<h3>Se ha escrito correctamente. Son iguales.</h3>";
    }
    echo "<h1>content_to_write:</h1> <br>";
    prePrint($content_to_write);
    echo "<br><h1>readedfile:</h1> <br>";
    prePrint($readedFile);
    

    //header("Location:uploadCSVpage.php");

?>