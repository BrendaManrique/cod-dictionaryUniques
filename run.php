 <?php
 /**
 * run.php
 * The routine was created using stdClass that is PHP's generic 
 * empty class, instead of complicating the code with custom classes for this simple task. 
 * Also due to time limitations.
 * This project did not use a PHP framework because there is no need for an elaborated interaction with the model or view. 
 * Author: Brenda Truong
 * Date: 1-Dec-2015
 * Version: 1.0
 */
include_once("iofile.php");
//Class to read and write files
$io = new IOfile();
$data_path="data/"; 
//Time of start of the script. Microtime, returns the current Unix timestamp with microseconds
$timer_start = microtime(true);
$filename = $data_path."words.txt";
//Boolean that receives HTTP request: "T" for "Generate uniques" and "F" for "Generate all"
$bool_unique=$_POST["unique"];
//If boolean was not received and is empty
if (!isset($bool_unique) && empty($bool_unique)) {
 	echo "Please, select an option <br>";
}
else{
    //Set name of file in class object
    $io->set_filename($filename);
	//Call io class function to read file
	$file_array=$io->read_file();
	create_dictionary($file_array,$bool_unique);
}




 /**
 * Create dictionary, sequence of 3 characters extracted
 * @param: $file_array 
 * @param: $bool_unique
 */
function create_dictionary($file_array,$bool_unique){
	echo "Creating dictionary...<br>";
	//Generic empty class stdClass used to save resources in class customization
	$dictionary = new stdClass;
	//Array of sequence of 3 characters
	$keys_array = array();
	echo "Extracting sequence of 4 characters...<br>";
	foreach($file_array as $row){
		//Call function to extract sequence of characters from a given word
	   $sequence_array = extract_seq($row);
	   foreach ($sequence_array as $key) {
	   		//If the key (sequence of 3 characters) is not contained in a word yet
		  	if (empty($dictionary->$key)){
		  		$dictionary->$key=array();
		  		//Create a separate array of key to extract information from stdClass later
		  		array_push($keys_array, $key);
		  		
		  	}
		  	//Load full word into stdClass object based on key 
		  	array_push($dictionary->$key, $row);	  
	   }
	}
	//Call funtion to order array
	order_unique($dictionary, $keys_array,$bool_unique);
}


 /**
 * Extracts sequence of 3 characters from given words
 * @param: $row 
 * @return: $s_array
 */
function extract_seq($row){
	$initial_lenght = strlen($row);
	$s_array=array();
	//Word is has at least 3 characters 
	if ($initial_lenght>=3){
		for ($i=0; $i<strlen($row)-3;$i++){		
			//Extract a substring of 3 consecutive characters starting from $i position	
			$substring = substr($row, $i,3);
			//Add to array of substrings
			array_push($s_array,$substring);			
			
		}
	}
	return $s_array;
}

/**
 * Extracts sequence of 3 characters from given words
 * @param: $dictionary
 * @param: $keys_array
 * @param: $bool_unique
 */
function order_unique($dictionary, $keys_array, $bool_unique){
	echo "Writing list in alphabetical order...<br>";
	$buffer_words="";
	$buffer_keys="";
	//Order array of keys alphabetically
	sort($keys_array);
	$keys_length = count($keys_array);
	//Create a buffer of keys and words
	foreach ($keys_array as $key){ 	
		$key_array_lenght = count($dictionary->$key);
		 //If user selected "Generate uniques" 
		 if ($bool_unique=="T"){
		 	if ($key_array_lenght <=1){
		 	 $buffer_keys.= $key. "\r\n"; 
		 	 //Extracts value from array inside object->key
		 	 $buffer_words.= reset($dictionary->$key);
		 	 
		 	}
		 }
		 //If user selected "Generate all"
		else{
			$temp_words="";
			 $buffer_keys.= $key. "\r\n"; 
			 //Extracts each word where the key is used		 	
		 	 foreach($dictionary->$key as $word){
		 	 	$temp_words .= $word;	
			 }	
		 	$buffer_words.= $temp_words ."\r\n";	
		 	
		}	   
	}
	//Class to read and write files
	$io = new IOfile();
	//Set buffer arrays in class object
    $io->set_buffer($buffer_keys, $buffer_words);
    //Call io class function to print file
	$io->print_file();
	//print_file($buffer_keys, $buffer_words);

}



//Time of end of the script
$timer_end = microtime(true);
//Convert from seconds to minutes by diving with 60. 
 $timer_total = ($timer_end - $timer_start) / 60;
 echo "Execution time:".$timer_total." <br>";
 echo "<a href='data/uniques.txt' target='_blank'>uniques.txt</a> - <a href='data/fullwords.txt'  target='_blank'>fullwords.txt</a> ";

 ?>	