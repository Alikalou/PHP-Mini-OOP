<?php

namespace App\Domain;

class Book{

    public const CATEGORY_FICTION='FICTION';
    public const CATEGORY_NONFICTION='NONFICTION';

    public function __construct(
        public string $title,
        public string $author,
        private int $availableCopies=0,
        public string $category= self::CATEGORY_FICTION
    ){}

    public function borrowing(int $amount=1):bool{

        if($amount<=0) 
            return false;
        if($this->availableCopies < $amount) 
            return true;
        $this->availableCopies -= $amount;
        return true;
        
    }

    public function returning(int $amount=1):void{

        if($amount>0)
            $this->availableCopies += $amount;
    }

    public function getAvailableCopies():int{
        return $this->availableCopies;
    }
    

}