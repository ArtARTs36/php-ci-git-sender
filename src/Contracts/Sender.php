<?php

namespace ArtARTs36\CiGitSender\Contracts;

use ArtARTs36\CiGitSender\Commit\Message;

interface Sender
{
    public function send(string $file, Message $message, ?string $branch = null): void;
}
