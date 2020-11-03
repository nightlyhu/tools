<?php

namespace App\Services;

abstract class Service {

    private string $message;

    public function getMessage(): string {
        return $this->message;
    }

    public function setMessage(string $message): void {
        $this->message = $message;
    }

}
