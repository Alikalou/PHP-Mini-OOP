<?php

namespace App\Core;

abstract class Entity{

    private int $id;
    private \DateTimeImmutable $createdAT;

    public function __construct(int $id){

        $this->id=$id;
        $this->createdAT=new \DateTimeImmutable();
    }

    public function getID(): int{
        return $this->id;
    }

    public function getCreationTime(): \DateTimeImmutable{

        return $this->createdAT;
    }

    abstract public function getLabel():string;


}
