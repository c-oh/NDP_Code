<?php

########################
###  EDIT THIS FILE  ###
########################


// read from "input.json" and return as an array
function load_input_file_into_php_array() {
#This shows the file the directory of the data info
$file_string = file_get_contents("data/input.json");
#Adding true will ensure objects are changed to associative arrays
$file_array = json_decode($file_string, true);
  #Prints out a message to the command line when function is excecuted
print "Loading...\n";
#Returning the variable will prevent a value of "null" showing up
  return $file_array;
}

// convert array to match structure in "correct-output.json"
function convert_array_to_output_format($input_array) {
  #assigning a variable the value of an empty array, using PHP5.4's shortcut
  $output_array = [];
  #Assigning each bird a value
  $item = 0;
  #foreach loop ensures that function is applied to every value in the array
  foreach($input_array['birds'] as $otherbird){
    #second foreach loop ensures the values in the bird array is addressed and changed, and loops through while setting new key and unsetting the old one
    foreach($otherbird as $data){
  $output_array[$item] = array(
        'name' => $data['EnglishName'],
        'latin' => $data['Species'],
        'lifespan' => $data['Lifespan']);
  }
    #Post-incrementing the var so the function will keep on running until it reaches last object
  $item++;
  };
  #Prints out a message to the command line when function is excecuted
  print "Converting...\n";  
  #Assigning the return of results in json, and addressing it to a var
$output = json_encode($output_array);
#ensures data is returned as a value
return $output;

}

// save the array to file named "my-output.json" 
function save_php_array_to_output_file($output_array) {
  #This puts the contents of the var into the specified file
  file_put_contents('my-output.json', $output_array);
  #Prints out a message to the command line when function is excecuted
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