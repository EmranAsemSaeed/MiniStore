<?php
namespace MiniStore\Modules\Core;

trait LoggerTrait {
    public function log($message) {
        echo "[LOG] " . date("Y-m-d H:i:s") . " - $message<br>";
    }
}
