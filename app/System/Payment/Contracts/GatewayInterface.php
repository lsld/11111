<?php

namespace System\Payment\Contracts;

interface GatewayInterface
{
    public function initiate($config);

    public function subscriptionButton($params, $title = null);

    public function confirmPayment($data);

}