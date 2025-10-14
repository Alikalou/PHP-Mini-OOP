<?php 

namespace App\Domain;

use App\traits\Logger;
use App\Contracts\Printable;

class Librarian extends Person implements Printable{

    use Logger;

    public function printOutput(): void{

        echo "Librarian: {$this->getName()}, ID: {$this->getId()}\n";

    }

    public function greet(): string{

        $this->log("Greeting a visitor");
        return "Hello, I'm {$this->getName()}";

    }
}


