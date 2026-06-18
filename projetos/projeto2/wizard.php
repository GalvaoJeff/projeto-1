<?php

class Wizard extends Character {

    const STAMINA_COST = 15;
    const HEAL_AMOUNT = 15;

    public function __construct(string $name) {
        parent::__construct($name, 100, 20, 5, 100);
    }

    public function special(?Character $target = null): int {
        if ($this->stamina < self::STAMINA_COST) {
            echo "{$this->name} pouca stamina para realizar o efeito especial!\n";
            return 0;
        }
        

        $healAmount = self::HEAL_AMOUNT;
        $this->hp += $healAmount;
        $this->stamina -= self::STAMINA_COST;

        echo "{$this->name} usou o efeito especial e recuperou {$healAmount} HP. ";
        echo "{$this->name} agora tem {$this->hp} HP.\n";

        return $healAmount;
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
