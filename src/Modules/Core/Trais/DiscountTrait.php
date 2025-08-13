<?php
namespace MiniStore\Modules\Core;

trait DiscountTrait {
    public function applyDiscount($amount) {
        return $amount - ($amount * DISCOUNT_PERCENT);
    }
}
