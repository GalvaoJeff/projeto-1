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

function listSchedules($schedules, $date) {
    $schedules === $date;
    uasort($schedules, function($a, $b) {
        return strtotime(str_replace('/', '-', $a['date'])) - strtotime(str_replace('/', '-', $b['date']));
            
        });
    foreach ($schedules as $schedule) {
        echo "ID: " . $schedule['id'] . "\n";
        echo "Cliente: " . $schedule['nameClient'] . "\n";
        echo "Produto: " . $schedule['product'] . "\n";
        echo "Data: " . $schedule['date'] . "\n";
        echo "Preço: R$ " . $schedule['price'] . "\n";
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
            echo "Preço: R$ " . $schedule['price'] . "\n";
            echo "-------------------------\n";
            //return $schedule;
        }
    }
    return null;
}

function findScheduleByClient($schedules, $nameClient) {
    $found = false;
    foreach ($schedules as $schedule) {
        if (stripos($schedule['nameClient'], $nameClient) !== false) {
            echo "ID: " . $schedule['id'] . "\n";
            echo "Cliente: " . $schedule['nameClient'] . "\n";
            echo "Produto: " . $schedule['product'] . "\n";
            echo "Data: " . $schedule['date'] . "\n";
            echo "Preço: R$ " . $schedule['price'] . "\n";
            echo "-------------------------\n";
            $found = true;
            //return $schedule;
        }
    }
    if (!$found) {
        echo "Cliente: " . $nameClient . "\n" . "Não encontrado. \n";
        echo "-------------------------\n";
    }
    return null;
}

function editSchedule(&$schedules, $id) {
    while (true) {
        echo "Digite a opção para editar: \n
        1 - Nome do Cliente
        2 - Produto
        3 - Data
        4 - Preço
        0 - Sair\n";

        $options = readline("Opção: ");
        echo "-------------------------\n";

        if ($options == 1) {
            $newNameClient = readline("Digite o novo nome do cliente: ");
            $confirmation = readline("Deseja salvar as alterações? (s/n): ");
            echo "-------------------------\n";
            if (strtolower($confirmation) !== 's') {
                echo "Edição cancelada. \n";
                echo "-------------------------\n";
                return;
            }
            foreach ($schedules as &$schedule) {
                if ($schedule['id'] === $id) {
                    $schedule['nameClient'] = $newNameClient;
                    echo "Nome do cliente atualizado com sucesso! \n";
                    echo "-------------------------\n";
                    return;
                }
            }
            echo "Agendamento não encontrado. \n";
            echo "-------------------------\n";
        } elseif ($options == 2) {
            $newProduct = readline("Digite o novo produto: ");
            $confirmation = readline("Deseja salvar as alterações? (s/n): ");
            echo "-------------------------\n";
            if (strtolower($confirmation) !== 's') {
                echo "Edição cancelada. \n";
                echo "-------------------------\n";
                return;
            }
            foreach ($schedules as &$schedule) {
                if ($schedule['id'] === $id) {
                    $schedule['product'] = $newProduct;
                    echo "Produto atualizado com sucesso! \n";
                    echo "-------------------------\n";
                    return;
                }
            }
            echo "Agendamento não encontrado. \n";
            echo "-------------------------\n";
        } elseif ($options == 3) {
            $newDate = readline("Digite a nova data (dd/mm/yyyy): ");
            $confirmation = readline("Deseja salvar as alterações? (s/n): ");
            echo "-------------------------\n";
            if (strtolower($confirmation) !== 's') {
                echo "Edição cancelada. \n";
                echo "-------------------------\n";
                return;
            }
            foreach ($schedules as &$schedule) {
                if ($schedule['id'] === $id) {
                    $schedule['date'] = $newDate;
                    echo "Data atualizada com sucesso! \n";
                    echo "-------------------------\n";
                    return;
                }
            }
            echo "Agendamento não encontrado. \n";
            echo "-------------------------\n";
        } elseif ($options == 4) {
            $newPrice = readline("Digite o novo preço: ");
            $confirmation = readline("Deseja salvar as alterações? (s/n): ");
            echo "-------------------------\n";
            if (strtolower($confirmation) !== 's') {
                echo "Edição cancelada. \n";
                echo "-------------------------\n";
                return;
            }
            foreach ($schedules as &$schedule) {
                if ($schedule['id'] === $id) {
                    $schedule['price'] = (float) $newPrice;
                    echo "Preço atualizado com sucesso! \n";
                    echo "-------------------------\n";
                    return;
                }
            }
            echo "Agendamento não encontrado. \n";
            echo "-------------------------\n";
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

function deleteSchedule(&$schedules, $id) {
    foreach ($schedules as $index => $schedule) {
        if ($schedule['id'] === $id) {
            $confirmation = readline("Tem certeza que deseja excluir este agendamento? (s/n): ");
            echo "-------------------------\n";
            if (strtolower($confirmation) !== 's') {
                echo "Exclusão cancelada. \n";
                echo "-------------------------\n";
                return;
            }
            unset($schedules[$index]);
            echo "Agendamento excluído com sucesso! \n";
            echo "-------------------------\n";
            return;
        }
    }
    echo "Agendamento não encontrado. \n";
    echo "-------------------------\n";
}

function statistics($schedules) {
    $totalSchedules = count($schedules);
    $totalAmount = array_sum(array_column($schedules, 'price'));
    $averagePrice = $totalSchedules > 0 ? $totalAmount / $totalSchedules : 0;

    echo "-------------------------\n";
    echo "Total de Agendamentos: " . $totalSchedules . "\n";
    echo "Receita Total: R$" . number_format($totalAmount, 2) . "\n";
    echo "Preço Médio: R$" . number_format($averagePrice, 2) . "\n";
    echo "-------------------------\n";
}