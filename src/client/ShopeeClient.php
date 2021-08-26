<?php

/**
 * @see https://open.shopee.com/documents?module=87&type=2&id=58&version=2
 * Shopee Client Constructor
 * @author Ravi Mukti
 * @since 26-08-2021
 */

namespace Haistar\ShopeePhpSdk\client;


class ShopeeClient
{
    private $partnerId;
    private $accessToken;
    private $shopId;

    /**
     * ShopeeClient constructor.
     * @param $partnerId
     * @param $accessToken
     * @param $shopId
     */
    public function __construct($partnerId = "", $accessToken = "", $shopId = "")
    {
        $this->partnerId = $partnerId;
        $this->accessToken = $accessToken;
        $this->shopId = $shopId;
    }

    /**
     * @return mixed
     */
    public function getPartnerId()
    {
        return $this->partnerId;
    }

    /**
     * @param mixed $partnerId
     */
    public function setPartnerId($partnerId)
    {
        $this->partnerId = $partnerId;
    }

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param mixed $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return mixed
     */
    public function getShopId()
    {
        return $this->shopId;
    }

    /**
     * @param mixed $shopId
     */
    public function setShopId($shopId)
    {
        $this->shopId = $shopId;
    }

}