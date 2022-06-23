<?php


namespace Haistar\ShopeePhpSdk\node\general;


use Haistar\ShopeePhpSdk\client\ShopeeApiConfig;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Haistar\ShopeePhpSdk\client\SignGenerator;

class GeneralWithBodyRequest
{
    /**
     * @param $httpMethod
     * @param $apiPath
     * @param $params
     * @param $body
     * @param ShopeeApiConfig $apiConfig
     */
    public static function makeMethod($httpMethod, $baseUrl, $apiPath, $params, $body, ShopeeApiConfig $apiConfig){
        // Validate Input
        /** @var ShopeeApiConfig $apiConfig */
        if ($apiConfig->getPartnerId() == "") throw new Exception("Input of [partner_id] is empty");
        if ($apiConfig->getSecretKey() == "") throw new Exception("Input of [secret_key] is empty");

        //Timestamp
        $timeStamp = time();
        // Concatenate Base String
        $baseString = $apiConfig->getPartnerId()."".$apiPath."".$timeStamp;
        $signedKey = SignGenerator::generateSign($baseString, $apiConfig->getSecretKey());

        $apiPath .= "?";

        if ($params != null){
            foreach ($params as $key => $value){
                $apiPath .= "&". $key . "=" . urlencode($value);
            }
        }

        $requestUrl = $baseUrl.$apiPath."&"."partner_id=".urlencode($apiConfig->getPartnerId())."&"."timestamp=".urlencode($timeStamp)."&"."sign=".urlencode($signedKey);

        $guzzleClient = new Client([
            'base_uri' => $baseUrl,
            'timeout' => 30.0
        ]);

        $response = null;

        try 
        {
            $response = json_decode($guzzleClient->request($httpMethod, $requestUrl, ['json' => $body])->getBody()->getContents());
        } catch (ClientException $e)
        {
            $response = json_decode($e->getResponse()->getBody()->getContents());
        } catch(Exception $e)
        {
            $response = (object) array("error" => "GUZZLE_ERROR", "message" => $e->getMessage());
        }

        return $response;
    }
}