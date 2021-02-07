<?php
/* $canvas = imagecreatetruecolor(200, 200);
$pink = imagecolorallocate($canvas, 255, 105, 180);
imagerectangle($canvas, 50, 50, 150, 150, $pink);



header('Content-Type: image/jpeg');
imagejpeg($canvas);
imagedestroy($canvas);



 */



// Create a 55x30 image
$im = imagecreatetruecolor(250, 250);
$white = imagecolorallocate($im, 255, 255, 255);

// Draw a white rectangle
imagefilledrectangle($im, 4, 4, 246, 246, $white);

// Save the image
imagepng($im, './asset/media/shape.png');
imagedestroy($im);

?>
<img src="<?=base_url('/asset/media/shape.png')?>" height="250px" >