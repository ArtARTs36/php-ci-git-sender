<?php

namespace ArtARTs36\CiGitSender\Tests\Mocks;

use OndraM\CiDetector\Ci\CiInterface;
use OndraM\CiDetector\Env;
use OndraM\CiDetector\TrinaryLogic;

class MockCi implements CiInterface
{
    public function __construct(
        public string $commit = '',
        public string $branch = '',
        public bool $isPullRequest = false,
    )
    {
        //
    }

    public static function isDetected(Env $env): bool
    {
        // TODO: Implement isDetected() method.
    }

    public function getCiName(): string
    {
        // TODO: Implement getCiName() method.
    }

    public function describe(): array
    {
        // TODO: Implement describe() method.
    }

    public function getBuildNumber(): string
    {
        // TODO: Implement getBuildNumber() method.
    }

    public function getBuildUrl(): string
    {
        // TODO: Implement getBuildUrl() method.
    }

    public function getCommit(): string
    {
        return $this->commit;
    }

    public function getBranch(): string
    {
        return $this->branch;
    }

    public function getTargetBranch(): string
    {
        // TODO: Implement getTargetBranch() method.
    }

    public function getRepositoryName(): string
    {
        // TODO: Implement getRepositoryName() method.
    }

    public function getRepositoryUrl(): string
    {
        // TODO: Implement getRepositoryUrl() method.
    }

    public function isPullRequest(): TrinaryLogic
    {
        return TrinaryLogic::createFromBoolean($this->isPullRequest);
    }
}
