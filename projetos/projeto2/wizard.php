<?php

class Wizard extends Character {
    public function __construct(string $name) {
        parent::__construct($name, 100, 20, 5, 100);
    }

    public function strikePower(): int {
        return $this->attackPower;
    }

    public function powerStrike(Character $target) {
        if ($this->stamina < 30) {
            echo "{$this->name} pouca stamina para realizar o ataque poderoso!\n";
            return;
        }

        $damage = max(0, ($this->attackPower * 3) - $target->defensePower);
        $target->hp -= $damage;
        $this->stamina -= 30;

        echo "{$this->name} lançou um feitiço poderoso em {$target->name} causando {$damage} de dano. ";
        echo "{$target->name} tem {$target->hp} HP restantes.\n";
    }

    #[Override]
    public function attack(Character $target) {
        return parent::attack($target);
    }

    #[Override]
    public function defense() {        
        return parent::defense();
    }

    #[Override]    
    public function rest() {
        return parent::rest();
    }
}
