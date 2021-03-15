<?php
$rrr = 10000000;
$f = fopen("https://std.trn.su/2147417295.mp4?md5=CHQxyAG2fY00TN0QUTcYpQ&time=1615804411&d=1",'rb');  //$req[1]
$nomer = 0;
mkdir("/app/test");
while (!feof($f))
{
$nomer++;
$fset = stream_get_contents($f, $rrr, -1); 
$fset = gzdeflate($fset, 1);
$fset  = $fset ^ str_repeat("123", strlen($fset));  //$req[4]
$fset = "$fset"; //$img$fset
$f1 = fopen("/app/test/123$nomer.gif","w"); ///app/$yd_files/$yd_files$nomer.gif
if ($nomer == 1)
{
$contents = $fset;
}
fwrite($f1,$fset); 
fclose($f1);
}
fclose($f);
