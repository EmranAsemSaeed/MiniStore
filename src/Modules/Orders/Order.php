<?php
namespace MiniStore\Modules\Orders;

use MiniStore\Modules\Products\Product;
use MiniStore\Modules\Users\Customer;
use MiniStore\Modules\Core\Traits\LoggerTrait;
use MiniStore\Modules\Core\Traits\DiscountTrait;
use MiniStore\Modules\Core\Traits\StatusTrait;
use MiniStore\Modules\Core\Config;

class Order {
    use LoggerTrait, DiscountTrait, StatusTrait;

    private Customer $customer;
    private array $products = [];

    public function __construct(Customer $customer) {
        $this->customer = $customer;
        $this->log("Order created for {$customer->getName()}");
    }

    public function addProduct(Product $product, int $quantity) {
        $product->reduceStock($quantity);
        $this->products[] = ['product' => $product, 'quantity' => $quantity];
        $this->log("Addeظd {$quantity} x {$product->getName()} to order");
    }

    public function getTotal(): float {
        $total = 0;
        foreach ($this->products as $item) {
            $total += $item['product']->getPrice() * $item['quantity'];
        }
        $total = $total * (1 + Config::TAX_RATE);
        $total = $this->applyDiscount($total);
        return $total;
    }
}
