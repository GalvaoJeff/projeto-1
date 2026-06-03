<?php

#Agenda de Costuras:

$schedules = [];

require_once __DIR__ . "/functions.php";

while (true) {
    echo "Digite a opção desejada: \n
    1 - Criar um agendamento
    2 - Listar os agendamentos
    3 - Buscar por data
    4 - Buscar por cliente
    5 - Editar um agendamento
    6 - Excluir um agendamento
    7 - Ver estatísticas
    0 - Sair\n";

$options = readline("Opção: ");
echo "-------------------------\n";      

    if ($options == 1) {

        $nameClient = readline("Digite o nome do cliente: ");
        $product = readline("Digite o produto: ");
        $date = readline("Digite a data (dd/mm/yyyy): ");
        $price = readline("Digite o preço: ");

        $confirmation = readline("Deseja salvar o agendamento? (s/n): \n");
        echo "-------------------------\n";
        if (strtolower($confirmation) !== 's') {
            echo "Agendamento não salvo. \n";
            echo "-------------------------\n";
        } else {

            addSchedule($schedules, $nameClient, $product, $date, $price);

            $schedules[] = [
                'id' => uniqid(),
                'nameClient' => $nameClient,
                'product' => $product,
                'date' => $date,
                'price' => (float) $price
            ]; 

            echo "Agendamento criado com sucesso! \n";
            echo "-------------------------\n";
        }

    } elseif ($options == 2) {
        echo "Lista de Agendamentos: \n";
        listSchedules($schedules, $date);
        if (empty($schedules)) {
            echo "Nenhum agendamento encontrado. \n";
            echo "-------------------------\n";
        }

    } elseif ($options == 3) {
        $date = readline("Digite a data (dd/mm/yyyy) para buscar: ");
        echo findScheduleByDate($schedules, $date);

    } elseif ($options == 4) {
        $nameClient = trim(readline("Digite o nome do cliente para buscar: "));
        findScheduleByClient($schedules, $nameClient);
        
    } elseif ($options == 5) {
        listSchedules($schedules, $date);
        $id = readline("Digite o ID do agendamento para editar: ");
        editSchedule($schedules, $id);
        
    } elseif ($options == 6) {
        listSchedules($schedules, $date);
        $id = readline("Digite o ID do agendamento para excluir: ");
        deleteSchedule($schedules, $id);
    } elseif ($options == 7) {
        echo "Estatísticas: \n";
        statistics($schedules);
    } elseif ($options == 0) {
        echo "Saindo...\n";
        break;
    } else {
        echo "Opção inválida. Tente novamente.\n";
    }
}

/* echo "ID: " . $schedules['id'] . "\n";
echo "Cliente: " . $schedules['nameClient'] . "\n";
echo "Produto: " . $schedules['product'] . "\n";
echo "Data: " . $schedules['date'] . "\n";
echo "Preço: R$" . $schedules['price'] . "\n";
echo "-------------------------\n"; */

//print_r($schedules);

// echo findScheduleByDate($schedules, $date);
