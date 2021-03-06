<?php


namespace Haistar\ShopeePhpSdk\request\shop;


use Haistar\ShopeePhpSdk\client\ShopeeApiConfig;
use Haistar\ShopeePhpSdk\node\shop\ShopWithoutBodyRequest;
use Haistar\ShopeePhpSdk\node\shop\ShopWithBodyRequest;

class ShopApiClient
{
    // GET Request
    public function httpCallGet($baseUrl, $apiPath, $params, ShopeeApiConfig $apiConfig)
    {
        $httpMethod = "GET";
        return ShopWithoutBodyRequest::makeGetMethod($httpMethod, $baseUrl, $apiPath, $params, $apiConfig);
    }

    // POST Request
    public function httpCallPost($baseUrl, $apiPath, $params, $body, ShopeeApiConfig $apiConfig)
    {
        return ShopWithBodyRequest::postMethod($baseUrl, $apiPath, $params, $body, $apiConfig);
    }

    // PUT Request
    public function httpCallPut($baseUrl, $apiPath, $params, $body, ShopeeApiConfig $apiConfig)
    {
        $httpMethod = "PUT";
        return ShopWithBodyRequest::makeMethod($httpMethod, $baseUrl, $apiPath, $params, $body, $apiConfig);
    }


    // PATCH Request
    public function httpCallPatch($baseUrl, $apiPath, $params, $body, ShopeeApiConfig $apiConfig)
    {
        $httpMethod = "PATCH";
        return ShopWithBodyRequest::makeMethod($httpMethod, $baseUrl, $apiPath, $params, $body, $apiConfig);
    }


    // DELETE Request
    public function httpCallDelete($baseUrl, $apiPath, $params, $body, ShopeeApiConfig $apiConfig)
    {
        $httpMethod = "DELETE";
        return ShopWithBodyRequest::makeMethod($httpMethod, $baseUrl, $apiPath, $params, $body, $apiConfig);
    }

}