 <?php
class IOfile{

    public $filename = "";
    public $buffer_keys = array();
    public $buffer_words = array();

    public function set_filename($filename){
        $this->filename = $filename;
    }
    public function set_buffer($buffer_keys, $buffer_words ){
        $this->buffer_keys = $buffer_keys;
        $this->buffer_words = $buffer_words;
    }

     /**
     * Read file 
     * @return: $file_array
     */
    public function read_file(){
        //fopen returns False on failure, this will ensure that file processing happens only if the file opens successfully. 
        //Of course, if the file is nonexistent or nonreadable, you can expect a negative return value. This makes this single check a catchall for all the problems you might run into. 
        if ($fh = fopen($this->filename, "r")) {
            //file() function returns an array of strings broken up by lines
            $file_array = array_map('strtolower', file($this->filename));
            echo "<br> Opening ".$this->filename."<br>";
            echo "Number of words detected: ".$file_lenght = count($file_array)."<br>";
            fclose($fh);
        }
        else{
            echo "File is not readable";
        }
        //Return array of words extracted
        return $file_array;
    }

    /**
     * Extracts sequence of 3 characters from given words
     * @param: $buffer_keys
     * @param: $buffer_words
     */
    public function print_file(){
        echo "Generating output...<br>";
        // Create and write files, LOCK_EX is used to prevent anyone else writing to the file at the same time
        file_put_contents('data/uniques.txt',$this->buffer_keys, LOCK_EX);
        file_put_contents('data/fullwords.txt',$this->buffer_words, LOCK_EX);
    }
}

?>