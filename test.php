<?php
$yd_files = 1111;
$rrr = 10000000;
$f = fopen("https://std.trn.su/2147417295.mp4?md5=CHQxyAG2fY00TN0QUTcYpQ&time=1615804411&d=1",'rb');  //$req[1]
$nomer = 0;
mkdir("/app/$yd_files");
while (!feof($f))
{
$fset = stream_get_contents($f, $rrr, -1); 
 if (empty($fset))
	{
		break;  
	}
$nomer++;
$fset = gzdeflate($fset, 9);
$fset  = $fset ^ str_repeat("32а", strlen($fset));  
$fset = "$img$fset"; 
if ($nomer == 1)
	{	
$contents = $fset;
	}	
$f1 = fopen("/app/".$yd_files."/".$yd_files."".$nomer.".gif","w");
fwrite($f1,$fset); 
fclose($f1);
}
fclose($f);
echo $nomer;
