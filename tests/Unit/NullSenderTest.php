<?php

namespace ArtARTs36\CiGitSender\Tests\Unit;

use ArtARTs36\CiGitSender\Commit\Message;
use ArtARTs36\CiGitSender\Sender\NullSender;
use ArtARTs36\CiGitSender\Tests\TestCase;

final class NullSenderTest extends TestCase
{
    /**
     * @covers \ArtARTs36\CiGitSender\Sender\NullSender::send
     */
    public function testSend(): void
    {
        self::assertNull((new NullSender())->send('', new Message(''), ''));
    }
}
