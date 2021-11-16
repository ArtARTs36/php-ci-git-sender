<?php

namespace ArtARTs36\CiGitSender\Tests\Unit;

use ArtARTs36\CiGitSender\Remote\Credentials;
use ArtARTs36\CiGitSender\Tests\TestCase;

final class CredentialsTest extends TestCase
{
    /**
     * @covers \ArtARTs36\CiGitSender\Remote\Credentials::__construct
     * @covers \ArtARTs36\CiGitSender\Remote\Credentials::fromArray
     */
    public function testFromArray(): void
    {
        $credentials = [
            'login' => 'artarts36',
            'token' => 'my-token',
        ];

        self::assertEquals($credentials, Credentials::fromArray($credentials)->toArray());
    }
}
