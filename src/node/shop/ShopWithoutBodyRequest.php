<?php


namespace Haistar\ShopeePhpSdk\node\shop;


use Haistar\ShopeePhpSdk\client\ShopeeApiConfig;
use Haistar\ShopeePhpSdk\client\SignGenerator;
use Exception;
use GuzzleHttp\Client;

class ShopWithoutBodyRequest
{
    /**
     * @param $httpMethod
     * @param $baseUrl
     * @param $apiPath
     * @param $params
     * @param ShopeeApiConfig $apiConfig
     * @return mixed|string
     * @throws Exception
     */
    public static function makeGetMethod($httpMethod, $baseUrl, $apiPath, $params, ShopeeApiConfig $apiConfig){
        // Validate Input
        if ($apiConfig->getPartnerId() == "") throw new Exception("Input of [partner_id] is empty");
        if ($apiConfig->getAccessToken() == "") throw new Exception("Input of [access_token] is empty");
        if ($apiConfig->getShopId() == "") throw new Exception("Input of [shop_id] is empty");
        if ($apiConfig->getSecretKey() == "") throw new Exception("Input of [secret_key] is empty");

        //Timestamp
        $timeStamp = time();
        // Concatenate Base String
        $baseString = $apiConfig->getPartnerId()."".$apiPath."".$timeStamp."".$apiConfig->getAccessToken()."".$apiConfig->getShopId();
        $signedKey = SignGenerator::generateSign($baseString, $apiConfig->getSecretKey());

        $apiPath .= "?";

        if ($params != null){
            foreach ($params as $key => $value){
                $apiPath .= "&". $key . "=" . urlencode($value);
            }
        }

        $requestUrl = $baseUrl.$apiPath."&"."partner_id=".urlencode($apiConfig->getPartnerId())."&"."shop_id=".urlencode($apiConfig->getShopId())."&"."access_token=".urlencode($apiConfig->getAccessToken())."&"."timestamp=".urlencode($timeStamp)."&"."sign=".urlencode($signedKey);

        $guzzleClient = new Client([
            'base_uri' => $baseUrl,
            'timeout' => 3.0
        ]);

        return json_decode($guzzleClient->request($httpMethod, $requestUrl)->getBody()->getContents());
    }

} // End Of Class