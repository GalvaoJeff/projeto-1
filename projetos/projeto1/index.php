<?php

#Agenda de Costuras:

$schedules = [];

require_once __DIR__ . "/functions.php";

while (true) {
    $options = readline("Digite 1 para criar um agendamento, 2 para listar os agendamentos, 
        3 para buscar por data, 4 para buscar por cliente, 5 para editar um agendamento, 
        6 para excluir um agendamento ou 0 para sair: ");

    if ($options == 1) {
        $nameClient = readline("Digite o nome do cliente: ");
        $product = readline("Digite o produto: ");
        $date = readline("Digite a data (dd/mm/yyyy): ");
        $price = readline("Digite o preço: ");

        $schedules[] = [
            'id' => uniqid(),
            'nameClient' => $nameClient,
            'product' => $product,
            'date' => $date,
            'price' => (float) $price
        ];

        echo "Agendamento criado com sucesso! \n";

    } elseif ($options == 2) {
        echo "Lista de Agendamentos: \n";
        listSchedules($schedules);

    } elseif ($options == 3) {
        $date = readline("Digite a data (dd/mm/yyyy) para buscar: ");
        echo findScheduleByDate($schedules, $date);

    } elseif ($options == 4) {
        $nameClient = readline("Digite o nome do cliente para buscar: ");
        echo findScheduleByClient($schedules, $nameClient);
        
    } elseif ($options == 5) {
        // Lógica para editar um agendamento
    } elseif ($options == 6) {
        // Lógica para excluir um agendamento
    } elseif ($options == 0) {
        echo "Saindo...\n";
        break;
    } else {
        echo "Opção inválida. Tente novamente.\n";
    }
}

echo "ID: " . $schedule['id'] . "\n";
echo "Cliente: " . $schedule['nameClient'] . "\n";
echo "Produto: " . $schedule['product'] . "\n";
echo "Data: " . $schedule['date'] . "\n";
echo "Preço: R$" . $schedule['price'] . "\n";
echo "-------------------------\n";

//print_r($schedules);

// echo findScheduleByDate($schedules, $date);
