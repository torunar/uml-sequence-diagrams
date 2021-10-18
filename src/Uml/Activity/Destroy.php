<?php

namespace Torunar\WebSequenceDiagrams\Uml\Activity;

use Torunar\WebSequenceDiagrams\Uml\Role\Participant;

class Destroy
{
    protected Participant $participant;

    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }

    public function getParticipant(): Participant
    {
        return $this->participant;
    }
}
