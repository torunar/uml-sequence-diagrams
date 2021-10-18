<?php

namespace Torunar\WebSequenceDiagrams\Presentation\Activity;

use Stringable;
use Torunar\WebSequenceDiagrams\Uml\Activity\Deactivate;

class DeactivatePresentation implements Stringable
{
    protected Deactivate $activity;

    public function __construct(Deactivate $activity)
    {
        $this->activity = $activity;
    }

    public function __toString(): string
    {
        return 'deactivate ' . $this->activity->getParticipant()->getAlias();
    }
}
