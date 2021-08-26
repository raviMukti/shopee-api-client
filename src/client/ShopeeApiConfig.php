<?php

/**
 * @see https://open.shopee.com/documents?module=87&type=2&id=58&version=2
 * Shopee Client Constructor
 * @author Ravi Mukti
 * @since 26-08-2021
 */

namespace Haistar\ShopeePhpSdk\client;


class ShopeeApiConfig
{
    private $partnerId;
    private $accessToken;
    private $refreshToken;
    private $shopId;
    private $secretKey;

    /**
     * ShopeeApiConfig constructor.
     * @param string $partnerId
     * @param string $accessToken
     * @param string $shopId
     * @param string $secretKey
     */
    public function __construct($partnerId = "", $accessToken = "", $refreshToken = "", $shopId = "", $secretKey = "")
    {
        $this->partnerId = $partnerId;
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
        $this->shopId = $shopId;
        $this->secretKey = $secretKey;
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
     * @return mixed|string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @param mixed|string $refreshToken
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
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

    /**
     * @return string
     */
    public function getSecretKey()
    {
        return $this->secretKey;
    }

    /**
     * @param string $secretKey
     */
    public function setSecretKey($secretKey)
    {
        $this->secretKey = $secretKey;
    }

}