<?php

namespace Tests\Torunar\WebSequenceDiagrams\Presentation\Activity;

use PHPUnit\Framework\TestCase;
use Torunar\WebSequenceDiagrams\Presentation\Activity\DestroyPresentation;
use Torunar\WebSequenceDiagrams\Uml\Activity\Destroy;
use Torunar\WebSequenceDiagrams\Uml\Role\Actor;

class DestroyPresentationTest extends TestCase
{
    public function testGeneral()
    {
        $actor = new Actor('A1');
        $id = md5('A1');

        $activity = new Destroy($actor);
        $this->assertEquals(
            <<<UML
            destroy {$id}
            UML,
            (string) new DestroyPresentation($activity)
        );
    }
}
