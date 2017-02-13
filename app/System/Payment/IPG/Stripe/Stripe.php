<?php

namespace System\Payment\IPG\Stripe;

use System\Payment\Constants\IPGEnvironment;
use System\Payment\Contracts\GatewayInterface;
use Stripe\Customer;
use Stripe\Plan;
use Stripe\Stripe as BaseStripe;

class Stripe extends BaseStripe implements GatewayInterface
{
    protected $mode = null;
    protected $publicKey = null;
    protected $secretKey = null;
    protected $plan = null;
    protected $customer = null;

    public function __construct($config)
    {
        $this->initiate($config);
        $this->setPlan();
        $this->setCustomer();
    }

    public function initiate($config)
    {
        $this->mode = $config['mode'];
        $this->secretKey = $config['live_secret_key'];
        $this->publicKey = $config['live_public_key'];

        if ($this->mode == IPGEnvironment::TEST) {
            $this->secretKey = $config['test_secret_key'];
            $this->publicKey = $config['test_public_key'];
        }
        self::setApiKey($this->secretKey);
        return $this;
    }

    private function setPlan()
    {
        $this->plan = new Plan;
    }

    private function setCustomer()
    {
        $this->customer = new Customer;
    }

    public function plan()
    {
        return $this->plan;
    }

    public function customer()
    {
        return $this->customer;
    }

    public function subscriptionButton($params, $title = null)
    {
        //TODO implement
    }

    public function confirmPayment($data)
    {
        // TODO: Implement confirmPayment() method.
    }

}