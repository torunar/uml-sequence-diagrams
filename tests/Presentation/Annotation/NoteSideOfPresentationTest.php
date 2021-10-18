<?php

namespace Tests\Torunar\WebSequenceDiagrams\Presentation\Annotation;

use PHPUnit\Framework\TestCase;
use Torunar\WebSequenceDiagrams\Presentation\Annotation\NoteSideOfPresentation;
use Torunar\WebSequenceDiagrams\Uml\Annotation\NoteLeftOf;
use Torunar\WebSequenceDiagrams\Uml\Annotation\NoteRightOf;
use Torunar\WebSequenceDiagrams\Uml\Role\Actor;

class NoteSideOfPresentationTest extends TestCase
{
    public function testLeft()
    {
        $a = new Actor('A1');
        $aId = md5('A1');

        $note = new NoteLeftOf($a, 'left note');
        $this->assertEquals(
            <<<UML
            note left of {$aId}
            left note
            end note
            UML,
            (string) new NoteSideOfPresentation($note)
        );
    }

    public function testRight()
    {
        $a = new Actor('A1');
        $aId = md5('A1');

        $note = new NoteRightOf($a, 'right note');
        $this->assertEquals(
            <<<UML
            note right of {$aId}
            right note
            end note
            UML,
            (string) new NoteSideOfPresentation($note)
        );
    }
}
