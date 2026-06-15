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
readline("Pressione Enter para continuar...");
system("clear");

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
readline("Pressione Enter para iniciar a batalha...");
system("clear");

do {
    echo "\nVez do Jogador 1 ({$player1Character->getName()}):\n";
    echo "1. Atacar\n";
    echo "2. Defender\n";
    echo "3. Descansar\n";
    echo "4. Ataque Poderoso\n";
    $action1 = readline("Escolha uma ação: ");
} while (!Actions::performAction($player1Character, $player2Character, $action1));
    
    readline("Pressione Enter para continuar...");
    system("clear");

    if ($player2Character->getHP() <= 0) {
        echo "Jogador 1 venceu!\n";
        
    }

do {    
    echo "\nVez do Jogador 2 ({$player2Character->getName()}):\n";
    echo "1. Atacar\n";
    echo "2. Defender\n";
    echo "3. Descansar\n";
    echo "4. Ataque Poderoso\n";
    $action2 = readline("Escolha uma ação: ");
} while (!Actions::performAction($player2Character, $player1Character, $action2));
    readline("Pressione Enter para continuar...");
    system("clear");

    if ($player1Character->getHP() <= 0) {
        echo "Jogador 2 venceu!\n";
        
}



