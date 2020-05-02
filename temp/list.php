<?php
$directory = "./";
 
$images = glob("" . $directory . "*.png");
 
$imgs = '';
// create array
foreach($images as $image){ $imgs[] = "$image"; }
 
//display images
echo '<p>'.count($imgs ).' images</p>';
foreach ($imgs as $img) {
	echo "<p><img src='$img' width='500px'/></p>\n";
}