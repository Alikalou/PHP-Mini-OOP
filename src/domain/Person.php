<?php

namespace App\Domain;

use App\Core\Entity;

class Person extends Entity{

    //you see the mistake that you did? he is esentially using the constructor for 
    //its proper use, which is initialization of the object

    public function __construct(protected string $name, protected int $age=0, int $id){
        Entity::__construct($id);
        //Through the constructor of person, we are invoking the constructor of entity.
    }

    public function setName(string $name):void{
        $this->name=$name;
    }
    
    public function getName():string{
        return $this->name;
    }

    public function setAge(int $age): void{
        $this->age=$age;
    }
    
    protected function incrementAge(): void { $this->age++; }


    public function getLabel(): string { return $this->name; }
}