<?php

/**
 * Open API Request for POST/PUT/DELETE/PATCH
 * @author Ravi Mukti
 * @since 26-08-2021
 */

namespace Haistar\ShopeePhpSdk\node\shop;


use Haistar\ShopeePhpSdk\client\ShopeeApiConfig;
use Exception;
use Haistar\ShopeePhpSdk\client\SignGenerator;

class ShopWithBodyRequest
{
    /**
     * Static Function For POST/PUT/DELETE/PATCH request
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
        if ($apiConfig->getAccessToken() == "") throw new Exception("Input of [access_token] is empty");
        if ($apiConfig->getShopId() == "") throw new Exception("Input of [shop_id] is empty");
        if ($apiConfig->getSecretKey() == "") throw new Exception("Input of [secret_key] is empty");

        //Timestamp
        $timeStamp = time();
        // Concatenate Base String
        $baseString = $apiConfig->getPartnerId()."".$apiPath."".$timeStamp."".$apiConfig->getAccessToken()."".$apiConfig->getShopId();
        $signedKey = SignGenerator::generateSign($baseString, $apiConfig->getSecretKey());

        // Set Header
        $header = array(
            "Content-type : application/json"
        );

        $apiPath .= "?";

        if ($params != null){
            foreach ($params as $key => $value){
                $apiPath .= "&". $key . "=" . urlencode($value);
            }
        }

        $requestUrl = $baseUrl.$apiPath."&"."timestamp=".urlencode($timeStamp)."&"."sign=".urlencode($signedKey);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $requestUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $httpMethod,
            CURLOPT_HTTPHEADER => $header
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            return $response;
        }
    }

} // End of Class