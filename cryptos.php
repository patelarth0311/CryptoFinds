
<?php   include_once 'header.php'?>

<div id = "container" >

<div id="search" >

<input type = "text" placeholder = "Search" ></input>

</div>
<?php
$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
$parameters = [
  'limit' => "50"
];

$headers = [
  'Accepts: application/json',
  'X-CMC_PRO_API_KEY: 0a6c72f1-d71b-4932-81d8-1b865951aac7'
];
$qs = http_build_query($parameters); // query string encode the parameters
$request = "{$url}?{$qs}"; // create the request URL


$curl = curl_init(); // Get cURL resource
// Set cURL options
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt_array($curl, array(
  CURLOPT_URL => $request,            // set the request URL
  CURLOPT_HTTPHEADER => $headers,     // set the headers 
  CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));

$response = curl_exec($curl); // Send the request, save the response
 // print json decoded response

  
$decoded_json = json_decode($response, true); 
$name = $decoded_json["data"];

// price 24h 7d market cap volume supply 

for ($i = 0; $i < count($name); $i++) {
$toLower = strtolower($name[$i]['name']);
$toLower2 = strtolower($name[$i]['symbol']);
$toLower  = str_replace(' ', '-', $toLower);
$symbol = $name[$i]['symbol'];
$price = number_format($name[$i]['quote']['USD']['price'], 2, '.', '');
$volume24 = $name[$i]['quote']['USD']['volume_change_24h'];
$volume7day = $name[$i]['quote']['USD']['percent_change_7d'];
$marketcap = $name[$i]['quote']['USD']['market_cap'];
$volume = $name[$i]['quote']['USD']['volume_24h'];
$supply = $name[$i]['circulating_supply'];


     echo  "<div class = 'row'>
     <img class = 'cryptopics' src = 'https://cryptologos.cc/logos/{$toLower}-{$toLower2}-logo.svg?v=022' ></img>
     <p>{$name[$i]['name']}</p>
     <p>{$symbol}</p>
     <p>{$price }</p>
     <p>{$volume24}</p>
     <p>{$volume7day}</p>
     <p>{$marketcap}</p>
     <p>{$volume}</p>
     <p>{$supply}</p>
     </div> ";
     
}

curl_close($curl); // Close request

?>
</div>