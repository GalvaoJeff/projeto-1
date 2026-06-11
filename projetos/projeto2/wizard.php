<?php

class Wizard extends Character {
    public function __construct(string $name) {
        parent::__construct($name, 80, 20, 5, 100);
    }

    public function strikePower(): int {
        return $this->attackPower;
    }
}
