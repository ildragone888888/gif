<?php 
$yd_file = $_GET["rand"];
$nomergif = $_GET["razmer"];
$yd_files = $yd_file;
$yd_file = "".$yd_file."0.gif";
$f = fopen ("tok.gif","rb");
$token = fread($f,100);
fclose($f);
  if (empty($token))
	 {
 header("Content-type: image/gif");
 header("Content-Disposition: attachment; filename=".$yd_files."1.gif");
 echo "0";
exit;
	 } 
$ch = curl_init('https://cloud-api.yandex.net/v1/disk/resources/download?path=' . urlencode($yd_file));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $token));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
$req = curl_exec($ch);
curl_close($ch);
$req = explode(':"', $req);
$req = str_replace('https:','http:',$req[1]);
$req = explode('","', $req);
$req = file_get_contents($req[0]);
 if (empty($req))
	 {
 header("Content-type: image/gif");
 header("Content-Disposition: attachment; filename=".$yd_files."1.gif");
 echo "1";
exit;
	 }
$img  = substr($req, 0, $nomergif);
$req  = substr($req, $nomergif);
$imgm = strlen($img);

$req = strrev($req);
$req  = $req ^ str_repeat("345a", strlen($req));
$req = gzinflate($req);

$req = explode("|/-|",$req);	
mkdir("/app/$yd_files");
$rrr = $req[2] - $imgm;
if ($req[0] != "df")
{ 
$header = unserialize($req[3]);
$context  = stream_context_create($header);
$freq = file_get_contents($req[1], false, $context); 
$header = serialize($http_response_header);
$freq = "$header|/-|$freq";
$nomer = 0;
for($i=1;$i<=400;$i++){	
$fset = substr($freq, $rrr*($i-1), $rrr); 
	 if (empty($fset))
	{
		break;  
	}
$nomer++;
	$fset = gzdeflate($fset, 9);
	$fset  = $fset ^ str_repeat($req[4], strlen($fset));
  $f = fopen("/app/$yd_files/$yd_files$i.gif","w");
  $fset = "$img$fset";
	if ($nomer == 1)
	{	
$contents = $fset;
	}		 
fputs($f,$fset);
fclose($f);
}
}
if ($req[0] == "df")
{  
$f = fopen($req[1],'rb');  
$nomer = 0;
while (!feof($f))
{
$nomer++;
$fset = stream_get_contents($f, $rrr, -1); 
$fset = gzdeflate($fset, 1);
$fset  = $fset ^ str_repeat($req[4], strlen($fset)); 
$fset = "$img$fset"; 
$f1 = fopen("/app/$yd_files/$yd_files$nomer.gif","w"); 
if ($nomer == 1)
{
$contents = $fset;
}
fputs($f1,$fset); 
fclose($f1);
}
fclose($f);
}
$contents .= "|/-|$nomer";
header("Content-type: image/gif");
header("Content-Disposition: attachment; filename=".$yd_files."1.gif");
echo $contents;
