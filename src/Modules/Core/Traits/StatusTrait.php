<?php
namespace MiniStore\Modules\Core\Traits;

trait StatusTrait {
    private string $status = 'pending';

    public function setStatus(string $status) {
        $this->status = $status;
    }

    public function getStatus(): string {
        return $this->status;
    }
}
