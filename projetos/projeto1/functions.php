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
            return $schedule;
        }
    }
    return null;
}

function findeScheduleByClient($schedules, $nameClient) {
    foreach ($schedules as $schedule) {
        if ($schedule['nameClient'] === $nameClient) {
            return $schedule;
        }
    }
    return null;
}