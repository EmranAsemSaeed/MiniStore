<?php
namespace MiniStore\Modules\Core\Traits;

trait DiscountTrait {
    public function applyDiscount(float $price): float {
        return $price * (1 - \MiniStore\Modules\Core\Config::DISCOUNT_RATE);
    }
}
