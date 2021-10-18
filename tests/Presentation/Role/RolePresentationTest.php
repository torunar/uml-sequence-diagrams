<?php

namespace Tests\Torunar\WebSequenceDiagrams\Presentation\Role;

use PHPUnit\Framework\TestCase;
use Torunar\WebSequenceDiagrams\Presentation\Role\RolePresentation;
use Torunar\WebSequenceDiagrams\Uml\Role\Actor;
use Torunar\WebSequenceDiagrams\Uml\Role\Participant;

class RolePresentationTest extends TestCase
{
    public function testActor()
    {
        $this->assertEquals(
            'actor Actor as ' . md5('Actor'),
            (string) new RolePresentation(new Actor('Actor'))
        );
    }

    public function testParticipant()
    {
        $this->assertEquals(
            'participant Participant as ' . md5('Participant'),
            (string) new RolePresentation(new Participant('Participant'))
        );
    }
}
