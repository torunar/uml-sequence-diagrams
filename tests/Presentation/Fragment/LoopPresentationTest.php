<?php

namespace Tests\Torunar\WebSequenceDiagrams\Presentation\Fragment;

use PHPUnit\Framework\TestCase;
use Torunar\WebSequenceDiagrams\Presentation\Fragment\LoopPresentation;
use Torunar\WebSequenceDiagrams\Uml\Fragment\Loop;
use Torunar\WebSequenceDiagrams\Uml\Fragment\Opt;
use Torunar\WebSequenceDiagrams\Uml\Message\SyncRequest;
use Torunar\WebSequenceDiagrams\Uml\Role\Actor;
use Torunar\WebSequenceDiagrams\Uml\Role\Participant;

class LoopPresentationTest extends TestCase
{
    public function testSimple()
    {
        $a1 = new Actor('A1');
        $a1Id = md5('A1');
        $p2 = new Participant('P2');
        $p2Id = md5('P2');

        $fragment = new Loop('1000 times', [
            new SyncRequest($a1, $p2, '#1'),
            new SyncRequest($p2, $a1, '#2'),
        ]);

        $this->assertEquals(
            <<<UML
            loop 1000 times
            {$a1Id} -> {$p2Id}: #1
            {$p2Id} -> {$a1Id}: #2
            end
            UML,
            (string) (new LoopPresentation($fragment))
        );
    }

    public function testNested()
    {
        $a1 = new Actor('A1');
        $a1Id = md5('A1');
        $p2 = new Participant('P2');
        $p2Id = md5('P2');

        $fragment = new Loop('1000 times', [
            new SyncRequest($a1, $p2, '#1'),
            new Opt('condition', [
                new SyncRequest($p2, $a1, '#2'),
            ]),
        ]);

        $this->assertEquals(
            <<<UML
            loop [1000 times]
            {$a1Id} -> {$p2Id}: #1
            opt [condition]
            {$p2Id} -> {$a1Id}: #2
            end
            end
            UML,
            (string) (new LoopPresentation($fragment))
        );
    }
}
