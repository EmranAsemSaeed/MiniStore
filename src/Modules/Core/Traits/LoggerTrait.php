<?php
namespace MiniStore\Modules\Core\Traits;

trait LoggerTrait {
    public function log(string $message): void {
        echo "[LOG] " . $message . PHP_EOL;
    }
}
