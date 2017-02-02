<?php

########################
###  EDIT THIS FILE  ###
########################


// read from "input.json" and return as an array
function load_input_file_into_php_array() {
#This shows the file the directory of the data info
$file_string = file_get_contents("/data/input.json");
#Adding true will ensure objects are changed to associative arrays
$file_array = json_decode($file_string, true);
#Returning the variable will prevent a value of "null" showing up
  return $file_array;
print "Loading...\n";
}
// convert array to match structure in "correct-output.json"
function convert_array_to_output_format($input_array) {
  #assigning a variable the value of an empty array, using PHP5.4's shortcut
  $input_array = [];
  #Assigning each bird a value
  $item = 0;
  foreach($input_array['birds'] as $birds){
    for($birds as $data){
      $output_array[$item] = [
        'name' => $data['EnglishName'],
        'latin' => $data['Species'],
        'lifespan' => $data['Livespan']
      ]
    }
    #Post-incrementing the var
    $item++;
  };
  print "Converting...\n";  
  # Making something show up after the function is run
$output = json_encode($output_array);
return $output;

}
// save the array to file named "my-output.json" 
function save_php_array_to_output_file($output_array) {
  #This puts the contents of the var into the specified file
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