<?php

namespace Torunar\WebSequenceDiagrams\Uml\Message;

use Torunar\WebSequenceDiagrams\Uml\Role\Participant;

abstract class Message
{
    protected Participant $sender;

    protected Participant $receiver;

    protected string $description;

    protected bool $isReply;

    protected bool $isSynchronous;

    public function __construct(Participant $sender, Participant $receiver, string $description)
    {
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->description = $description;
    }

    public function getSender(): Participant
    {
        return $this->sender;
    }

    public function getReceiver(): Participant
    {
        return $this->receiver;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function isReply(): bool
    {
        return $this->isReply;
    }

    public function isSynchronous(): bool
    {
        return $this->isSynchronous;
    }
}
