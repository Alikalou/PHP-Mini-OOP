<?php


namespace App\Domain;


class Member extends Person{

    private array $borrowed=[];

    public function borrow(string $title):void{
        
        $this->borrowed[]=$title;
    }

    public function getBorrowed():array{
        return $this->borrowed;
    }

}