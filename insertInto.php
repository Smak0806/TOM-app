<?php

    $values="";
    $id="";
    $Date="";
    $Open="";
    $High="";
    $Low="";
    $Close="";
    $Range_="";
    $BodyRange="";
    $BodyColor="";
    $DayOfWeek="";
    $SingleDayPatterns="";

    $fileName = "csv/SPX500SourceData.csv";
    $dateFormat = "m/d/Y"; 

    $myCSV = fopen($fileName, "r") or die("Unable to open file!");

    $i=0;

    include "php/mySqlFunctions.php";
    $conn = mySqlConnect("insertInto.php");


    if($fileName!=""){
        
        while (($data = fgetcsv($myCSV)) !== FALSE) {
                
            

            if($i>0){		

                echo "<pre>";print_r($data);
                
                //id
                //echo $i . ": ";
                $values = "$i, ";

                //Date
                //0] => 12
                //[1] => 30
                //[2] => 2020
                $dateToInsert = str_replace("/", "-", $data[0]); 
                $dateToInsert = explode('-', $dateToInsert);   
                //echo "'$dateToInsert[2]-$dateToInsert[0]-$dateToInsert[1]', ";
                $values .= "'$dateToInsert[2]-$dateToInsert[0]-$dateToInsert[1]', ";

                //Open
                $values .= "$data[1], ";

                //High
                $values .= "$data[2], ";

                //Low
                $values .= "$data[3], ";

                //Close
                $values .= "$data[4], ";

                //Range
                $values .= "$data[5], ";

                //BodyRange
                $values .= "$data[6], ";

                //BodyColor
                $values .= "'$data[7]', ";

                //DayOfWeek
                $datetime = DateTime::createFromFormat($dateFormat, $data[0]);
                $data[8] = $datetime->format('l');
                $values .= "'$data[8]', ";


                if($data[6] < 2){
                    $data[9] = "Doji";
                }
                if($data[4] > $data[1]){//GREEN DAY
                    $data[9] = "Green Day";
                }else if($data[4] < $data[1]){//RED DAY
                    $data[9] = "Red Day";
                }else{
                    $data[9] = "";
                }
                //SingleDayPatterns
                $values .= "'$data[9]'";

                

                $sql = "INSERT INTO spx500sourcedata (id,Date,Open,High,Low,Close,Range_,BodyRange,BodyColor,DayOfWeek,SingleDayPatterns)
                VALUES ($values)";
    

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                
            }
                
            $i++;


        }

    }

    closeMySqlConn($conn);