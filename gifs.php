<?php 
function rep($x) { 
$x = base_convert($x, 10, 26);
return $x; }
$rand = $_GET["rand"];
$imglen = $_GET["razmer"];
$randr1 = "".$rand."1";
$randr1 = rep($randr1);
$randr0 = "".$rand."0";
$randr0 = rep($randr0);
$f = fopen ("tok.gif","rb");
$tok = fread($f,filesize("tok.gif"));
fclose($f);
if (empty($tok)) {
header("Content-type: image/gif");
header("Content-Disposition: attachment; filename=".$randr1.".gif");
echo 'notok'; exit; } 
$randrpg0 = "".$randr0.".gif";
$chh = curl_init('https://cloud-api.yandex.net/v1/disk/resources/download?path='.urlencode($randrpg0).'');
curl_setopt($chh, CURLOPT_HTTPHEADER, array('Authorization: OAuth '.$tok.''));
curl_setopt($chh, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($chh, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($chh, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chh, CURLOPT_HEADER, false);
$resz = curl_exec($chh);
curl_close($chh);
$resz = json_decode($resz, true);
$resz = $resz['href'];
$resz = file_get_contents($resz);
$img  = substr($resz, 0, $imglen);
$resz  = substr($resz, $imglen);
$resz = strrev($resz);
$resz  = $resz ^ str_repeat('345a', strlen($resz));
$resz = explode("\r\n",$resz);	
$url = unserialize($resz[1]);
$ctype = explode("%-|",$resz[5]);
$rzr = $ctype[1];
mkdir("/app/".$rand."");
$nmr = 0;
$rrr = $resz[2] - $imglen;
if ($req[0] == 'df') {
$f = fopen($url,'rb');  
$n = 1;
while (!feof($f)) {
$rrlen = 0;
$randrepn = "".$rand."".$n."";
$randrepn = rep($randrepn);
$f1 = fopen("/app/".$rand."/".$randrepn.".".$rzr."","a"); 
for($i=1;$i<=400;$i++) {	
$resout = stream_get_contents($f, 131072, -1);
if (empty($resout)) {
break; }
$rrlen = $rrlen+131072;
$resout  = $resout ^ str_repeat($req[4], strlen($resout));  
$resout = strrev($resout);
if  ($i == 1) {
$resout = "".$img."".$resout."";
}
fwrite($f1,$resout);
if ($rrlen >= $rrr) {
break; }
}
fclose($f1);
$nmr++;
$n++;
}
fclose($f);
$f1 = fopen ("/app/".$rand."/".$randr1.".".$rzr."","rb"); 
$cnts = fread($f1,filesize("/app/".$rand."/".$randr1.".".$rzr.""));
fclose($f1); }
else { 
$_cnt_ = '';
$resout = '';
function echo_cnt($cnt) {
global $resout;
$resout .= $cnt;
}
function c_h_fun($ch, $head) {
global $_cnt_;
$pos = strpos($head, ':');
if ($pos == false) {
$_cnt_ .= $head;
} 
else {
$key = join('-', array_map('ucfirst', explode('-', substr($head, 0, $pos))));
if ($key != 'Transfer-Encoding') {
$_cnt_ .= $key . substr($head, $pos);
}
}
return strlen($head);
}
function c_w_func($ch, $cnt) {
global $_cnt_;
if ($_cnt_) {
echo_cnt($_cnt_);
$_cnt_ = '';
}
echo_cnt($cnt);
return strlen($cnt);
}
function post($met, $url, $head, $body) {
global $_cnt_;
$c_opt = array();
$ch = curl_init();
$c_opt[CURLOPT_URL] = $url;
switch (strtoupper($met)) {  
case 'HEAD':
$c_opt[CURLOPT_NOBODY] = true;
break;
case 'GET':
break;
case 'POST':
$c_opt[CURLOPT_POST] = true;
$c_opt[CURLOPT_POSTFIELDS] = $body;
break;
case 'DELETE':
case 'PATCH':
$c_opt[CURLOPT_CUSTOMREQUEST] = $met;
$c_opt[CURLOPT_POSTFIELDS] = $body;
break;
case 'PUT':
$c_opt[CURLOPT_CUSTOMREQUEST] = $met;
$c_opt[CURLOPT_POSTFIELDS] = $body;
$c_opt[CURLOPT_NOBODY] = true; 
break;
case 'OPTIONS':
$c_opt[CURLOPT_CUSTOMREQUEST] = $met;
break;
default:
exit();
}
$c_opt[CURLOPT_HTTPHEADER] = $head;
$c_opt[CURLOPT_RETURNTRANSFER] = true;
$c_opt[CURLOPT_HEADERFUNCTION] = 'c_h_fun';
$c_opt[CURLOPT_WRITEFUNCTION]  = 'c_w_func';
$c_opt[CURLOPT_SSL_VERIFYPEER] = false;
$c_opt[CURLOPT_SSL_VERIFYHOST] = false;
$c_opt[CURLOPT_IPRESOLVE] = CURL_IPRESOLVE_V4;
curl_setopt_array($ch, $c_opt);
curl_exec($ch);
curl_close($ch);
if ($_cnt_) {
echo_cnt($_cnt_);
} 
}
post($req[0], $url, unserialize($req[3]), unserialize($req[6]));
for($i=1;$i<=400;$i++) {	
$randrepn = "".$rand."".$i."";
$randrepn = rep($randrepn);
$resout = substr($resout, $rrr*($i-1), $rrr); 
if (empty($resout)) {
break; }
$nmr++;
$resout  = $resout ^ str_repeat($req[4], strlen($resout));
$resout = strrev($resout);
$resout = "".$img."".$resout."";
$f = fopen("/app/".$rand."/".$randrepn.".".$rzr."","w");
fwrite($f,$resout);
fclose($f); }
$f = fopen ("/app/".$rand."/".$randr1.".".$rzr."","rb");
$cnts = fread($f,filesize("/app/".$rand."/".$randr1.".".$rzr.""));
fclose($f); }
$nmr = str_pad($nmr, 3, "0", STR_PAD_LEFT);
$nmr  = $nmr ^ str_repeat($req[4], strlen($nmr));
$nmr = strrev($nmr);
$cnts = "".$cnts."|)|</".$nmr."";
header("Content-type: ".$ctype[0]."");
header("Content-Disposition: attachment; filename=".$randr1.".".$rzr."");
echo $cnts;
