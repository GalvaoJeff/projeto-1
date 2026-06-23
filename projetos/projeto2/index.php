<?php

echo "Bem-vindo ao jogo de RPG!\n";

require_once 'chars.php';
require_once 'warrior.php';
require_once 'wizard.php';
require_once 'actions.php';
require_once 'archer.php';
require_once 'berseker.php';
require_once 'sounds.php';

$warrior = new Warrior("Aragorn");
$wizard = new Wizard("Gandalf");
$archer = new Archer("Legolas");
$berseker = new Berseker("Ork");

Sounds::playSound("intro.mp3");
readline("Pressione Enter para iniciar o jogo...");
echo "\n";
echo "Jogador 1: Escolha um personagem para jogar:\n";
echo "1. Guerreiro - " . $warrior->getName() . "\n" . $warrior->getHP() . " HP\n" . 
$warrior->getAttackPower() . " Poder de Ataque\n" . 
$warrior->getDefensePower() . " Poder de Defesa\n" . 
$warrior->getStamina() . " Stamina\n";
echo "|--------------------------------------------------|\n";
echo "\n";
echo "2. Mago - " . $wizard->getName() . "\n" . $wizard->getHP() . " HP\n" . 
$wizard->getAttackPower() . " Poder de Ataque\n" . 
$wizard->getDefensePower() . " Poder de Defesa\n" . $wizard->getStamina() . " Stamina\n";
echo "|--------------------------------------------------|\n";
echo "\n";
echo "3. Arqueiro - " . $archer->getName() . "\n" . $archer->getHP() . " HP\n" . 
$archer->getAttackPower() . " Poder de Ataque\n" . 
$archer->getDefensePower() . " Poder de Defesa\n" . 
$archer->getStamina() . " Stamina\n";
echo "|--------------------------------------------------|\n";
echo "\n";
echo "4. Berseker - " . $berseker->getName() . "\n" . $berseker->getHP() . " HP\n" . 
$berseker->getAttackPower() . " Poder de Ataque\n" . 
$berseker->getDefensePower() . " Poder de Defesa\n" . 
$berseker->getStamina() . " Stamina\n";
echo "|--------------------------------------------------|\n";
echo "\n";
$player1 = readline("Digite o número do personagem: ");


if ($player1 == 1) {
    $player1Character = $warrior;
    echo "Jogador 1 escolheu o Guerreiro! - " . $warrior->getName() . "\n" ;
} else if ($player1 == 2) {
    $player1Character = $wizard;
    echo "Jogador 1 escolheu o Mago! - " . $wizard->getName() . "\n";
} else if ($player1 == 3) {
    $player1Character = $archer;
    echo "Jogador 1 escolheu o Arqueiro! - " . $archer->getName() . "\n";
} else {
    $player1Character = $berseker;
    echo "Jogador 1 escolheu o Berseker! - " . $berseker->getName() . "\n";
}
readline("Pressione Enter para continuar...");
system("clear");

echo "Jogador 2: Escolha um personagem para jogar:\n";
echo "1. Guerreiro - " . $warrior->getName() . "\n" . $warrior->getHP() . " HP\n" . 
$warrior->getAttackPower() . " Poder de Ataque\n" . 
$warrior->getDefensePower() . " Poder de Defesa\n" . 
$warrior->getStamina() . " Stamina\n";
echo "|--------------------------------------------------|\n";
echo "\n";
echo "2. Mago - " . $wizard->getName() . "\n" . $wizard->getHP() . " HP\n" . 
$wizard->getAttackPower() . " Poder de Ataque\n" . 
$wizard->getDefensePower() . " Poder de Defesa\n" . $wizard->getStamina() . " Stamina\n";
echo "|--------------------------------------------------|\n";
echo "\n";
echo "3. Arqueiro - " . $archer->getName() . "\n" . $archer->getHP() . " HP\n" . 
$archer->getAttackPower() . " Poder de Ataque\n" . 
$archer->getDefensePower() . " Poder de Defesa\n" . 
$archer->getStamina() . " Stamina\n";
echo "|--------------------------------------------------|\n";
echo "\n";
echo "4. Berseker - " . $berseker->getName() . "\n" . $berseker->getHP() . " HP\n" . 
$berseker->getAttackPower() . " Poder de Ataque\n" . 
$berseker->getDefensePower() . " Poder de Defesa\n" . 
$berseker->getStamina() . " Stamina\n";
echo "|--------------------------------------------------|\n";
echo "\n";
$player2 = readline("Digite o número do personagem: ");

if ($player2 == 1) {
    $player2Character = $warrior;
    echo "Jogador 2 escolheu o Guerreiro! - " . $warrior->getName() . "\n";
} else if ($player2 == 2) {
    $player2Character = $wizard;
    echo "Jogador 2 escolheu o Mago! - " . $wizard->getName() . "\n";
} else if ($player2 == 3) {
    $player2Character = $archer;
    echo "Jogador 2 escolheu o Arqueiro! - " . $archer->getName() . "\n";
} else {
    $player2Character = $berseker;
    echo "Jogador 2 escolheu o Berseker! - " . $berseker->getName() . "\n";
}
readline("Pressione Enter para iniciar a batalha...");
system("clear");

Sounds::playSound("battle.mp3", true);

$turn = 1;

while ($player1Character->getHP() > 0 && $player2Character->getHP() > 0) {

    echo "\n=============================\n";
    echo "         TURNO $turn\n";
    echo "=============================\n";
    echo "{$player1Character->getName()} HP: {$player1Character->renderHpBar()}\n";
    echo "{$player1Character->getName()} Stamina: {$player1Character->renderStaminaBar()}\n";
    echo "{$player2Character->getName()} HP: {$player2Character->renderHpBar()}\n";
    echo "{$player2Character->getName()} Stamina: {$player2Character->renderStaminaBar()}\n";
    echo "=============================\n";

    $player1Character->processPoison();
    $player2Character->processPoison();
    $player1Character->processBloodlust();
    $player2Character->processBloodlust();

    if ($player1Character->getHP() <= 0 || $player2Character->getHP() <= 0) {
        break;
    }

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

Sounds::playSound("final.mp3", false);

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
echo "{$player1Character->getName()}: {$player1Character->renderHpBar()} HP\n";
echo "{$player1Character->getName()}: {$player1Character->renderStaminaBar()} Stamina\n";
echo "{$player2Character->getName()}: {$player2Character->renderHpBar()} HP\n";
echo "{$player2Character->getName()}: {$player2Character->renderStaminaBar()} Stamina\n";
echo "Total de turnos: $turn\n";



