<?php

namespace Tests\Torunar\WebSequenceDiagrams\Presentation\Fragment;

use PHPUnit\Framework\TestCase;
use Torunar\WebSequenceDiagrams\Presentation\Fragment\AltPresentation;
use Torunar\WebSequenceDiagrams\Uml\Fragment\Alt;
use Torunar\WebSequenceDiagrams\Uml\Fragment\Opt;
use Torunar\WebSequenceDiagrams\Uml\Message\SyncRequest;
use Torunar\WebSequenceDiagrams\Uml\Role\Actor;
use Torunar\WebSequenceDiagrams\Uml\Role\Participant;

class AltPresentationTest extends TestCase
{
    public function testSimple()
    {
        $a1 = new Actor('A1');
        $a1Id = md5('A1');
        $p2 = new Participant('P2');
        $p2Id = md5('P2');

        $fragment = new Alt(
            new Opt('if', [
                new SyncRequest($a1, $p2, '#1'),
            ]),
            [
                new Opt('else1', [
                    new SyncRequest($a1, $p2, '#2'),
                    new SyncRequest($p2, $a1, '#3'),
                ]),
                new Opt('', [
                    new SyncRequest($a1, $p2, '#4'),
                    new SyncRequest($p2, $a1, '#5'),
                ]),
            ]
        );

        $this->assertEquals(
            <<<UML
            alt if
            {$a1Id} -> {$p2Id}: #1
            else else1
            {$a1Id} -> {$p2Id}: #2
            {$p2Id} -> {$a1Id}: #3
            else
            {$a1Id} -> {$p2Id}: #4
            {$p2Id} -> {$a1Id}: #5
            end
            UML,
            (string) (new AltPresentation($fragment))
        );
    }
}
