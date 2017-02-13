<?php

namespace System\Payment;

use System\Payment\Constants\IPGS;
use System\Payment\Contracts\GatewayInterface;
use System\Payment\Contracts\PaymentInterface;
use System\Payment\IPG\CommonWeb\CommonWeb;
use System\Payment\IPG\Stripe\Stripe;

class Payment implements PaymentInterface
{
    private static $ipg = null;
    private $config = [];
    private $ipgs = [];

    public function __construct()
    {
        $this->config = config('payment');
        $this->ipgs();
    }

    private function ipgs()
    {
        $this->ipgs = constants(IPGS::class, true);
    }

    private function setStripe()
    {
        $config = $this->config['drivers']['stripe'];
        return new Stripe($config);
    }

    private function setCommonWeb($returnUrl = null)
    {
        $config = $this->config['drivers']['common_web'];
        return new CommonWeb($config, $returnUrl);
    }

    private function defaultIPG($returnUrl)
    {
        $defaultIpg = $this->config['ipg'];
        if (isset($this->ipgs[$defaultIpg])) {
            return $this->getIPG($defaultIpg, $returnUrl);
        }
        throw new \Exception('Invalid default payment gateway');
    }

    private function getIPG($ipg, $returnUrl = null)
    {
        $method = 'set' . studly_case($ipg);
        if (method_exists($this, $method)) {
            self::$ipg = $this->{$method}($returnUrl);
        } else {
            self::$ipg = $this->defaultIPG($returnUrl);
        }
        return self::$ipg;
    }

    public function ipg($ipg, $returnUrl = null)
    {
        $this->getIPG($ipg, $returnUrl);
        if (!(self::$ipg instanceof GatewayInterface)) {
            throw new \Exception('Gateway not implemented');
        }
        return self::$ipg;
    }
}