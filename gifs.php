<?php
$rand = $_GET["rand"];
$nomergif = $_GET["razmer"];
$randd = $rand;
$rand = "".$rand."0.gif";
$f = fopen ("tok.gif","rb");
$token = fread($f,filesize("tok.gif"));
fclose($f);
if (empty($token)){
header("Content-type: image/gif");
header("Content-Disposition: attachment; filename=".$randd."1.gif");
echo 'nt'; exit; } 
$ch = curl_init('https://cloud-api.yandex.net/v1/disk/resources/download?path=' . urlencode($rand));
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
if (empty($req)){ 
header("Content-type: image/gif");
header("Content-Disposition: attachment; filename=".$randd."1.gif");
echo 'ny'; exit; }
$img  = substr($req, 0, $nomergif);
$req  = substr($req, $nomergif);
$imgm = strlen($img);
$req = strrev($req);
$req  = $req ^ str_repeat("345a", strlen($req));
$req = gzinflate($req);
$req = explode("/-|",$req);	
$rrr = $req[2] - $imgm;
$url = base64_decode($req[1]);
$met = $req[0];
$contenttype = $req[5];
$contenttype = explode("%-|",$contenttype);
$razr = $contenttype[1];
mkdir("/app/$randd");
if ($met == 'df')
{
$f = fopen($url,'rb');  
$nomer = 0;
$n = 1;
while (!feof($f))
{
$rrrstr = 0;
$f1 = fopen("/app/".$randd."/".$randd."".$n.".".$razr."","a"); 
for($i=1;$i<=400;$i++) {	
$fset = stream_get_contents($f, 131072, -1);
if (empty($fset)) 
{
break; 
}
$rrrstr = $rrrstr+131072;
$fset  = $fset ^ str_repeat($req[4], strlen($fset));  
if  ($i == 1)
{
$fset = "$img$fset";   
}
fwrite($f1,$fset);
if ($rrrstr >= $rrr) 
{
break; 
}
}
fclose($f1);
$nomer++;
$n++;
}
fclose($f);
$f3 = fopen ("/app/".$randd."/".$randd."1.".$razr."","rb"); 
$contents = fread($f3,filesize("/app/".$randd."/".$randd."1.".$razr.""));
fclose($f3);
}
else
{ 
$header = unserialize($req[3]);
$context  = stream_context_create($header);
$freq = file_get_contents($url, false, $context); 
$header = serialize($http_response_header);
$freq = "$header/-|$freq";
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
$fset = "$img$fset";	 
$f = fopen("/app/".$randd."/".$randd."".$nomer.".".$razr."","w");
fwrite($f,$fset);
fclose($f);
}
$f1 = fopen ("/app/".$randd."/".$randd."1.".$razr."","rb");
$contents = fread($f1,filesize("/app/".$randd."/".$randd."1.".$razr.""));
fclose($f1);
}
$nomer = base64_encode($nomer);
$nomer = gzdeflate($nomer, 9);
$contents .= "/-|$nomer";
header("Content-type: ".$contenttype[0]."");
header("Content-Disposition: attachment; filename=".$randd."1.".$razr."");
echo $contents;
