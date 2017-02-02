<?php

########################
###  EDIT THIS FILE  ###
########################



// read from "input.json" and return as an array
function load_input_file_into_php_array() {
$file_string = file_get_contents("/data/input.json");
$file_array = json_decode($file_string, true);
  print "Loading...\n";
  return $file_array;


}
// convert array to match structure in "correct-output.json"
function convert_array_to_output_format($input_array) {
  print "Converting...\n";  


}
// save the array to file named "my-output.json" 
function save_php_array_to_output_file($output_array) {
  file_put_contents('my-output.json', $output_array);
  print "Saving...\n";    


}

########################################################################
###  Note: Final "my-output.json" file should match structure of     ###
###  "correct-output.json" - but, whitespace does NOT have to match. ###
########################################################################

########################################################################
###  Tip - Look at these built-in PHP functions:                     ###
###  json_encode, json_decode, file_put_contents, file_get_contents  ###
########################################################################

