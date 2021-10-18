<?php

namespace Torunar\WebSequenceDiagrams\Presentation\Activity;

use Stringable;
use Torunar\WebSequenceDiagrams\Uml\Activity\Activate;

class ActivatePresentation implements Stringable
{
    protected Activate $activity;

    public function __construct(Activate $activity)
    {
        $this->activity = $activity;
    }

    public function __toString(): string
    {
        return 'activate ' . $this->activity->getParticipant()->getAlias();
    }
}
