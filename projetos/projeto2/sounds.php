<?php

class Sounds {
    public static function playSound(string $soundFile, bool $loop = false) {
        exec("pkill ffplay > /dev/null 2>&1");
        $loopParam = $loop ? "-loop 0" : "";
        exec("ffplay -nodisp -autoexit {$loopParam} {$soundFile} > /dev/null 2>&1 &");
    }
}
