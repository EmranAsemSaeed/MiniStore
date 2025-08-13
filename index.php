<?php
require_once __DIR__ . '/src/Modules/Products/Product.php';
require_once __DIR__ . '/src/Modules/Users/User.php';
require_once __DIR__ . '/src/Modules/Users/Customer.php';
require_once __DIR__ . '/src/Modules/Orders/Order.php';
require_once __DIR__ . '/src/Modules/Payments/PaymentGateway.php';
require_once __DIR__ . '/src/Modules/Payments/PayPalPayment.php';
require_once __DIR__ . '/src/Modules/Core/Config.php';

use MiniStore\Modules\Products\Product;
use MiniStore\Modules\Users\Customer;
use MiniStore\Modules\Orders\Order;
use MiniStore\Modules\Payments\PayPalPayment;

// Create products
$p1 = new Product("Laptop", 1000, 5);
$p2 = new Product("Mouse", 50, 10);
$p3 = new Product("Keyboard", 80, 7);

// Create customer
$customer = new Customer("Emran", "emran@example.com");

// Create order
$order = new Order($customer);
$order->addProduct($p1, 1);
$order->addProduct($p2, 2);

// Process payment
$payment = new PayPalPayment();
$total = $order->getTotal();
$payment->pay($total);

// Display total
echo "Total amount after tax and discount: $total";
