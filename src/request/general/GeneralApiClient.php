<?php


namespace Haistar\ShopeePhpSdk\request\general;


use Haistar\ShopeePhpSdk\client\ShopeeApiConfig;
use Haistar\ShopeePhpSdk\node\general\GeneralWithBodyRequest;
use Haistar\ShopeePhpSdk\node\general\GeneralWithoutBodyRequest;

class GeneralApiClient
{
    // GET Request
    /**
     * @throws \Exception
     */
    public function httpCallGet($baseUrl, $apiPath, $params, ShopeeApiConfig $apiConfig)
    {
        $httpMethod = "GET";
        return GeneralWithoutBodyRequest::makeGetMethod($httpMethod, $baseUrl, $apiPath, $params, $apiConfig);
    }

    // POST Request
    /**
     * @throws \Exception
     */
    public function httpCallPost($baseUrl, $apiPath, $params, $body, ShopeeApiConfig $apiConfig)
    {
        $httpMethod = "POST";
        return GeneralWithBodyRequest::makeMethod($httpMethod, $baseUrl, $apiPath, $params, $body, $apiConfig);
    }

    // PUT Request
    /**
     * @throws \Exception
     */
    public function httpCallPut($baseUrl, $apiPath, $params, $body, ShopeeApiConfig $apiConfig)
    {
        $httpMethod = "PUT";
        return GeneralWithBodyRequest::makeMethod($httpMethod, $baseUrl, $apiPath, $params, $body, $apiConfig);
    }


    // PATCH Request
    /**
     * @throws \Exception
     */
    public function httpCallPatch($baseUrl, $apiPath, $params, $body, ShopeeApiConfig $apiConfig)
    {
        $httpMethod = "PATCH";
        return GeneralWithBodyRequest::makeMethod($httpMethod, $baseUrl, $apiPath, $params, $body, $apiConfig);
    }


    // DELETE Request
    /**
     * @throws \Exception
     */
    public function httpCallDelete($baseUrl, $apiPath, $params, $body, ShopeeApiConfig $apiConfig)
    {
        $httpMethod = "DELETE";
        return GeneralWithBodyRequest::makeMethod($httpMethod, $baseUrl, $apiPath, $params, $body, $apiConfig);
    }
}