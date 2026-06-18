<?php

class Archer extends Character {
    
    const SPECIAL_DAMAGE = 10;
    const STAMINA_COST = 20;
    const POISON_DAMAGE = 5;
    const POISON_TURNS = 3;

    public function __construct(string $name) {
        parent::__construct($name, 100, 12, 7, 110);
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

        $target->applyPoison(self::POISON_DAMAGE, self::POISON_TURNS);

        return $damage;
    }

    public function powerStrike(Character $target) {
        if ($this->stamina < 25) {
            echo "{$this->name} pouca stamina para realizar o ataque poderoso!\n";
            return;
        }

        $damage = max(0, ($this->attackPower * 2) - $target->defensePower);
        $target->hp -= $damage;
        $this->stamina -= 25;

        echo "{$this->name} lançou uma flecha poderosa em {$target->name} causando {$damage} de dano. ";
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