<?php

function addSchedule($schedules, $nameClient, $product, $date, $price) {

    $schedules[] = [
        'id' => uniqid(),
        'nameClient' => $nameClient,
        'product' => $product,
        'date' => $date,
        'price' => $price
    ];

    return $schedules;
}

function listSchedules($schedules) {
    foreach ($schedules as $schedule) {
        echo "ID: " . $schedule['id'] . "\n";
        echo "Cliente: " . $schedule['nameClient'] . "\n";
        echo "Produto: " . $schedule['product'] . "\n";
        echo "Data: " . $schedule['date'] . "\n";
        echo "Preço: R$" . $schedule['price'] . "\n";
        echo "-------------------------\n";
    }
}

function findScheduleByDate($schedules, $date) {
    foreach ($schedules as $schedule) {
        if ($schedule['date'] === $date) {
            echo "ID: " . $schedule['id'] . "\n";
            echo "Cliente: " . $schedule['nameClient'] . "\n";
            echo "Produto: " . $schedule['product'] . "\n";
            echo "Data: " . $schedule['date'] . "\n";
            echo "Preço: R$" . $schedule['price'] . "\n";
            echo "-------------------------\n";
            //return $schedule;
        }
    }
    return null;
}

function findScheduleByClient($schedules, $nameClient) {
    foreach ($schedules as $schedule) {
        if ($schedule['nameClient'] === $nameClient) {
            echo "ID: " . $schedule['id'] . "\n";
            echo "Cliente: " . $schedule['nameClient'] . "\n";
            echo "Produto: " . $schedule['product'] . "\n";
            echo "Data: " . $schedule['date'] . "\n";
            echo "Preço: R$" . $schedule['price'] . "\n";
            echo "-------------------------\n";
            //return $schedule;
        }
    }
    return null;
}

function editSchedule(&$schedules, $id) {
    while (true) {
        $options = readline("Digite 1 para editar o nome do cliente, 
        2 para editar o produto, 
        3 para editar a data, 4 para editar o preço ou 0 para sair: ");

        if ($options == 1) {
            $newNameClient = readline("Digite o novo nome do cliente: ");
            foreach ($schedules as &$schedule) {
                if ($schedule['id'] === $id) {
                    $schedule['nameClient'] = $newNameClient;
                    echo "Nome do cliente atualizado com sucesso! \n";
                    return;
                }
            }
            echo "Agendamento não encontrado. \n";
        } elseif ($options == 2) {
            $newProduct = readline("Digite o novo produto: ");
            foreach ($schedules as &$schedule) {
                if ($schedule['id'] === $id) {
                    $schedule['product'] = $newProduct;
                    echo "Produto atualizado com sucesso! \n";
                    return;
                }
            }
            echo "Agendamento não encontrado. \n";
        } elseif ($options == 3) {
            $newDate = readline("Digite a nova data (dd/mm/yyyy): ");
            foreach ($schedules as &$schedule) {
                if ($schedule['id'] === $id) {
                    $schedule['date'] = $newDate;
                    echo "Data atualizada com sucesso! \n";
                    return;
                }
            }
            echo "Agendamento não encontrado. \n";
        } elseif ($options == 4) {
            $newPrice = readline("Digite o novo preço: ");
            foreach ($schedules as &$schedule) {
                if ($schedule['id'] === $id) {
                    $schedule['price'] = (float) $newPrice;
                    echo "Preço atualizado com sucesso! \n";
                    return;
                }
            }
            echo "Agendamento não encontrado. \n";
        } elseif ($options == 0) {
            echo "Saindo...\n";
            break;
        } else {
            echo "Opção inválida. Tente novamente.\n";
        }
    }
    

    // $schedules = array_values($schedules);
    // return $schedules;
}