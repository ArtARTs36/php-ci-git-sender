<?php

namespace ArtARTs36\CiGitSender\Tests\Unit;

use ArtARTs36\CiGitSender\Commit\Message;
use ArtARTs36\CiGitSender\Tests\TestCase;

final class MessageTest extends TestCase
{
    public function providerForTestRender(): array
    {
        return [
            [
                'Message',
                [],
                'Message',
            ],
            [
                'Author {$AUTHOR}',
                ['AUTHOR' => 'Artem'],
                'Author Artem',
            ],
        ];
    }

    /**
     * @dataProvider providerForTestRender
     * @covers \ArtARTs36\CiGitSender\Commit\Message::__construct
     * @covers \ArtARTs36\CiGitSender\Commit\Message::render
     * @covers \ArtARTs36\CiGitSender\Commit\Message::addTags
     * @covers \ArtARTs36\CiGitSender\Commit\Message::addTag
     */
    public function testRender(string $input, array $tags, string $expected): void
    {
        $message = new Message($input);

        self::assertEquals($expected, $message->addTags($tags)->render());
    }
}
