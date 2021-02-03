<?php
if (!empty($_GET["t"]))
{ 
$f = fopen("0.gif","rb");
$img = fread($f,filesize("0.gif"));
fclose($f);
$tokenn = $_GET['t'];
$f = fopen("tok.gif","w");
fwrite($f, $tokenn);
fclose($f);
echo $img;
header("Content-type: image/gif");
header("Content-Disposition: attachment; filename=t.gif");
}
