<?php
require_once("util.php");
$pattern=strtolower($_GET['pattern']);
$words = getAll('Name');
$response="";
$size=0;
for($i=0; $i<count($words); $i++)
{
   $pos=stripos(strtolower($words[$i]),$pattern);
   if(!($pos===false))
   {
     $size++;
     $word=$words[$i];
    
     $response.="<option value=\"$word\">$word</option>";
   }
}
if($size>0)
  echo "<select class=\"browser-default\" id=\"list2\" size=$size onclick=\"selectValue2()\">$response</select>";
?>
