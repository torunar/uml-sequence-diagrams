<?php

namespace Torunar\WebSequenceDiagrams\Presentation\Role;

use Stringable;
use Torunar\WebSequenceDiagrams\Uml\Role\Actor;
use Torunar\WebSequenceDiagrams\Uml\Role\Participant;

class RolePresentation implements Stringable
{
    private Participant $role;

    public function __construct(Participant $role)
    {
        $this->role = $role;
    }

    public function __toString(): string
    {
        return match ($this->role::class) {
            Actor::class => "actor {$this->role->getName()} as {$this->role->getAlias()}",
            Participant::class => "participant {$this->role->getName()} as {$this->role->getAlias()}"
        };
    }
}
