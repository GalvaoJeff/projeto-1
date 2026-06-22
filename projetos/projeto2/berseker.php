<?php

class Berseker extends Character {
    const SPECIAL_DAMAGE = 20;
    const STAMINA_COST = 30;
    const BLOODLUST_DAMAGE = 5;
    const BLOODLUST_TURNS = 3;

    public function __construct(string $name) {
        parent::__construct($name, 100, 25, 5, 80);
    }

    public function special(?Character $target = null): int {
        if ($this->stamina < self::STAMINA_COST) {
            echo "{$this->name} pouca stamina para realizar o ataque especial!\n";
            return 0;
        }

        $damage = max(0, ($this->attackPower + self::SPECIAL_DAMAGE) - $target->defensePower);
        $target->hp -= $damage;
        $this->stamina -= self::STAMINA_COST;

        echo "{$this->name} realizou um ataque especial em {$target->name} causando {$damage} de dano. ";
        echo "{$target->name} tem {$target->hp} HP restantes.\n";

        $target->applyBloodlust(self::BLOODLUST_DAMAGE, self::BLOODLUST_TURNS);

        return $damage;
    }

    public function powerStrike(Character $target) {
        if ($this->stamina < 35) {
            echo "{$this->name} pouca stamina para realizar o ataque poderoso!\n";
            return 0;
        }

        $damage = max(0, ($this->attackPower * 2) - $target->defensePower);
        $target->hp -= $damage;
        $this->stamina -= 35;

        echo "{$this->name} realizou um ataque poderoso em {$target->name} causando {$damage} de dano. ";
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