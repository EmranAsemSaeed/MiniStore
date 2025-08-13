<?php
namespace MiniStore\Modules\Products;

use MiniStore\Modules\Core\Traits\LoggerTrait;

final class Product {
    use LoggerTrait;

    private string $name;
    private float $price;
    private int $stock;

    public function __construct(string $name, float $price, int $stock) {
        $this->name = $name;
        $this->setPrice($price);
        $this->setStock($stock);
        $this->log("Product created: {$name}");
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getStock(): int {
        return $this->stock;
    }

    public function setPrice(float $price) {
        if ($price <= 0) throw new \Exception("Price must be positive");
        $this->price = $price;
    }

    public function setStock(int $stock) {
        if ($stock < 0) throw new \Exception("Stock cannot be negative");
        $this->stock = $stock;
    }

    public function reduceStock(int $quantity) {
        if ($quantity > $this->stock) throw new \Exception("Insufficient stock");
        $this->stock -= $quantity;
        $this->log("Stock reduced by $quantity for {$this->name}");
    }
}
