<?php

//Exercício 1

$nome = "Jeferson";
$idade = 31;
$altura = 1.69;

echo "Exercício 1: \n";
echo "Meu nome é $nome, tenho $idade anos e minha altura é $altura metros. \n";
echo "\n";

//Exercício 2

$valor1 = 42;
$valor2 = 3.14;
$valor3 = "PHP";
$valor4 = true;
$valor5 = null;

/*gettype($valor1);
gettype($valor2);
gettype($valor3);
gettype($valor4);
gettype($valor5);
*/

echo "Exercício 2: \n";
echo "O tipo de $valor1 é: " . gettype($valor1) . "\n";
echo "O tipo da variável $valor2 é: " . gettype($valor2) . "\n";
echo "O tipo da variável $valor3 é: " . gettype($valor3) . "\n";
echo "O tipo da variável $valor4 é: " . gettype($valor4) . "\n";    
echo "O tipo da variável $valor5 é: " . gettype($valor5) . "\n";
echo "\n";    

//Exercício 3

$peso = 70.5;
$altura = 1.75;

$imc = $peso / ($altura * $altura);
number_format($imc, 2);

echo "Exercício 3: \n";
echo "O IMC é: " . number_format($imc, 2) . "\n";
echo "\n";

//Exercício 4

$a = 10;
$b = 20;

echo "Exercício 4: \n";
echo "O valor de a é: $a e o valor de b é: $b \n";

$b = $b - $a;
echo "Agora o valor de b é: $b \n";

$a = $a + $a;
echo "Agora o valor de a é: $a \n";
echo "\n";

//Exercício 5

$celcius = 25;
$fahrenheit = ($celcius * 9/5) + 32;

echo "Exercício 5: \n";
echo "$celcius graus Celsius é igual a $fahrenheit graus Fahrenheit. \n";
$kelvin = $celcius + 273.15;
echo "$celcius graus Celsius é igual a $kelvin graus Kelvin. \n";
echo "\n";

//Exercício 6

$x = "10";
$y = 10;

echo "Exercício 6: \n";

//Compara se o valor de $x é igual ao valor de $y, ignorando o tipo
$x == $y;
echo "Comparação do valor se é igual ignorando o tipo usando ==: $x == $y é " . ($x == $y ? "verdadeiro" : "falso") . "\n";
//Compara se o valor de $x é igual ao valor de $y, considerando o tipo
$x === $y;
echo "Comparação do valor se é igual considerando o tipo usando ===: $x === $y é " . ($x === $y ? "verdadeiro" : "falso") . "\n";
//Compara se o valor de $x é diferente do valor de $y, ignorando o tipo
$x != $y;
echo "Comparação do valor se é diferente ignorando o tipo usando !=: $x != $y é " . ($x != $y ? "verdadeiro" : "falso") . "\n";
//Compara se o valor de $x é diferente do valor de $y, considerando o tipo
$x !== $y;
echo "Comparação do valor se é diferente considerando o tipo usando !==: $x !== $y é " . ($x !== $y ? "verdadeiro" : "falso") . "\n";
echo "\n";

//Exercício 7


echo "Exercício 7: \n";

$numero = -5 % 6;
if ($numero > 0) {
    echo "O número $numero é positivo. \n";
} elseif ($numero < 0) {
    echo "O número $numero é negativo. \n";
} else {
    echo "O número $numero é zero. \n";
}
echo "\n";

//Exercício 8

$valor = "123abc";
$valor2 = "";
$valor3 = "0";
echo "Exercício 8: \n";

$valorInt = (int)$valor;
echo "O valor convertido de $valor para inteiro é: $valorInt \n";
$valorFloat = (float)$valor;
echo "O valor convertido de $valor para float é: $valorFloat \n";
$valorBool = (bool)$valor;
echo "O valor convertido de $valor para boolean é: " . ($valorBool ? "true" : "false") . "\n";
$valor2Int = (int)$valor2;
echo "O valor convertido de $valor2 para inteiro é: $valor2Int \n";
$valor2Float = (float)$valor2;
echo "O valor convertido de $valor2 para float é: $valor2Float \n";
$valor2Bool = (bool)$valor2;
echo "O valor convertido de $valor2 para boolean é: " . ($valor2Bool ? "true" : "false") . "\n";
$valor3Int = (int)$valor3;
echo "O valor convertido de $valor3 para inteiro é: $valor3Int \n";
$valor3Float = (float)$valor3;
echo "O valor convertido de $valor3 para float é: $valor3Float \n";
$valor3Bool = (bool)$valor3;
echo "O valor convertido de $valor3 para boolean é: " . ($valor3Bool ? "true" : "false") . "\n";
echo "\n";

//Exercício 9

$total = 100;
echo "Exercício 9: \n";

$total += 50;
echo "Após adicionar 50, o total é: $total \n";
$total -= 30;
echo "Após subtrair 30, o total é: $total \n";
$total *= 2;
echo "Após multiplicar por 2, o total é: $total \n";
$total /= 4;
echo "Após dividir por 4, o total é: $total \n";
$total %= 7;
echo "Após obter o resto da divisão por 7, o total é: $total \n";
$totalReais = (float) $total;
echo $totalReais .=" Reais \n";
echo "\n";