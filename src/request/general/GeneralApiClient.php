<?php


namespace Haistar\ShopeePhpSdk\request\general;


use Haistar\ShopeePhpSdk\client\ShopeeApiConfig;
use Haistar\ShopeePhpSdk\node\general\GeneralWithBodyRequest;
use Haistar\ShopeePhpSdk\node\general\GeneralWithoutBodyRequest;

class GeneralApiClient
{
    // GET Request
    public function httpCallGet($baseUrl, $apiPath, $params, ShopeeApiConfig $apiConfig)
    {
        $httpMethod = "GET";
        return GeneralWithoutBodyRequest::makeGetMethod($httpMethod, $baseUrl, $apiPath, $params, $apiConfig);
    }

    // POST Request
    public function httpCallPost($baseUrl, $apiPath, $params, $body, ShopeeApiConfig $apiConfig)
    {
        $httpMethod = "POST";
        return GeneralWithBodyRequest::makeMethod($httpMethod, $baseUrl, $apiPath, $params, $body, $apiConfig);
    }

    // PUT Request
    public function httpCallPut($baseUrl, $apiPath, $params, $body, ShopeeApiConfig $apiConfig)
    {
        $httpMethod = "PUT";
        return GeneralWithBodyRequest::makeMethod($httpMethod, $baseUrl, $apiPath, $params, $body, $apiConfig);
    }


    // PATCH Request
    public function httpCallPatch($baseUrl, $apiPath, $params, $body, ShopeeApiConfig $apiConfig)
    {
        $httpMethod = "PATCH";
        return GeneralWithBodyRequest::makeMethod($httpMethod, $baseUrl, $apiPath, $params, $body, $apiConfig);
    }


    // DELETE Request
    public function httpCallDelete($baseUrl, $apiPath, $params, $body, ShopeeApiConfig $apiConfig)
    {
        $httpMethod = "DELETE";
        return GeneralWithBodyRequest::makeMethod($httpMethod, $baseUrl, $apiPath, $params, $body, $apiConfig);
    }
}