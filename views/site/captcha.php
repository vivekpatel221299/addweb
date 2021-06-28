<?php 
@session_start(); 
//$text = rand(100000,999999); 
$captchanumber = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; // Initializing PHP variable with stringdie;
$captchanumber = substr(str_shuffle($captchanumber), 0, 5); // Getting first 6 word after shuffle.

$_SESSION["vercode"] = $captchanumber; 
//echo $_SESSION["vercode"];
 $path = "Captcha.jpg";
// $path = "Captcha.jpg";
// echo $path;die;
$im = imagecreatefromjpeg($path);
//echo $im;die;
  function shadow_text($im, $size, $x, $y, $font, $captchanumber)
  {
    $black = imagecolorallocate($im, 0, 0, 0);
    $white = imagecolorallocate($im, 255, 255, 255);
    imagettftext($im, $size, 0, $x + 1, $y + 1, $white, $font, $captchanumber);
    imagettftext($im, $size, 0, $x + 0, $y + 1, $white, $font, $captchanumber);
    imagettftext($im, $size, 0, $x + 0, $y + 0, $white, $font, $captchanumber);
  }

  $font = 'fonts/FaunaOne-Regular.ttf';
  $size = 16;
  $bbox = imagettfbbox($size, 0, $font, 'ky');
  $x = 16; $y = 7 - $bbox[5];
  $textcolor = imagecolorallocate($im, 255, 255, 255);
  shadow_text($im, $size, $x, $y, $font, $captchanumber);
  header("Content-Type: image/jpeg");
  imagejpeg($im, null, 90);
  
  
  
  ?>


