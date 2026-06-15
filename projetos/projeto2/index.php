<?php

echo "Bem-vindo ao jogo de RPG!\n";

require_once 'chars.php';
require_once 'warrior.php';
require_once 'wizard.php';
require_once 'actions.php';

$warrior = new Warrior("Aragorn");
$wizard = new Wizard("Gandalf");

readline("Pressione Enter para iniciar o jogo...");
echo "\n";
echo "Jogador 1: Escolha um personagem para jogar:\n";
echo "1. Guerreiro - " . $warrior->getName() . "\n" . $warrior->getHP() . " HP\n" . 
$warrior->getAttackPower() . " Poder de Ataque\n" . 
$warrior->getDefensePower() . " Poder de Defesa\n" . 
$warrior->getStamina() . " Stamina\n";
echo "2. Mago - " . $wizard->getName() . "\n" . $wizard->getHP() . " HP\n" . 
$wizard->getAttackPower() . " Poder de Ataque\n" . 
$wizard->getDefensePower() . " Poder de Defesa\n" . $wizard->getStamina() . " Stamina\n";
$player1 = readline("Digite o número do personagem: ");

if ($player1 == 1) {
    $player1Character = $warrior;
    echo "Jogador 1 escolheu o Guerreiro! - " . $warrior->getName() . "\n" ;
} else {
    $player1Character = $wizard;
    echo "Jogador 1 escolheu o Mago! - " . $wizard->getName() . "\n";
}
readline("Pressione Enter para continuar...");
system("clear");

echo "Jogador 2: Escolha um personagem para jogar:\n";
echo "1. Guerreiro - " . $warrior->getName() . "\n";
echo "2. Mago - " . $wizard->getName() . "\n";
$player2 = readline("Digite o número do personagem: ");

if ($player2 == 1) {
    $player2Character = $warrior;
    echo "Jogador 2 escolheu o Guerreiro! - " . $warrior->getName() . "\n";
} else {
    $player2Character = $wizard;
    echo "Jogador 2 escolheu o Mago! - " . $wizard->getName() . "\n";
}
readline("Pressione Enter para iniciar a batalha...");
system("clear");

$turn = 1;

while ($player1Character->getHP() > 0 && $player2Character->getHP() > 0) {

    echo "\n=============================\n";
    echo "         TURNO $turn\n";
    echo "=============================\n";
    echo "{$player1Character->getName()} HP: {$player1Character->getHP()}\n";
    echo "{$player2Character->getName()} HP: {$player2Character->getHP()}\n";
    echo "=============================\n";

    // Vez do Jogador 1
    echo "\n  Jogador 1: \n";
    Actions::askAction($player1Character, $player2Character);
    readline("Pressione Enter para continuar...");
    system("clear");

    // Verifica se Jogador 2 morreu
    if ($player2Character->getHP() <= 0) break;

    // Vez do Jogador 2
    echo "\n  Jogador 2: \n";
    Actions::askAction($player2Character, $player1Character);
    readline("Pressione Enter para continuar...");
    system("clear");

    $turn++;
}

// ---- Fim do jogo ----
echo "\n=============================\n";
echo "         FIM DE JOGO!\n";
echo "=============================\n";

echo match(true) {
    $player1Character->getHP() <= 0 && $player2Character->getHP() <= 0
        => "Empate!\n",
    $player1Character->getHP() <= 0
        => " Jogador 2 ({$player2Character->getName()}) venceu!\n",
    default
        => " Jogador 1 ({$player1Character->getName()}) venceu!\n",
};

echo "\nHP Final:\n";
echo "{$player1Character->getName()}: {$player1Character->getHP()} HP\n";
echo "{$player2Character->getName()}: {$player2Character->getHP()} HP\n";
echo "Total de turnos: $turn\n";



