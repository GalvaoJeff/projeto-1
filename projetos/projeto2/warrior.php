<?php

class Warrior extends Character {   
    public function __construct(string $name) {
        parent::__construct($name, 120, 15, 10, 120);
    }

    public function strikePower(): int {
        return $this->attackPower;
    }

    public function powerStrike(Character $target) {
        if ($this->stamina < 20) {
            echo "{$this->name} pouca stamina para realizar o ataque poderoso!\n";
            return;
        }

        $damage = max(0, ($this->attackPower * 2) - $target->defensePower);
        $target->hp -= $damage;
        $this->stamina -= 20;

        echo "{$this->name} realizou um ataque poderoso em {$target->name} causando {$damage} de dano. ";
        echo "{$target->name} tem {$target->hp} HP restantes.\n";
    }
}