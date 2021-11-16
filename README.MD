# Ci Git Sender

This is an auxiliary PHP package for sending commits during the CI pipelines.

## Installation

Run: `artarts36/ci-git-sender`

## Example

```php
$sender = \ArtARTs36\CiGitSender\Sender\Factory\SenderFactory::local()
->create(__DIR__, new \ArtARTs36\CiGitSender\Remote\Credentials('my-login', 'my-token'));

$sender->send('readme.md', new \ArtARTs36\CiGitSender\Commit\Message('My file to {$BRANCH}'));
```
