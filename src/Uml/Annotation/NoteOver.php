<?php

namespace Torunar\WebSequenceDiagrams\Uml\Annotation;

class NoteOver
{
    /**
     * @var array<\Torunar\WebSequenceDiagrams\Uml\Role\Participant>
     */
    protected array $participants;

    protected string $message;

    public function __construct(array $participants, string $message)
    {
        $this->participants = $participants;
        $this->message = $message;
    }

    /**
     * @return \Torunar\WebSequenceDiagrams\Uml\Role\Participant[]
     */
    public function getParticipants(): array
    {
        return $this->participants;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}
