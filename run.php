
 <?php
$data_path="data/"; 
$timer_start = microtime(true);
$filename = $data_path."words.txt";

//Because fopen returns False on failure, this will ensure that file processing happens only if the file opens successfully. Of course, if the file is nonexistent or nonreadable, you can expect a negative return value. This makes this single check a catchall for all the problems you might run into. 
if ($fh = fopen($filename, "r")) {
 	//PHP's file() function does this in one step: It returns an array of strings broken up by lines.
 	$file_array = array_map('strtolower', file($filename));
 	echo "<br> Opening ".$filename."<br>";
 	echo "Number of words detected: ".$file_lenght = count($file_array)."<br>";
	fclose($fh);
}
else{
	echo "File is not readable";
}

//Create dictionary
echo "Creating dictionary...<br>";
$dictionary = new stdClass;
$keys_array = array();
echo "Extracting sequence of 4 characters...<br>";
foreach($file_array as $row){
   $sequence_array = extract_seq($row);
   foreach ($sequence_array as $key) {
	  	if (empty($dictionary->$key)){
	  		$dictionary->$key=array();
	  		array_push($keys_array, $key);
	  		
	  	}
	  	array_push($dictionary->$key, $row);	  
   }
}
$array_unique=order_unique($dictionary, $keys_array,"F");


function extract_seq($row){
	$initial_lenght = strlen($row);
	$s_array=array();
	if ($initial_lenght>=3){
		for ($i=0; $i<strlen($row)-3;$i++){			
			$split = substr($row, $i,3);
			array_push($s_array,$split);			
			
		}
	}
	return $s_array;
}

function order_unique($dictionary, $keys_array, $bool_unique){
	echo "Writing list in alphabetical order...<br>";
	$buffer_words="";
	$buffer_keys="";
	sort($keys_array);
	
	$keys_length = count($keys_array);
	foreach ($keys_array as $key){ 	
		$key_array_lenght = count($dictionary->$key);
		 if ($bool_unique=="T"){
		 	if ($key_array_lenght <=1){
		 	 $buffer_keys.= $key. "\r\n"; 
		 	 $buffer_words.= reset($dictionary->$key);
		 	 
		 	}
		 }
		else{
			$temp_words="";
			 $buffer_keys.= $key. "\r\n"; 
		 	
		 	 foreach($dictionary->$key as $word){
		 	 	$temp_words .= $word;	
			 }	
		 	$buffer_words.= $temp_words ."\r\n";	
		 	
		}	   
	}
	print_unique($buffer_keys, $buffer_words);

}


function print_unique($buffer_keys,  $buffer_words){
	echo "Generating output...<br>";
	// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
	file_put_contents('data/uniques.txt',$buffer_keys, LOCK_EX);
	file_put_contents('data/fullwords.txt',$buffer_words, LOCK_EX);
}

$timer_end = microtime(true);
//Convert from seconds to minutes by diving with 60. 
 $timer_total = ($timer_end - $timer_start) / 60;
 echo "Execution time:".$timer_total." <br>";
 echo "<a href='data/uniques.txt'>uniques.txt</a> - <a href='data/fullwords.txt'>fullwords.txt</a> ";

 ?>	