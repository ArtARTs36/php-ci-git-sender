<?php

namespace ArtARTs36\CiGitSender\Sender\Factory;

use ArtARTs36\CiGitSender\Contracts\Sender;
use ArtARTs36\CiGitSender\Remote\Credentials;
use ArtARTs36\CiGitSender\Sender\CiSender;
use ArtARTs36\CiGitSender\Sender\GitHandlerSender;
use ArtARTs36\GitHandler\Contracts\Factory\GitHandlerFactory;
use ArtARTs36\GitHandler\Factory\LocalGitFactory;
use OndraM\CiDetector\CiDetector;

class SenderFactory
{
    public function __construct(protected GitHandlerFactory $gitFactory, protected string $gitBin)
    {
        //
    }

    public static function local(string $gitBin = 'git'): self
    {
        return new self(new LocalGitFactory(), $gitBin);
    }

    public function create(string $gitDir, Credentials $credentials): Sender
    {
        return new CiSender(
            new GitHandlerSender($this->gitFactory->factory($gitDir, $this->gitBin), $credentials),
            new CiDetector(),
        );
    }
}
