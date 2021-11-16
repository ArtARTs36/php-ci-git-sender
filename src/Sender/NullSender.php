<?php

namespace ArtARTs36\CiGitSender\Sender;

use ArtARTs36\CiGitSender\Commit\Message;
use ArtARTs36\CiGitSender\Contracts\Sender;

class NullSender implements Sender
{
    public function send(string $file, Message $message, ?string $branch = null): void
    {
        //
    }
}
