<?php

namespace System\Payment\IPG\CommonWeb;

use System\Payment\Contracts\GatewayInterface;
use System\Payment\IPG\CommonWeb\VPC\VPCPaymentCodeTranslator;
use System\Payment\IPG\CommonWeb\VPC\VPCPaymentConnection;

class CommonWeb extends VPCPaymentConnection implements GatewayInterface
{
    protected $mode;
    protected $vpcVersion;
    protected $vpcClientUrl;
    protected $merchantId;
    protected $merchantAccessCode;
    protected $secureHash;
    protected $defaultLanguage;
    protected $currency;
    protected $vpcReturnURL;

    const CMD_PAY = 'pay';

    public function __construct($config, $returnUrl = null)
    {
        $this->initiate($config, $returnUrl);

    }

    public function initiate($config, $returnUrl = null)
    {
        $this->mode = $config['mode'];
        $this->vpcVersion = $config['vpc_version'];
        $this->vpcClientUrl = $config['vpc_client_url'];
        $this->merchantId = $config['merchant_id'];
        $this->merchantAccessCode = $config['merchant_access_code'];
        $this->secureHash = $config['secure_hash'];
        $this->defaultLanguage = $config['default_language'];
        $this->currency = $config['currency'];
        /* SSL */
        $this->isSSL = $config['ssl'];
        $this->sslCertificate = $config['ssl_certificate'];
        $this->sslVerifyPeer = $config['ssl_verify_peer'];
        $this->sslVerifyHost = $config['ssl_verify_host'];
        /* End of SSL */
        empty($returnUrl) ? $this->vpcReturnURL = $config['vpc_return_url']
            : $this->vpcReturnURL = $returnUrl;

        $this->setSecureSecret($this->secureHash);
        return $this;
    }

    private function validateKeys($attributes)
    {
        $keys = [
            'vpc_Version',
            'vpc_Merchant',
            'vpc_AccessCode',
            'vpc_Command',
            'vpc_Currency',
            'vpc_Locale',
            'vpc_ReturnURL',
            'vpc_MerchTxnRef',
            'vpc_OrderInfo',
            'vpc_Amount',
        ];

        /**
         * This exception thrown if invalid keys formed
         */
        if (!empty(array_diff($keys, array_keys($attributes)))) {
            throw new \Exception('Malformed keys');
        }

        /**
         * This exception thrown if keys contain empty values
         */
        if (in_array(["", null], $attributes)) {
            throw new \Exception('Empty values found');
        }

    }

    private function getVPCAttributes()
    {
        return [
            'vpc_Version' => $this->vpcVersion,
            'vpc_Merchant' => $this->merchantId,
            'vpc_AccessCode' => $this->merchantAccessCode,
            'vpc_Command' => self::CMD_PAY,
            'vpc_Currency' => $this->currency,
            'vpc_Locale' => $this->defaultLanguage,
            'vpc_ReturnURL' => $this->vpcReturnURL
        ];
    }

    private function mapPaymentAttributes($attributes)
    {
        $vpcParams = $this->getVPCAttributes();
        $params = [
            'vpc_MerchTxnRef' => $attributes['ref_id'],
            'vpc_OrderInfo' => $attributes['description'],
            'vpc_Amount' => $this->value_cleanse($attributes['amount']),
        ];

        $params = array_merge($vpcParams, $params);
        $this->validateKeys($params);
        ksort($params);
        return $params;
    }

    private function orderKeys($attributes)
    {
        foreach ($attributes as $key => $value) {
            if (!empty($value)) {
                $this->addDigitalOrderField($key, $value);
            }
        }
    }

    private function getLink($title = null)
    {
        // Add original order HTML so that another transaction can be attempted.
        $this->addDigitalOrderField("AgainLink", null);
        $secureHash = $this->hashAllFields();
        $this->addDigitalOrderField("Title", $title);
        $this->addDigitalOrderField("vpc_SecureHash", $secureHash);
        $this->addDigitalOrderField("vpc_SecureHashType", "SHA256");
        // Obtain the redirection URL and redirect the web browser
        return $this->getDigitalOrder($this->vpcClientUrl);
    }

    public function subscriptionButton($params, $title = null)
    {
        if (empty($params)) {
            throw new \Exception('Common Web empty params');
        }

        $params = $this->mapPaymentAttributes($params);
        $this->orderKeys($params);
        return $this->getLink($title);
    }

    public function confirmPayment($data)
    {
        //TODO add the params to payment log table
        $status = false;
        $response = VPCPaymentCodeTranslator::getResultDescription($data['vpc_TxnResponseCode']);
        if ($data['vpc_TxnResponseCode'] == 0) {
            $status = true;
        }
        return ['status' => $status, 'message' => $response];
    }

    /**
     * This method removes seperators and decimal places
     * Which is required by the gateway
     * @param $value
     * @return float
     */
    function value_cleanse($value)
    {
        return (str_replace([',', '.'], '', value_format(round(value_cleanse($value)))));
    }
}