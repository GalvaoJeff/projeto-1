<?php

class Actions {
    public static function performAction(Character $actor, Character $target, int $action) {
        switch ($action) {
            case 1:
                $actor->attack($target);
                break;
            case 2:
                $actor->defense();
                break;
            case 3:
                $actor->rest();
                break;
            case 4:
                $actor->powerStrike($target);
                break;
            default:
                echo "Ação inválida! Tente novamente.\n";
                return false;
        }
        return true;
    }
}

