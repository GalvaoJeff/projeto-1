<?php

abstract class Character {
    protected string $name = "";
    protected int $hp = 100;
    protected int $attackPower = 10;
    protected int $defensePower = 5;
    protected int $stamina;

    public function __construct(string $name, int $hp, 
    int $attackPower, int $defensePower, int $stamina) {
        $this->name = $name;
        $this->hp = $hp;
        $this->attackPower = $attackPower;
        $this->defensePower = $defensePower;
        $this->stamina = $stamina;
    }

    public function attack(Character $target) {
        if ($this->stamina < 10) {
            echo "{$this->name} pouca stamina para realizar o ataque!\n";
            return;
        }

        $damage = max(0, $this->attackPower - $target->defensePower);
        $target->hp -= $damage;
        $this->stamina -= 10;

        echo "{$this->name} atacou {$target->name} com {$damage} de dano. ";
        echo "{$target->name} tem {$target->hp} HP restantes.\n";
    }

    public function defense() {
        if ($this->stamina < 5) {
            echo "{$this->name} pouca stamina para se defender!\n";
            return;
        }

        $this->defensePower += 5;
        $this->stamina -= 5;

        echo "{$this->name} aumentou sua defesa para {$this->defensePower}.\n";
    }

    public function rest() {
        $this->stamina += 20;
        if ($this->stamina > 100) {
            $this->stamina = 100;
        }

        echo "{$this->name} descansou e recuperou stamina. Stamina atual: {$this->stamina}.\n";
    }

    abstract public function strikePower(): int;
}


