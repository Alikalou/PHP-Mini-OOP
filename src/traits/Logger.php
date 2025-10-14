<?php

namespace App\Traits;


trait Logger{

    public function log(string $message):void{

        $class = static::class; // late static binding for clarity
        echo date('Y-m-d H:i:s') . " [$class] $message\n";
    }
}