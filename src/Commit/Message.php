<?php

namespace ArtARTs36\CiGitSender\Commit;

use ArtARTs36\Str\Facade\Str;

class Message
{
    /** @var array<string, string> */
    protected array $tags = [];

    public function __construct(protected string $message)
    {
        //
    }

    public function render(): string
    {
        return Str::replace($this->message, $this->tags);
    }

    public function addTags(array $tags): self
    {
        foreach ($tags as $key => $value) {
            $this->addTag($key, $value);
        }

        return $this;
    }

    public function addTag(string $key, string $value): self
    {
        $this->tags['{$'. $key . '}'] = $value;

        return $this;
    }
}
