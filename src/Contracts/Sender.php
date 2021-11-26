<?php

namespace ArtARTs36\CiGitSender\Contracts;

use ArtARTs36\CiGitSender\Commit\Message;

interface Sender
{
    /**
     * Send file to remote repository
     */
    public function send(string $file, Message $message, ?string $branch = null): void;
}
