<?php
namespace MiniStore\Modules\Core;

trait TaxTrait {
    public function applyTax($amount) {
        return $amount + ($amount * TAX_RATE);
    }
}
