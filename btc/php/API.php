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
?>


<!-- Use these commands to get price -->
<!-- <?php
      require_once('API.php');
      echo "1 Bitcoin = " . BTCtoINR(1) . " INR";
      // or
      require_once('API.php');
      $amount = INRtoBTC($amount);
      $amount = BTCtoINR($amount); ?> -->