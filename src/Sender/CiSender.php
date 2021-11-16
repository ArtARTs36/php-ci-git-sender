<?php

namespace ArtARTs36\CiGitSender\Sender;

use ArtARTs36\CiGitSender\Commit\Message;
use ArtARTs36\CiGitSender\Contracts\Sender;
use OndraM\CiDetector\CiDetectorInterface;

class CiSender implements Sender
{
    public function __construct(
        protected Sender $sender,
        protected CiDetectorInterface $ciDetector,
    ) {
        //
    }

    public function send(string $file, Message $message, ?string $branch = null): void
    {
        if (! $this->ciDetector->isCiDetected()) {
            return;
        }

        $ci = $this->ciDetector->detect();

        if ($ci->isPullRequest()->yes()) {
            return;
        }

        $message->addTags([
            'FILE' => $file,
            'BRANCH' => $ci->getBranch(),
            'COMMIT' => $ci->getCommit(),
        ]);

        $this->sender->send($file, $message, $ci->getBranch());
    }
}
