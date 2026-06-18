<?php

class Actions {

    private static array $actions = [
        1 => ["label" => "Atacar",         "method" => "attack",      "needsTarget" => true],
        2 => ["label" => "Defender",        "method" => "defense",     "needsTarget" => false],
        3 => ["label" => "Descansar",       "method" => "rest",        "needsTarget" => false],
        4 => ["label" => "Ataque Poderoso", "method" => "powerStrike", "needsTarget" => true],
        5 => ["label" => "Efeito Especial", "method" => "special",     "needsTarget" => true],
    ];

    public static function getMenu(): string {
        $menu = "";
        foreach (self::$actions as $key => $action) {
            $menu .= "$key. {$action['label']}\n";
        }
        return $menu;
    }

    public static function isValidAction(int $action): bool {
        return isset(self::$actions[$action]);
    }

    public static function performAction(Character $actor, Character $target, int $action): bool {
        if (!self::isValidAction($action)) {
            echo "Ação inválida! Escolha entre 1 e " . count(self::$actions) . ".\n";
            return false;
        }

        $selected = self::$actions[$action];
        $method   = $selected["method"];

        if (!method_exists($actor, $method)) {
            echo "Ação não disponível para este personagem!\n";
            return false;
        }

        echo "\n{$actor->getName()} usou {$selected['label']}!\n";

        if ($selected["needsTarget"]) {
            $actor->$method($target);
        } else {
            $actor->$method();
        }

        if ($actor->getStamina() < 0) {
            echo "{$actor->getName()} estamina insuficiente para esta ação! Escolha outra ação ou descanse para recuperar stamina.\n";
            $actor->rest();
        }

        return true;
    }

    public static function askAction(Character $actor, Character $target): void {
        $valid = false;
        while (!$valid) {
            echo "\nVez de {$actor->getName()}:\n";
            echo self::getMenu();
            $action = (int) readline("Escolha uma ação: ");

            $valid = match(true) {
                self::isValidAction($action) => self::performAction($actor, $target, $action),
                default                      => (function() {
                    echo "Ação inválida! Tente novamente.\n";
                    return false;
                })()
            };
        }
    }
}

