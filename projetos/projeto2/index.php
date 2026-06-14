<?php

echo "Bem-vindo ao jogo de RPG!\n";

require_once 'chars.php';
require_once 'warrior.php';
require_once 'wizard.php';

$warrior = new Warrior("Aragorn");
$wizard = new Wizard("Gandalf");

readline("Pressione Enter para iniciar o jogo...");
echo "\n";
echo "Jogador 1: Escolha um personagem para jogar:\n";
echo "1. Guerreiro (Aragorn)\n";
echo "2. Mago (Gandalf)\n";
$player1 = readline("Digite o número do personagem: ");

if ($player1 == 1) {
    $player1Character = $warrior;
    echo "Jogador 1 escolheu o Guerreiro (Aragorn)!\n";
} else {
    $player1Character = $wizard;
    echo "Jogador 1 escolheu o Mago (Gandalf)!\n";
}
echo "Jogador 2: Escolha um personagem para jogar:\n";
echo "1. Guerreiro (Aragorn)\n";
echo "2. Mago (Gandalf)\n";
$player2 = readline("Digite o número do personagem: ");

if ($player2 == 1) {
    $player2Character = $warrior;
    echo "Jogador 2 escolheu o Guerreiro (Aragorn)!\n";
} else {
    $player2Character = $wizard;
    echo "Jogador 2 escolheu o Mago (Gandalf)!\n";
}



