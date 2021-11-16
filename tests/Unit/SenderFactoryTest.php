<?php

namespace ArtARTs36\CiGitSender\Tests\Unit;

use ArtARTs36\CiGitSender\Factory\SenderFactory;
use ArtARTs36\CiGitSender\Remote\Credentials;
use ArtARTs36\CiGitSender\Sender\CiSender;
use ArtARTs36\CiGitSender\Tests\TestCase;

final class SenderFactoryTest extends TestCase
{
    /**
     * @covers \ArtARTs36\CiGitSender\Factory\SenderFactory::create
     * @covers \ArtARTs36\CiGitSender\Factory\SenderFactory::local
     * @covers \ArtARTs36\CiGitSender\Factory\SenderFactory::__construct
     */
    public function testCreate(): void
    {
        $factory = SenderFactory::local();

        self::assertInstanceOf(CiSender::class, $factory->create(__DIR__, new Credentials('', '')));
    }
}
