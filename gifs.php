<?php 
function rep($x) { 
$x = base_convert($x, 10, 26);
return $x; }
$rand = $_GET["rand"];
$nomergif = $_GET["razmer"];
$randdrep1 = "".$rand."1";
$randdrep1 = rep($randdrep1);
$randdrep0 = "".$rand."0";
$randdrep0 = rep($randdrep0);
$f = fopen ("tok.gif","rb");
$token = fread($f,filesize("tok.gif"));
fclose($f);
if (empty($token)) {
header("Content-type: image/gif");
header("Content-Disposition: attachment; filename=".$randdrep1.".gif");
echo 'nt'; exit; } 
$randdrepg0 = "".$randdrep0.".gif";
$chh = curl_init('https://cloud-api.yandex.net/v1/disk/resources/download?path='.urlencode($randdrepg0).'');
curl_setopt($chh, CURLOPT_HTTPHEADER, array('Authorization: OAuth '.$token.''));
curl_setopt($chh, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($chh, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($chh, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chh, CURLOPT_HEADER, false);
$req = curl_exec($chh);
curl_close($chh);
$req = json_decode($req, true);
$req = $req['href'];
$req = file_get_contents($req);
$img  = substr($req, 0, $nomergif);
$req  = substr($req, $nomergif);
$imgm = strlen($img);
$req = strrev($req);
$req  = $req ^ str_repeat('345a', strlen($req));
$req = explode("\r\n",$req);	
$rrr = $req[2] - $imgm;
$met = $req[0];
$url = unserialize($req[1]);
$contenttype = explode("%-|",$req[5]);
$razr = $contenttype[1];
mkdir("/app/".$rand."");

if ($met == 'df') {
$f = fopen($url,'rb');  
$nomer = 0;
$n = 1;
while (!feof($f)) {
$rrrstr = 0;
$randdrepn = "".$rand."".$n."";
$randdrepn = rep($randdrepn);
$f1 = fopen("/app/".$rand."/".$randdrepn.".".$razr."","a"); 
for($i=1;$i<=400;$i++) {	
$fset = stream_get_contents($f, 131072, -1);
if (empty($fset)) {
break; 
}
$rrrstr = $rrrstr+131072;
$fset  = $fset ^ str_repeat($req[4], strlen($fset));  
$fset = strrev($fset);
if  ($i == 1) {
$fset = "".$img."".$fset."";
}
fwrite($f1,$fset);
if ($rrrstr >= $rrr) {
break; 
}
}
fclose($f1);
$nomer++;
$n++;
}
fclose($f);
$f1 = fopen ("/app/".$rand."/".$randdrep1.".".$razr."","rb"); 
$contents = fread($f1,filesize("/app/".$rand."/".$randdrep1.".".$razr.""));
fclose($f1);
}
else { 
$__content__ = '';
$freq = '';
function echo_content($content) {
global $freq;
$freq .= $content;
}
function curl_header_function($ch, $header) {
global $__content__;
$pos = strpos($header, ':');
if ($pos == false) {
$__content__ .= $header;
} 
else {
$key = join('-', array_map('ucfirst', explode('-', substr($header, 0, $pos))));
if ($key != 'Transfer-Encoding') {
$__content__ .= $key . substr($header, $pos);
}
}
return strlen($header);
}
function curl_write_function($ch, $content) {
global $__content__;
if ($__content__) {
echo_content($__content__);
$__content__ = '';
}
echo_content($content);
return strlen($content);
}
function post($met, $url, $headers, $body) {
$curl_opt = array();
$ch = curl_init();
$curl_opt[CURLOPT_URL] = $url;
switch (strtoupper($met)) {  
case 'HEAD':
$curl_opt[CURLOPT_NOBODY] = true;
break;
case 'GET':
break;
case 'POST':
$curl_opt[CURLOPT_POST] = true;
$curl_opt[CURLOPT_POSTFIELDS] = $body;
break;
case 'DELETE':
case 'PATCH':
$curl_opt[CURLOPT_CUSTOMREQUEST] = $met;
$curl_opt[CURLOPT_POSTFIELDS] = $body;
break;
case 'PUT':
$curl_opt[CURLOPT_CUSTOMREQUEST] = $met;
$curl_opt[CURLOPT_POSTFIELDS] = $body;
$curl_opt[CURLOPT_NOBODY] = true; 
break;
case 'OPTIONS':
$curl_opt[CURLOPT_CUSTOMREQUEST] = $met;
break;
default:
echo_content("HTTP/1.0 502\r\n\r\n" . message_html('502 Urlfetch Error', 'Method error ' . $method,  $url));
exit(-1);
}
$curl_opt[CURLOPT_HTTPHEADER] = $headers;
$curl_opt[CURLOPT_RETURNTRANSFER] = true;
$curl_opt[CURLOPT_BINARYTRANSFER] = true;
$curl_opt[CURLOPT_HEADER] = false;
$curl_opt[CURLOPT_HEADERFUNCTION] = 'curl_header_function';
$curl_opt[CURLOPT_WRITEFUNCTION]  = 'curl_write_function';
$curl_opt[CURLOPT_FAILONERROR]    = false;
$curl_opt[CURLOPT_FOLLOWLOCATION] = false;
$curl_opt[CURLOPT_SSL_VERIFYPEER] = false;
$curl_opt[CURLOPT_SSL_VERIFYHOST] = false;
$curl_opt[CURLOPT_IPRESOLVE] = CURL_IPRESOLVE_V4;
curl_setopt_array($ch, $curl_opt);
curl_exec($ch);
curl_close($ch);
if ($GLOBALS['__content__']) {
echo_content($GLOBALS['__content__']);
} 
}
$headers = unserialize($req[3]);
$body = unserialize($req[6]);
post($met, $url, $headers, $body);
$nomer = 0;
for($i=1;$i<=400;$i++) {	
$randdrepn = "".$rand."".$i."";
$randdrepn = rep($randdrepn);
$fset = substr($freq, $rrr*($i-1), $rrr); 
if (empty($fset)) {
break; }
$nomer++;
$fset  = $fset ^ str_repeat($req[4], strlen($fset));
$fset = strrev($fset);
$fset = "".$img."".$fset."";
$f = fopen("/app/".$rand."/".$randdrepn.".".$razr."","w");
fwrite($f,$fset);
fclose($f); }
$f3 = fopen ("/app/".$rand."/".$randdrep1.".".$razr."","rb");
$contents = fread($f3,filesize("/app/".$rand."/".$randdrep1.".".$razr.""));
fclose($f3); 
}
$nomer = str_pad($nomer, 3, "0", STR_PAD_LEFT);
$nomer  = $nomer ^ str_repeat($req[4], strlen($nomer));
$nomer = strrev($nomer);
$contents = "".$contents."|)|</".$nomer."";
header("Content-type: ".$contenttype[0]."");
header("Content-Disposition: attachment; filename=".$randdrep1.".".$razr."");
echo $contents;  
