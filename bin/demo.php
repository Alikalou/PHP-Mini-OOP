<?php
require __DIR__ . '/../vendor/autoload.php'; // if using Composer autoload

use App\Domain\{Person, Member, Librarian, Book, Library};
use App\Contracts\Printable;
use App\Support\FileLog;


// Objects, constructors, methods
$l1 = new Library();
$l2 = new Library();


echo "Libraries so far: " . Library::getLibrariesCount() . "\n\n"; // static


$lib = new Librarian(id: 1, name: 'Layla', age: 32);
echo $lib->greet() . "\n\n"; // trait log + method


$book = new Book(title: 'Clean Code', author: 'Robert C. Martin', availableCopies: 3, category: Book::CATEGORY_NONFICTION);
$l1->addBook($book);


$member = new Member(id: 2, name: 'Omar', age: 21);
if ($book->borrowing(2)) {
$member->borrow($book->title);
}


printf("Remaining copies of '%s': %d\n\n", $book->title, $book->getAvailableCopies());


// Introspection
echo "== Introspection ==\n";
echo 'Class of $lib: ' . get_class($lib) . "\n";
echo 'Parent of Librarian: ' . get_parent_class($lib) . "\n";
echo '$lib instanceof Printable? ' . ( ($lib instanceof Printable) ? 'yes' : 'no') . "\n";


$methods = get_class_methods($lib);
echo "Methods on Librarian (partial): " . implode(', ', array_slice($methods, 0, 5)) . " ...\n\n";


// Serialization demo with __sleep/__wakeup
$logger = new FileLog(__DIR__ . '\demo.log');
$logger->write('Before serialize');
$serialized = serialize($logger);
$logger2 = unserialize($serialized);
$logger2->write('After unserialize');


echo "Wrote to log file via serialized logger.\n";