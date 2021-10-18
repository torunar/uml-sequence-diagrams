<?php

namespace Torunar\WebSequenceDiagrams\Uml\Annotation;

use Torunar\WebSequenceDiagrams\Uml\Role\Participant;

class NoteRightOf
{
    protected Participant $participant;

    protected string $message;

    public function __construct(Participant $participant, string $message)
    {
        $this->participant = $participant;
        $this->message = $message;
    }

    public function getParticipant(): Participant
    {
        return $this->participant;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}
