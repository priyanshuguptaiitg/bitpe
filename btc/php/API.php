<?php
function BTCtoINR($BTC)
{
  $url = "https://bitpay.com/api/rates";
  $json = json_decode(file_get_contents($url));
  foreach ($json as $object)
    if ($object->code == 'INR')
      $r = $object->rate;
  return $r * $BTC;
}
function INRtoBTC($INR)
{
  $url = "https://bitpay.com/api/rates";
  $json = json_decode(file_get_contents($url));
  foreach ($json as $object)
    if ($object->code == 'INR')
      $r = $object->rate;
  return $INR / $r;
}
// Use these commands to get price
// require_once('API.php');
// echo BTCtoINR(2);
// echo INRtoBTC(2000000);