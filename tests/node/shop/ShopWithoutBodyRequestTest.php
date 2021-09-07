<?php

namespace Test\node\shop;

use Dotenv\Dotenv;
use Haistar\ShopeePhpSdk\client\ShopeeApiConfig;
use Haistar\ShopeePhpSdk\request\shop\ShopApiClient;
use PHPUnit\Framework\TestCase;

$dotenv = Dotenv::createImmutable(__DIR__.'/../../../');
$dotenv->safeLoad();

class ShopWithoutBodyRequestTest extends TestCase
{
    public function testGetCategoryAndReturnSuccess(){

        $shopeeClient = new ShopApiClient();
        $apiConfig = new ShopeeApiConfig();
        $apiConfig->setPartnerId((int) $_ENV["SHOPEE_PARTNER_ID"]);
        $apiConfig->setAccessToken($_ENV["SHOPEE_ACCESS_TOKEN"]);
        $apiConfig->setShopId((int) $_ENV["SHOPEE_SHOP_ID"]);
        $apiConfig->setSecretKey($_ENV["SHOPEE_SECRET_KEY"]);

        $baseUrl = "https://partner.test-stable.shopeemobile.com";
        $apiPath = "/api/v2/product/get_category";

        $params = array(); // Even it is no param, still must be created with null array value

        $categoryList = $shopeeClient->httpCallGet($baseUrl, $apiPath, $params, $apiConfig);

        $this->assertEquals($categoryList->response->category_list[0]->category_id, 100001);
    }

    public function testGetItemListWithOnceCommonParameter(){
        $shopeeClient = new ShopApiClient();
        $apiConfig = new ShopeeApiConfig();
        $apiConfig->setPartnerId((int) $_ENV["SHOPEE_PARTNER_ID"]);
        $apiConfig->setShopId((int) $_ENV["SHOPEE_SHOP_ID"]);
        $apiConfig->setAccessToken($_ENV["SHOPEE_ACCESS_TOKEN"]);
        $apiConfig->setSecretKey($_ENV["SHOPEE_SECRET_KEY"]);

        $baseUrl = "https://partner.test-stable.shopeemobile.com";
        $apiPath = "/api/v2/product/get_item_list";

        $params = array(
            'offset' => 0,
            'page_size' => 100,
            'item_status' => 'NORMAL'
        );

        $productList = $shopeeClient->httpCallGet($baseUrl, $apiPath, $params, $apiConfig);

        $this->assertEquals($productList->response->item[0]->item_id, 268800);
    }

    public function testGetListItemWithoutParameterAndReturnFalse(){
        $shopeeClient = new ShopApiClient();
        $apiConfig = new ShopeeApiConfig();
        $apiConfig->setPartnerId((int) $_ENV["SHOPEE_PARTNER_ID"]);
        $apiConfig->setShopId((int) $_ENV["SHOPEE_SHOP_ID"]);
        $apiConfig->setAccessToken($_ENV["SHOPEE_ACCESS_TOKEN"]);
        $apiConfig->setSecretKey($_ENV["SHOPEE_SECRET_KEY"]);

        $baseUrl = "https://partner.test-stable.shopeemobile.com";
        $apiPath = "/api/v2/product/get_item_list";

        $params = array();

        $productList = $shopeeClient->httpCallGet($baseUrl, $apiPath, $params, $apiConfig);

        $this->assertEquals($productList->message, 'invalid field Offset: value must  Not Null');
    }
}
