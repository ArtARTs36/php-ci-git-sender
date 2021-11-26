# Ci Git Sender

![PHP Composer](https://github.com/ArtARTs36/php-ci-git-sender/workflows/PHP%20Composer/badge.svg?branch=master)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
<a href="https://poser.pugx.org/artarts36/ci-git-sender/d/total.svg">
<img src="https://poser.pugx.org/artarts36/ci-git-sender/d/total.svg" alt="Total Downloads">
</a>

This is an auxiliary PHP package for sending commits during the CI pipelines.

## Installation

Run: `composer require artarts36/ci-git-sender`

## Example

```php
$sender = \ArtARTs36\CiGitSender\Sender\Factory\SenderFactory::local()
->create(__DIR__, new \ArtARTs36\CiGitSender\Remote\Credentials('my-login', 'my-token'));

$sender->send('readme.md', new \ArtARTs36\CiGitSender\Commit\Message('My file to {$BRANCH}'));
```
