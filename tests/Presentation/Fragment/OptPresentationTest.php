<?php

namespace Tests\Torunar\WebSequenceDiagrams\Presentation\Fragment;

use PHPUnit\Framework\TestCase;
use Torunar\WebSequenceDiagrams\Presentation\Fragment\OptPresentation;
use Torunar\WebSequenceDiagrams\Uml\Fragment\Opt;
use Torunar\WebSequenceDiagrams\Uml\Message\SyncRequest;
use Torunar\WebSequenceDiagrams\Uml\Role\Actor;
use Torunar\WebSequenceDiagrams\Uml\Role\Participant;

class OptPresentationTest extends TestCase
{
    public function testSimple()
    {
        $a1 = new Actor('A1');
        $a1Id = md5('A1');
        $p2 = new Participant('P2');
        $p2Id = md5('P2');

        $fragment = new Opt('condition', [
            new SyncRequest($a1, $p2, '#1'),
            new SyncRequest($p2, $a1, '#2'),
        ]);

        $this->assertEquals(
            <<<UML
            opt condition
            {$a1Id} -> {$p2Id}: #1
            {$p2Id} -> {$a1Id}: #2
            end
            UML,
            (string) (new OptPresentation($fragment))
        );
    }

    public function testNested()
    {
        $a1 = new Actor('A1');
        $a1Id = md5('A1');
        $p2 = new Participant('P2');
        $p2Id = md5('P2');

        $fragment = new Opt('condition', [
            new SyncRequest($a1, $p2, '#1'),
            new Opt('subcondition', [
                new SyncRequest($p2, $a1, '#2'),
            ]),
        ]);

        $this->assertEquals(
            <<<UML
            opt condition
            {$a1Id} -> {$p2Id}: #1
            opt subcondition
            {$p2Id} -> {$a1Id}: #2
            end
            end
            UML,
            (string) (new OptPresentation($fragment))
        );
    }
}
