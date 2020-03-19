<?php

namespace App\Services;

abstract class Service {

    /**
     * @var string
     */
    private $_message;

    /**
     * @return string
     */
    public function getMessage(): string {
        return $this->_message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void {
        $this->_message = $message;
    }

}
