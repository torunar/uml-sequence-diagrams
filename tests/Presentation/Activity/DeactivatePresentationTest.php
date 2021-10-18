<?php

namespace Tests\Torunar\WebSequenceDiagrams\Presentation\Activity;

use PHPUnit\Framework\TestCase;
use Torunar\WebSequenceDiagrams\Presentation\Activity\DeactivatePresentation;
use Torunar\WebSequenceDiagrams\Uml\Activity\Deactivate;
use Torunar\WebSequenceDiagrams\Uml\Role\Actor;

class DeactivatePresentationTest extends TestCase
{
    public function testGeneral()
    {
        $actor = new Actor('A1');
        $id = md5('A1');

        $activity = new Deactivate($actor);
        $this->assertEquals(
            <<<UML
            deactivate {$id}
            UML,
            (string) new DeactivatePresentation($activity)
        );
    }
}
