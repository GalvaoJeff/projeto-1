<?php

abstract class Character {
    protected string $name = "";
    protected int $hp = 100;
    protected int $attackPower = 10;
    protected int $defensePower = 5;
    protected int $stamina;
    protected int $poisonedTurns = 0;
    protected int $poisonDamage = 0;
    protected int $bloodlustTurns = 0;
    protected int $bloodlustDamage = 0;

    public function __construct(string $name, int $hp, 
    int $attackPower, int $defensePower, int $stamina) {
        $this->name = $name;
        $this->hp = $hp;
        $this->attackPower = $attackPower;
        $this->defensePower = $defensePower;
        $this->stamina = $stamina;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getHP(): int {
        return $this->hp;
    }

    public function getAttackPower(): int {
        return $this->attackPower;
    }

    public function getDefensePower(): int {
        return $this->defensePower;
    }

    public function getStamina(): int {
        return $this->stamina;
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

   // Aplica o veneno no personagem (chamado pelo Archer)
    public function applyPoison(int $damage, int $turns): void {
        $this->poisonDamage  = $damage;
        $this->poisonedTurns = $turns;
        echo "{$this->name} foi envenenado! Perderá {$damage} HP por {$turns} turnos!\n";
    }

    // Processa o dano do veneno a cada turno (chamado no loop do jogo)
    public function processPoison(): void {
        if ($this->poisonedTurns <= 0) return;

        $this->hp -= $this->poisonDamage;
        $this->poisonedTurns--;

        echo "{$this->name} sofreu {$this->poisonDamage} de dano por veneno. ";
        echo "HP restante: {$this->hp}. ";
        echo "Turnos restantes: {$this->poisonedTurns}.\n";
    }

    public function isPoisoned(): bool {
        return $this->poisonedTurns > 0;
    }

    public function applyBloodlust(int $damage, int $turns): void {
        $this->bloodlustDamage = $damage;
        $this->bloodlustTurns = $turns;
        echo "{$this->name} entrou em fúria sanguinária! Sofrerá {$damage} de dano por {$turns} turnos!\n";
    }

    public function processBloodlust(): void {
        if ($this->bloodlustTurns <= 0) return;

        $this->hp -= $this->bloodlustDamage;
        $this->bloodlustTurns--;

        echo "{$this->name} sofreu {$this->bloodlustDamage} de dano por fúria sanguinária. ";
        echo "HP restante: {$this->hp}. ";
        echo "Turnos restantes: {$this->bloodlustTurns}.\n";
    }

    public function isBloodlusted(): bool {
        return $this->bloodlustTurns > 0;
    }

    abstract public function special(?Character $target = null): int;
    abstract public function powerStrike(Character $target);
}


