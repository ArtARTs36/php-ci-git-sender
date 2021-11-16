<?php

namespace ArtARTs36\CiGitSender\Tests\Unit;

use ArtARTs36\CiGitSender\Commit\Message;
use ArtARTs36\CiGitSender\Sender\CiSender;
use ArtARTs36\CiGitSender\Tests\Mocks\MockCi;
use ArtARTs36\CiGitSender\Tests\Mocks\MockCiDetector;
use ArtARTs36\CiGitSender\Tests\Mocks\MockSender;
use ArtARTs36\CiGitSender\Tests\TestCase;
use ArtARTs36\GitHandler\Data\Author;

final class CiSenderTest extends TestCase
{
    /**
     * @covers \ArtARTs36\CiGitSender\Sender\CiSender::send
     */
    public function testSendOnCiIsNotDetected(): void
    {
        $sender = new CiSender($decorable = new MockSender(), MockCiDetector::not());

        $sender->send('', new Message(''), '');

        self::assertFalse($decorable->isCalled());
    }

    /**
     * @covers \ArtARTs36\CiGitSender\Sender\CiSender::send
     */
    public function testSendOnPullRequest(): void
    {
        $sender = new CiSender($decorable = new MockSender(), MockCiDetector::yes(new MockCi(isPullRequest: true)));

        $sender->send('', new Message(''), '');

        self::assertFalse($decorable->isCalled());
    }

    /**
     * @covers \ArtARTs36\CiGitSender\Sender\CiSender::send
     */
    public function testSendOk(): void
    {
        $sender = new CiSender($decorable = new MockSender(), MockCiDetector::yes(new MockCi(branch: 'dev')));

        $sender->send('', $message = new Message('for {$BRANCH}'));

        self::assertTrue($decorable->isCalled());
        self::assertEquals('for dev', $message->render());
    }
}
