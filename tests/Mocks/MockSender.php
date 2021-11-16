<?php

namespace ArtARTs36\CiGitSender\Tests\Mocks;

use ArtARTs36\CiGitSender\Commit\Message;
use ArtARTs36\CiGitSender\Contracts\Sender;

class MockSender implements Sender
{
    private bool $isCalled = false;

    public function send(string $file, Message $message, ?string $branch = null): void
    {
        $this->isCalled = true;
    }

    public function isCalled(): bool
    {
        return $this->isCalled;
    }
}
