<?php

class Book {
    // Private properties
    private $title;
    private $availableCopies;

    // Constructor to initialize properties
    public function __construct($title, $availableCopies) {
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }

    // Method to get the title of the book
    public function getTitle() {
        return $this->title;
    }

    // Method to get the available copies of the book
    public function getAvailableCopies() {
        return $this->availableCopies;
    }

    // Method to borrow a book
    public function borrowBook() {
        if ($this->availableCopies > 0) {
            $this->availableCopies--;
            return true;
        } else {
            return false;
        }
    }

    // Method to return a book
    public function returnBook() {
        $this->availableCopies++;
    }
}

class Member {
    // Private properties
    private $name;

    // Constructor to initialize properties
    public function __construct($name) {
        $this->name = $name;
    }

    // Method to get the name of the member
    public function getName() {
        return $this->name;
    }

    // Method to borrow a book
    public function borrowBook($book) {
        if ($book->borrowBook()) {
            echo "{$this->name} borrowed '{$book->getTitle()}'\n";
        } else {
            echo "{$this->name} could not borrow '{$book->getTitle()}' because no copies are available\n";
        }
    }

    // Method to return a book
    public function returnBook($book) {
        $book->returnBook();
        echo "{$this->name} returned '{$book->getTitle()}'\n";
    }
}

// Usage

// Create 2 books
$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);

// Create 2 members
$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");

// Member 1 borrows book 1
$member1->borrowBook($book1);

// Member 2 borrows book 2
$member2->borrowBook($book2);

// Print available copies with their names
echo "Available copies of '{$book1->getTitle()}': {$book1->getAvailableCopies()}\n";
echo "Available copies of '{$book2->getTitle()}': {$book2->getAvailableCopies()}\n";

// Additional demonstration of returning books (optional)
$member1->returnBook($book1);
$member2->returnBook($book2);

// Print available copies again after returning the books
echo "Available copies of '{$book1->getTitle()}' after return: {$book1->getAvailableCopies()}\n";
echo "Available copies of '{$book2->getTitle()}' after return: {$book2->getAvailableCopies()}\n";

?>
