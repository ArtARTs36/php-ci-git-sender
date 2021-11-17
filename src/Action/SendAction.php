<?php

namespace ArtARTs36\CiGitSender\Action;

use ArtARTs36\CiGitSender\Commit\Message;
use ArtARTs36\CiGitSender\Contracts\Sender;

class SendAction
{
    public function __construct(
        protected Sender $sender,
        protected Message $message,
    ) {
        //
    }

    public function send(string $path): void
    {
        $this->sender->send($path, $this->message);
    }
}
