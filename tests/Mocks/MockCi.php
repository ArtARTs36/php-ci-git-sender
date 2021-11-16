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
    ) {
        //
    }

    public static function isDetected(Env $env): bool
    {
        return true;
    }

    public function getCiName(): string
    {
        return 'mock_ci';
    }

    public function describe(): array
    {
        return get_object_vars($this);
    }

    public function getBuildNumber(): string
    {
        return '';
    }

    public function getBuildUrl(): string
    {
        return '';
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
        return '';
    }

    public function getRepositoryName(): string
    {
        return '';
    }

    public function getRepositoryUrl(): string
    {
        return '';
    }

    public function isPullRequest(): TrinaryLogic
    {
        return TrinaryLogic::createFromBoolean($this->isPullRequest);
    }
}
