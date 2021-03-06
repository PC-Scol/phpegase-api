<?php
require_once(__DIR__ .'/vendor/autoload.php');
require_once(__DIR__.'/authenticate.php');

// Configure Bearer (JWT) authorization: idTokenAuth
$configRef = Pegase\RefClient\Configuration::getDefaultConfiguration()
    ->setAccessToken(getToken())
    ->setHost("https://ref.$env.pc-scol.fr/api/v1/ref");


$refApiInstance = new Pegase\RefClient\Api\MetaDonneesNomenclatureApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $configRef
);



try {
    $result = $refApiInstance->lireListeNomenclaturesDisponibles();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling NomenclatureApi->lireListeNomenclatures: ', $e->getMessage(), PHP_EOL;
}


?>


