<?php

function rewriteCSV(){

	$i = 0;
	$content_to_write = "";
	$indexName = "Russell2000";
	$fileName = $indexName."SourceData.csv";
	$myCSV = fopen($fileName, "r") or die("Unable to open file!");

	while (($data = fgetcsv($myCSV)) !== FALSE) {
		
		if($i == 0){
			$data[5] = "Range";
			$data[6] = "bodyRange";
			$data[7] = "bodyColor";

			$content_to_write .= "Date,";
			$content_to_write .= "Open,";
			$content_to_write .= "High,";
			$content_to_write .= "Low,";
			$content_to_write .= "Close,";
			$content_to_write .= "Range,";
			$content_to_write .= "bodyRange,";
			$content_to_write .= "bodyColor";
			$content_to_write .= "\n";

		}else{

			// open => $data[1]
			// close => $data[4]
			
			//Range = diff (high - low)
			$data[5] = ($data[2] - $data[3]);
			$data[5] = number_format($data[5], 2, '.', '');

			//bodyRange = diff (close - open)
			$data[6] = ($data[4] - $data[1]);
			$data[6] = number_format($data[6], 2, '.', '');

			if ($data[4] > $data[1]){ 
				$data[7] = "GREEN";
			}else if($data[4] < $data[1]){
				$data[7] = "RED";
			}else if($data[4] == $data[1]){
				$data[7] = "DOJI";
			}

			$content_to_write .= trim($data[0]) . ",";
			$content_to_write .= trim($data[1]) . ",";
			$content_to_write .= trim($data[2]) . ",";
			$content_to_write .= trim($data[3]) . ",";
			$content_to_write .= trim($data[4]) . ",";
			$content_to_write .= trim($data[5]) . ",";
			$content_to_write .= trim($data[6]) . ",";
			$content_to_write .= trim($data[7]) . "\n";
		
		}

		echo "<pre>";
		echo $i . ": "; 
		print_r($data);
		echo "</pre>";

		$i++;
	}

	$archivo_a_escribir = fopen("Russell2000SourceData_re_escribido.csv", 'w');
	fwrite($archivo_a_escribir, $content_to_write);
	fclose($archivo_a_escribir);

	//print_r($content_to_write);

}

	rewriteCSV();



?>