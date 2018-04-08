<?php  
header ("Content-type: image/png");  
$handle = ImageCreate (230, 250) or die ("Cannot Create image");  
$bg_color = ImageColorAllocate ($handle, 125, 25, 30);  
$txt_color = ImageColorAllocate ($handle, 0, 155, 255);  
$line_color = ImageColorAllocate ($handle, 0, 155, 100);  
for($i=0;$i<=130;$i=$i+10) 
 {  imageellipse ($handle, $i, 125, 70, 70, $line_color);  }
#ImageString ($handle, 5, 5, 18, "Welome to VIT", $txt_color); 
ImagePng ($handle);  ?>

