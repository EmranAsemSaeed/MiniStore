<?php
namespace MiniStore\Modules\Payments;

use MiniStore\Modules\Core\Traits\LoggerTrait;

class StripePayment implements PaymentGateway {
    use LoggerTrait;

    public function pay(float $amount): bool {
        $this->log("Paid $amount via Stripe.");
        return true;
    }
}
