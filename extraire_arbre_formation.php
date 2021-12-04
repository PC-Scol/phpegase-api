<?php
require_once(__DIR__ .'/generated/mof/vendor/autoload.php');
require_once(__DIR__.'/authenticate.php');

// Configure Bearer (JWT) authorization: idTokenAuth
$configMof = OpenAPI\Client\Configuration::getDefaultConfiguration()
    ->setAccessToken(getToken())
    ->setHost("https://mof.$env.pc-scol.fr/api/v1/mof");


$mofExtractionClient = new OpenAPI\Client\Api\ExtractionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $configMof
);



try {
    $result = $mofExtractionClient->extraireArbresPourUnePeriode("ETAB00", "PER-2021");
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NomenclatureApi->lireListeNomenclatures: ', $e->getMessage(), PHP_EOL;
}


?>


