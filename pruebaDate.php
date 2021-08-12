<?php

echo "TOM <br>";

	//@TODO: HACER LAS COMPARACIONES QUE TENEMOS EN algoritmo.txt
	//agrupar los días en bloques de 1 semana y de 2 semanas para comparar 
	//los días entre sí y compararlos con los de la siguiente semana

	//@TODO: insertar datos en la base de DATOS(obvio)

	//@todo: optimimzar y generar funcione para fraccionar el código.

$results = array(
	'Doji' => 0, 
	'Red Day' => 0, 
	'Green Day' => 0
);

$daysOfWeek = array(
	'Monday' => 0, 
	'Tuesday' => 0, 
	'Wednesday' => 0, 
	'Thursday' => 0, 
	'Friday' => 0 
);

$weekBlock = 0;
$week0 = array( 'Monday0' => "", 
				'Tuesday0' => "", 
				'Wednesday0' => "", 
				'Thursday0' => "", 
				'Friday0' => "" 
);
$week1 = array( 'Monday1' => "", 
				'Tuesday1' => "", 
				'Wednesday1' => "", 
				'Thursday1' => "", 
				'Friday1' => "" 
);


$indexName = $_GET['indexName'];
$fileName = 'csv/'.$indexName."SourceData.csv";
$dateFormat = "m/d/Y"; 

$myCSV = fopen($fileName, "r") or die("Unable to open file!");

$dayOfWeek = (isset($_GET["DayOfWeek"])) ? $_GET["DayOfWeek"] : '';

$i=0;

echo "<h1>$indexName</h1>";


if($indexName!=""){
	while (($data = fgetcsv($myCSV)) !== FALSE) {
	    	
		if($i>0){		
				
			echo $i . ": ";
			
			$datetime = DateTime::createFromFormat($dateFormat, $data[0]);
			$data[8] = $datetime->format('l');

			//DOJI 
			if($data[8] == "Monday"){
				$daysOfWeek["Monday"]++;
				
				if($weekBlock===0){					
					echo "WeekBlock es igual a 0";
					$week1["Monday1"]=$data;
					//echo "++"; print_r($weekBlock);
				}else if($weekBlock===1){					
					echo "WeekBlock es igual a 1";
					$week0["Monday0"]=$data;
					//echo "--"; print_r($weekBlock);					
				}


				if($data[6] < 2){
					$results['Doji']++;
					$data[9] = "Doji";
				}
				
				if($data[4] > $data[1]){//GREEN DAY
					$results["Green Day"]++;
					$data[9] = "Green Day";
				}else if($data[4] < $data[1]){//RED DAY
					$results["Red Day"]++;
					$data[9] = "Red Day";
				}else{
					$data[9] = "Undefined";
				}
				//echo "<script>console.log('".$data[8]."')</script>";
			}else if($data[8] == "Tuesday"){
				$daysOfWeek["Tuesday"]++;
				if($weekBlock===0){					
					echo "WeekBlock es igual a 0";
					$week1["Tuesday1"]=$data;
					//echo "++"; print_r($weekBlock);
				}else if($weekBlock===1){					
					echo "WeekBlock es igual a 1";
					$week0["Tuesday0"]=$data;
					//echo "--"; print_r($weekBlock);					
				}

			}else if($data[8] == "Wednesday"){
				$daysOfWeek["Wednesday"]++;
				echo "WeekBlock es igual a ";print_r($weekBlock);
			}else if($data[8] == "Thursday"){
				$daysOfWeek["Thursday"]++;
				echo "WeekBlock es igual a ";print_r($weekBlock);
			}else if($data[8] == "Friday"){
				
				$daysOfWeek["Friday"]++;
				
				//@TODO: Arreglar la comparativa.
				if($weekBlock==1){
					echo "Weekblock when 1";
					$weekBlock--;
					
				}else{
					echo "Weekblock when 0";
					$weekBlock++;
				}
				
			}

			echo"<pre>";print_r($data);echo"</pre>";
			echo "<br>";

		}else{
			$data[8] = "DayOfWeek";
			$data[9] = "Result";
			echo"<pre>";
			print_r($data);
			echo"</pre>";
		}
	    	
	   	$i++;


	}

	echo"<pre>";
	print_r($results);
	echo"</pre>";
	echo"<pre>";
	print_r($daysOfWeek);
	echo"</pre>";

	echo "<h2>Last Two Weeks</h2>";
	echo"<pre>";
	print_r($week0);
	echo"</pre>";
	echo"<pre>";
	print_r($week1);
	echo"</pre>";

}

?>