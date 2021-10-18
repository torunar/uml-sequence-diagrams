<?php

namespace Tests\Torunar\WebSequenceDiagrams\Presentation\Diagram;

use PHPUnit\Framework\TestCase;
use Torunar\WebSequenceDiagrams\Diagram;
use Torunar\WebSequenceDiagrams\Presentation\Diagram\DiagramPresentation;
use Torunar\WebSequenceDiagrams\Uml\Message\AsyncReply;
use Torunar\WebSequenceDiagrams\Uml\Message\AsyncRequest;
use Torunar\WebSequenceDiagrams\Uml\Message\SyncRequest;
use Torunar\WebSequenceDiagrams\Uml\Role\Actor;
use Torunar\WebSequenceDiagrams\Uml\Role\Participant;

class DiagramPresentationTest extends TestCase
{
    public function testGeneral()
    {
        $a1 = new Actor('A1');
        $a1Id = md5('A1');
        $p2 = new Participant('P2');
        $p2Id = md5('P2');

        $sequence = new Diagram();
        $sequence->setRoles([$a1, $p2]);
        $sequence->addItems([
            new SyncRequest($a1, $p2, '#1'),
            new AsyncRequest($a1, $p2, '#2'),
            new AsyncReply($p2, $a1, '#3'),
            new SyncRequest($a1, $p2, "Multi\nline\ndescription"),
        ]);

        $this->assertEquals(
            <<<UML
            actor A1 as {$a1Id}
            participant P2 as {$p2Id}
            {$a1Id} -> {$p2Id}: #1
            {$a1Id} ->> {$p2Id}: #2
            {$p2Id} -->> {$a1Id}: #3
            {$a1Id} -> {$p2Id}: Multi\\nline\\ndescription
            UML,
            (string) new DiagramPresentation($sequence)
        );
    }
}
