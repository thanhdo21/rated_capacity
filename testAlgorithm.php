<?php
function check($arr){
    $main_arr = array();
    $i = 0;
      foreach ($arr as $value) {
        if (isset($main_arr[$i]) && count($main_arr[$i]) >= 3)  $i++;
        $main_arr[$i][] = $value;
    }
    //case 1: i.length==3 or i.length==2 =>true
    //case 2: i.length==1 =>false=> handle data 
    if(count($main_arr[$i])<2){
         $last_values = array_pop($main_arr[($i-1)]);
         $main_arr[$i][] = $last_values;
    }
    var_dump($main_arr);
}

$arr = array("A", "B", "C", "D", "R", "E", "G", "H", "J", "K", "U", "M", "N");
check($arr);

?>