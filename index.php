<!DOCTYPE html>
<html lang="es">
<head> 
	<title>Code challenge</title>
	<meta charset="utf-8"/>
	<meta name="description" content="Code challenge"/>
	<meta name="viewport" content="width=device-width,initial-scale=1"/>
	<link rel="author" type="text/plain" href="data/humans.txt" />
	<link rel="stylesheet" type="text/css"  href="css/style.css" /> 
	<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif] -->

</head>
<body>
	<header>
		<h1>
			<a href="index.html">
				<img class="fade" alt="Code challenge - PHP"  />
			</a>
		</h1>
		<nav>
			<ul>
				<li><a href="index.html">Generate</a></li>
			</ul>
		</nav>
	</header>
	<section id="container">
		<section id="principal">
			<article id="box">
				<div>Description</div>


 <?php
 echo 'Current PHP version: ' . phpversion();

$timer_start = microtime(true);
$filename = "data/words.txt";
echo $filename;

//Because fopen returns False on failure, this will ensure that file processing happens only if the file opens successfully. Of course, if the file is nonexistent or nonreadable, you can expect a negative return value. This makes this single check a catchall for all the problems you might run into. 
if ($fh = fopen($filename, "r")) {
 	//PHP's file() function does this in one step: It returns an array of strings broken up by lines.
 	$file_array = array_map('strtolower', file($filename));

 	echo "Number of words: ".$file_lenght = count($file_array);
	fclose($fh);
}
else{
	echo "File is not readable";
}


//
//$indexed = array();
//foreach ($r as $row) {
  //  $indexed[$row['item_id']] = $row;
//}

//Create dictionary
$dictionary = new stdClass;
$keys_array = array();
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

print_unique($array_unique);
//var_dump($dictionary);

function extract_seq($row){
	$initial_lenght = strlen($row);
	$s_array=array();
	if ($initial_lenght>=3){
		for ($i=0; $i<strlen($row)-3;$i++){			
			$split = substr($row, $i,3);
			array_push($s_array,$split);			
			//echo $split."##";
		}
	}
	//echo $s_array[0];
	return $s_array;
}

function order_unique($dictionary, $keys_array, $bool_unique){

	$buffer_words="";
	
	$buffer_keys="";
	sort($keys_array);
	
	 echo "<br>";
	$keys_length = count($keys_array);
	foreach ($keys_array as $key){ //x = 0; $x <  $keys_length; $x++) {		
		//$key = $keys_array[$x];
		$key_array_lenght = count($dictionary->$key);
		 if ($bool_unique=="T"){
		 	if ($key_array_lenght <=1){
		 	 $buffer_keys.= $key. "\r\n"; 
		 	 echo $key."=";
		 	 echo reset($dictionary->$key)."<br>";		 		
		 	 $buffer_words.= reset($dictionary->$key);
		 	}
		 }
		else{
			$temp_words="";
			 $buffer_keys.= $key. "\r\n"; 
		 	 echo $key."=";
		 	 
		 	 foreach($dictionary->$key as $word){
		 	 	echo $word;
				$temp_words .= $word;	
				//echo  $word.". "; 		
		 	 }	
		 	
		 	// echo "<br>";		
		 	 $buffer_words.= $temp_words ."\r\n";	
		 	

		}
	    // echo $keys_array[$x]."-";
	    // var_dump($dictionary->$keys_array[$x]);
	    // echo "<br>";
	}

	
	//var_dump($dictionary);

//$file_handle = fopen('data/filename.txt', 'w') or die("Unable to open file!");
//	fwrite($file_handle, $buffer);
//fclose($file_handle);

// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
	file_put_contents('data/uniques.txt',$buffer_keys, LOCK_EX);
	file_put_contents('data/fullwords.txt',$buffer_words, LOCK_EX);
/*
$fp = fopen('data/uniques.txt', 'w');
fwrite($fp, $buffer);
fclose($fp);

	echo "FINAL:".print_unique($buffer);
*/
}


function print_unique($buffer){
	//if error
		 	//echo $buffer;
  $file_handle = fopen('data/filename.txt', 'w') or die("Unable to open file!");
//	fwrite($file_handle, $buffer);
//fclose($file_handle);


	return $success = file_put_contents('data/filename.txt',$buffer);
}
$timer_end = microtime(true);
//dividing with 60 will give the execution time in minutes other wise seconds !!!!
 echo $timer_total = ($timer_end - $timer_start) / 60;

/*

echo "-----------";
         $time_start = microtime(true);
         $lines = file('data/words.txt');
		// $lines = fopen("http://test.chrisborkowski.com/test-instructions/words.txt", "r") or die("Unable to open file!");
         $result = count($lines);
         
         echo '<p class="message-text">Number&nbsp;of&nbsp;Full&nbsp;Words&nbsp;in&nbsp;the&nbsp;file&nbsp;"words.txt"&nbsp;:' . $result . '</p>';
         echo '<ul>';
         // Loop through our array print line numbers and length of each item.
         foreach ($lines as $line_num => $line) {	
         	$buffer = str_replace(array("\r", "\n"), "", $line);	
         	echo '<li><b>Line&nbsp;number&nbsp;of&nbsp;file&nbsp;and&nbsp;original&nbsp;word:&nbsp;'. $line_num .'</b><span class="actual-word">&nbsp;'. htmlspecialchars($buffer) . '</span><i>&nbsp;Word&nbsp;and&nbsp;string&nbsp;length:&nbsp;' . strlen($buffer) . '</i></li>';
         
         }
         echo '</ul>';
         $time_end = microtime(true);
         //dividing with 60 will give the execution time in minutes other wise seconds
         $execution_time = ($time_end - $time_start) / 60;
         //execution time of the script
         echo '<p class="message-header">PHP&nbsp;Script&nbsp;Execution&nbsp;Time:&nbsp;' . $execution_time . '&nbsp;Seconds</p>';
*/
         ?>


				<div class="flexslider">
					<ul class="slides">
						<li>
							<p class="flex-caption">Primera</p>
						</li>
					
					</ul>
				</div>
			</article>
		</section>
		
	</section>
	<footer>
		Aprendiendo HTML5,css3, jquery y responsive web
	</footer>
</body>
</html>