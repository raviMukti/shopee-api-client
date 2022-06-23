<?php

namespace Test\node\general;

use Dotenv\Dotenv;
use Haistar\ShopeePhpSdk\client\ShopeeApiConfig;
use Haistar\ShopeePhpSdk\request\general\GeneralApiClient;
use PHPUnit\Framework\TestCase;

$dotenv = Dotenv::createImmutable(__DIR__.'/../../../');
$dotenv->safeLoad();

class GeneralWithBodyRequestTest extends TestCase
{

    public function testGetAccessTokenAndReturnSuccess(){
        $shopeeClient = new GeneralApiClient();
        $apiConfig = new ShopeeApiConfig();
        $apiConfig->setPartnerId($_ENV["SHOPEE_PARTNER_ID"]);
        $apiConfig->setSecretKey($_ENV["SHOPEE_SECRET_KEY"]);

        $baseUrl = "https://partner.test-stable.shopeemobile.com";
        $apiPath = "/api/v2/auth/token/get";

        $params = array();

        $body = array(
            "partner_id" => (int) $_ENV["SHOPEE_PARTNER_ID"],
            "code" => $_ENV["SHOPEE_CODE"],
            "shop_id" => (int) $_ENV["SHOPEE_SHOP_ID"]
        );

        $accessToken = $shopeeClient->httpCallPost($baseUrl, $apiPath, $params, $body, $apiConfig);

        $this->assertIsString($accessToken->access_token, "CREATE ACCESS TOKEN");
    }


    public function testRefreshTokenAndReturnSuccess(){
        $shopeeClient = new GeneralApiClient();
        $apiConfig = new ShopeeApiConfig();
        $apiConfig->setPartnerId($_ENV["SHOPEE_PARTNER_ID"]);
        $apiConfig->setSecretKey($_ENV["SHOPEE_SECRET_KEY"]);

        $baseUrl = "https://partner.test-stable.shopeemobile.com";
        $apiPath = "/api/v2/auth/access_token/get";

        $params = array();

        $body = array(
            "refresh_token" => $_ENV["SHOPEE_REFRESH_TOKEN"],
            "partner_id" => (int) $_ENV["SHOPEE_PARTNER_ID"],
            "shop_id" => (int) $_ENV["SHOPEE_SHOP_ID"]
        );

        $refreshToken = $shopeeClient->httpCallPost($baseUrl, $apiPath, $params, $body, $apiConfig);

        $this->assertIsString($refreshToken->access_token, "NEW REFRESH TOKEN");
    }

    public function testRefreshTokenAndReturnTimeout(){
        $shopeeClient = new GeneralApiClient();
        $apiConfig = new ShopeeApiConfig();
        $apiConfig->setPartnerId($_ENV["SHOPEE_PARTNER_ID"]);
        $apiConfig->setSecretKey($_ENV["SHOPEE_SECRET_KEY"]);

        $baseUrl = "https://partner.test-stable.shopeemobile.com";
        $apiPath = "/api/v2/auth/access_token/get";

        $params = array();

        $body = array(
            "refresh_token" => $_ENV["SHOPEE_REFRESH_TOKEN"],
            "partner_id" => (int) $_ENV["SHOPEE_PARTNER_ID"],
            "shop_id" => (int) $_ENV["SHOPEE_SHOP_ID"]
        );

        $refreshToken = $shopeeClient->httpCallPost($baseUrl, $apiPath, $params, $body, $apiConfig);

        $this->assertIsString($refreshToken->error, "GUZZLE_ERROR");
    }
}
