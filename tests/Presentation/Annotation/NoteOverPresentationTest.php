<?php

namespace Tests\Torunar\WebSequenceDiagrams\Presentation\Annotation;

use PHPUnit\Framework\TestCase;
use Torunar\WebSequenceDiagrams\Presentation\Annotation\NoteOverPresentation;
use Torunar\WebSequenceDiagrams\Uml\Annotation\NoteOver;
use Torunar\WebSequenceDiagrams\Uml\Role\Actor;

class NoteOverPresentationTest extends TestCase
{
    public function testSingle()
    {
        $a = new Actor('A1');
        $aId = md5('A1');

        $note = new NoteOver([$a], 'over note');
        $this->assertEquals(
            <<<UML
            note over {$aId}
            over note
            end note
            UML,
            (string) new NoteOverPresentation($note)
        );
    }

    public function testMultiple()
    {
        $a1 = new Actor('A1');
        $a1Id = md5('A1');
        $a2 = new Actor('A2');
        $a2Id = md5('A2');

        $note = new NoteOver([$a1, $a2], 'over note');
        $this->assertEquals(
            <<<UML
            note over {$a1Id}, {$a2Id}
            over note
            end note
            UML,
            (string) new NoteOverPresentation($note)
        );
    }
}
