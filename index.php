<?php

echo "Hello, World! This is a simple PHP application running in a Docker container.";
echo "\n";

//Minhas Variáveis de ambiente

$nome = "Jeferson";
$sobrenome = "Galvão";
$idade = 31;
$altura = 1.69;

echo "Meu nome é $nome $sobrenome e tenho $idade anos. Minha altura é $altura metros.";
echo "\n";

//Alterando o valor da variável

$nome = "Simo";
$sobrenome = "Haiha";
$idade = 32;
$altura = 1.75;
echo "Agora, tenho $idade anos. Meu nome é $nome $sobrenome e minha altura é $altura metros.";
echo "\n";

//Trabalhando com os tipos de variáveis

//Verificando o tipo da variável $nome
$nome = "Jeferson";

var_dump($nome);
if (is_string($nome)) {
    echo "A variável \$nome é do tipo string.";
} else {
    echo "A variável \$nome não é do tipo string.";
}
echo "\n";

//Verificando o tipo da variável $idade
$idade = 31;

var_dump($idade);
if (is_int($idade)) {
    echo "A variável \$idade é do tipo int.";
} else {
    echo "A variável \$idade não é do tipo int.";
}
echo "\n";

//Verificando o tipo da variável $altura
$altura = 1.69;

var_dump($altura);
if (is_float($altura)) {
    echo "A variável \$altura é do tipo float.";
} else {
    echo "A variável \$altura não é do tipo float.";
}
echo "\n";

//Verificando uma variavel do tipo Boolean
$estudante = true;

var_dump($estudante);
if (is_bool($estudante)) {
    echo "A variável \$estudante é do tipo boolean.";
} else {
    echo "A variável \$estudante não é do tipo boolean.";
}
echo "\n";

//Verificando o tipo de variáveis de array

$frutas = array("maçã", "banana", "laranja");

var_dump($frutas);
if (is_array($frutas)) {
    echo "A variável \$frutas é do tipo array.";
} else {
    echo "A variável \$frutas não é do tipo array.";
}
echo "\n";

//Objetos

class Pessoa {
    public $nome;
    public $sobrenome;

    public function atribuirNome($nome, $sobrenome) {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
    }
}

$pessoa = new Pessoa();
$pessoa->atribuirNome("Jeferson", "Galvão");
var_dump($pessoa);

if (is_object($pessoa)) {
    echo "A variável \$pessoa é do tipo object.";
} else {
    echo "A variável \$pessoa não é do tipo object.";
}
echo "\n";

//Constantes

define("PI", 3.14159);
echo "O valor de PI é: " . PI;
echo "\n";