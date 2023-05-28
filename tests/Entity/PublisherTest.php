<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Book;
use App\Entity\Publisher;

class PublisherTest extends TestCase
{
    public function testGetBooksReturnsEmptyCollectionByDefault(): void
    {
        $publisher = new Publisher();
        $this->assertEmpty($publisher->getBooks());
    }

    public function testAddBookAddsBookToCollection(): void
    {
        $publisher = new Publisher();
        $book = new Book();
        $publisher->addBook($book);
        $this->assertCount(1, $publisher->getBooks());
        $this->assertSame($book, $publisher->getBooks()->first());
    }

    public function testAddBookDoesNotAddSameBookTwice(): void
    {
        $publisher = new Publisher();
        $book = new Book();
        $publisher->addBook($book);
        $publisher->addBook($book);
        $this->assertCount(1, $publisher->getBooks());
    }

    public function testRemoveBookRemovesBookFromCollection(): void
    {
        $publisher = new Publisher();
        $book = new Book();
        $publisher->addBook($book);
        $publisher->removeBook($book);
        $this->assertEmpty($publisher->getBooks());
    }

    public function testRemoveBookDoesNothingIfBookNotInCollection(): void
    {
        $publisher = new Publisher();
        $book = new Book();
        $publisher->removeBook($book);
        $this->assertEmpty($publisher->getBooks());
    }
}
