<?php

namespace Tests\Torunar\WebSequenceDiagrams\Presentation\Activity;

use PHPUnit\Framework\TestCase;
use Torunar\WebSequenceDiagrams\Presentation\Activity\ActivatePresentation;
use Torunar\WebSequenceDiagrams\Uml\Activity\Activate;
use Torunar\WebSequenceDiagrams\Uml\Role\Actor;

class ActivatePresentationTest extends TestCase
{
    public function testGeneral()
    {
        $actor = new Actor('A1');
        $id = md5('A1');

        $activity = new Activate($actor);
        $this->assertEquals(
            <<<UML
            activate {$id}
            UML,
            (string) new ActivatePresentation($activity)
        );
    }
}
