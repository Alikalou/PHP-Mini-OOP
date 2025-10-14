<?php
namespace App\Domain;


class Library
{
/** @var array<string,Book> */
private array $catalog = [];


private static int $librariesCount = 0; // static property


public function __construct()
{
self::$librariesCount++;
}


public static function getLibrariesCount(): int
{
return self::$librariesCount; // static method
}


public function addBook(Book $book): void
{
$this->catalog[$book->title] = $book;
}


public function get(string $title): ?Book
{
return $this->catalog[$title] ?? null;
}


/** @return array<string,Book> */
public function all(): array
{
return $this->catalog;
}
}