<?php
function BTCtoINR($BTC)
{
  $url = "https://bitpay.com/api/rates";
  $json = json_decode(file_get_contents($url));
  foreach ($json as $object)
    if ($object->code == 'INR')
      return $BTC * ($object->rate);
}
function INRtoBTC($INR)
{
  $url = "https://bitpay.com/api/rates";
  $json = json_decode(file_get_contents($url));
  foreach ($json as $object)
    if ($object->code == 'INR')
      return $INR / ($object->rate);
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