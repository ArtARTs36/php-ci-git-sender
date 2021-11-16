<?php

namespace ArtARTs36\CiGitSender\Sender;

use ArtARTs36\CiGitSender\Commit\Message;
use ArtARTs36\CiGitSender\Contracts\Sender;
use ArtARTs36\CiGitSender\Remote\Credentials;
use ArtARTs36\GitHandler\Contracts\Handler\GitHandler;
use ArtARTs36\GitHandler\Making\MakingPush;
use Psr\Http\Message\UriInterface;

class GitHandlerSender implements Sender
{
    public function __construct(
        protected GitHandler $git,
        protected Credentials $credentials,
    ) {
        //
    }

    public function send(string $file, Message $message, ?string $branch = null): void
    {
        $this->git->index()->add($file);
        $this->git->commits()->commit($message->render());

        $this->git->pushes()->send(function (MakingPush $push) use ($branch) {
            $push->onRemote(function (UriInterface $uri) {
                return $uri->withUserInfo($this->credentials->login, $this->credentials->token);
            })->onSetUpStream()->onBranchHead($branch);
        });
    }
}
