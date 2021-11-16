<?php

namespace ArtARTs36\CiGitSender\Tests\Mocks;

use OndraM\CiDetector\Ci\CiInterface;
use OndraM\CiDetector\CiDetectorInterface;
use OndraM\CiDetector\Exception\CiNotDetectedException;

class MockCiDetector implements CiDetectorInterface
{
    public function __construct(private ?CiInterface $ci = null)
    {
        //
    }

    public static function not(): self
    {
        return new self();
    }

    public static function yes(CiInterface $ci): self
    {
        return new self($ci);
    }

    public function detect(): CiInterface
    {
        if (! $this->isCiDetected()) {
            throw new CiNotDetectedException();
        }

        return $this->ci;
    }

    public function isCiDetected(): bool
    {
        return $this->ci !== null;
    }
}
