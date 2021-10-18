<?php

namespace Torunar\WebSequenceDiagrams\Presentation\Activity;

use Stringable;
use Torunar\WebSequenceDiagrams\Uml\Activity\Destroy;

class DestroyPresentation implements Stringable
{
    protected Destroy $activity;

    public function __construct(Destroy $activity)
    {
        $this->activity = $activity;
    }

    public function __toString(): string
    {
        return 'destroy ' . $this->activity->getParticipant()->getAlias();
    }
}
