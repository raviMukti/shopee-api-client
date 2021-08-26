<?php

namespace Test\node\shop;

use Haistar\ShopeePhpSdk\client\ShopeeApiConfig;
use Haistar\ShopeePhpSdk\request\shop\ShopApiClient;
use PHPUnit\Framework\TestCase;

class ShopWithoutBodyRequestTest extends TestCase
{
    public function testGetCategoryAndReturnSuccess(){

        $shopeeClient = new ShopApiClient();
        $apiConfig = new ShopeeApiConfig();
        $apiConfig->setPartnerId(1002843);
        $apiConfig->setAccessToken("821f6ed2a4f769e99e677f491e1aa759");
        $apiConfig->setShopId(21397);
        $apiConfig->setSecretKey("93911bb49889c06791f8056c3d35136d57ab7244ddaffb865393c232e76c9738");

        $baseUrl = "https://partner.test-stable.shopeemobile.com";
        $apiPath = "/api/v2/product/get_category";
        $params = array(
            "partner_id" => $apiConfig->getPartnerId(),
            "access_token" => $apiConfig->getAccessToken(),
            "shop_id" => $apiConfig->getShopId()
        );

        $categoryList = $shopeeClient->httpCallGet($baseUrl, $apiPath, $params, $apiConfig);

        $this->assertEquals($categoryList->response->category_list[0]->category_id, 100001);
    }
}
