<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\User;
use App\Entity\UserBook;

class UserTest extends TestCase
{
    public function testGetId(): void
    {
        $user = new User();
        $this->assertNull($user->getId());
    }

    public function testGetEmail(): void
    {
        $user = new User();
        $user->setEmail('test@example.com');
        $this->assertSame('test@example.com', $user->getEmail());
    }

    public function testGetUserIdentifier(): void
    {
        $user = new User();
        $user->setEmail('test@example.com');
        $this->assertSame('test@example.com', $user->getUserIdentifier());
    }

    public function testGetRoles(): void
    {
        $user = new User();
        $this->assertContains('ROLE_USER', $user->getRoles());
    }

    public function testSetRoles(): void
    {
        $user = new User();
        $user->setRoles(['ROLE_ADMIN']);
        $this->assertContains('ROLE_ADMIN', $user->getRoles());
    }

    public function testGetPassword(): void
    {
        $user = new User();
        $user->setPassword('password');
        $this->assertSame('password', $user->getPassword());
    }

    public function testGetPseudo(): void
    {
        $user = new User();
        $user->setPseudo('test');
        $this->assertSame('test', $user->getPseudo());
    }

    public function testAddUserBook(): void
    {
        $user = new User();
        $userBook = new UserBook();
        $user->addUserBook($userBook);
        $this->assertTrue($user->getUserBooks()->contains($userBook));
    }

    public function testRemoveUserBook(): void
    {
        $user = new User();
        $userBook = $this->createMock(UserBook::class);
        $user->addUserBook($userBook);
        $user->removeUserBook($userBook);
        $this->assertFalse($user->getUserBooks()->contains($userBook));
    }
}