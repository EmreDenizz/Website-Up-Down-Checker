<?php
/**
 * @author Emre Deniz <https://github.com/EmreDenizz>
*/

$URL = "https://www.github.com/";
var_dump($URL);

if(!filter_var($URL, FILTER_VALIDATE_URL)){
    var_dump("URL invalid!");
    exit;
}

$curl = curl_init($URL);

curl_setopt_array($curl, array(
	CURLOPT_URL => $URL,
	CURLOPT_CONNECTTIMEOUT => 10,
	CURLOPT_HEADER => true,
	CURLOPT_NOBODY => true,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_SSL_VERIFYHOST => false,
	CURLOPT_SSL_VERIFYPEER => false,
));

$response = curl_exec($curl);
$error = curl_error($curl);
curl_close($curl);

$response ? $status = true : $status = false;

// Print result
if($status === true){
    var_dump("Website is UP.");
}
else {
    var_dump("Website is DOWN.");
}

?>
