<?php

namespace Tests\Torunar\WebSequenceDiagrams\Presentation\Message;

use PHPUnit\Framework\TestCase;
use Torunar\WebSequenceDiagrams\Presentation\Message\MessagePresentation;
use Torunar\WebSequenceDiagrams\Uml\Message\AsyncReply;
use Torunar\WebSequenceDiagrams\Uml\Message\AsyncRequest;
use Torunar\WebSequenceDiagrams\Uml\Message\SyncRequest;
use Torunar\WebSequenceDiagrams\Uml\Role\Actor;

class MessagePresentationTest extends TestCase
{
    public function testSyncRequest()
    {
        $a1 = new Actor('A1');
        $a1Id = md5('A1');
        $a2 = new Actor('A2');
        $a2Id = md5('A2');

        $this->assertEquals(
            "{$a1Id} -> {$a2Id}: #1",
            (string) new MessagePresentation(new SyncRequest($a1, $a2, '#1'))
        );
    }

    public function testAsyncRequest()
    {
        $a1 = new Actor('A1');
        $a1Id = md5('A1');
        $a2 = new Actor('A2');
        $a2Id = md5('A2');

        $this->assertEquals(
            "{$a1Id} ->> {$a2Id}: #2",
            (string) new MessagePresentation(new AsyncRequest($a1, $a2, '#2'))
        );
    }

    public function testAsyncReply()
    {
        $a1 = new Actor('A1');
        $a1Id = md5('A1');
        $a2 = new Actor('A2');
        $a2Id = md5('A2');

        $this->assertEquals(
            "{$a2Id} -->> {$a1Id}: #3",
            (string) new MessagePresentation(new AsyncReply($a2, $a1, '#3'))
        );
    }

    public function testMultilineDescription()
    {
        $a1 = new Actor('A1');
        $a1Id = md5('A1');
        $a2 = new Actor('A2');
        $a2Id = md5('A2');

        $this->assertEquals(
            "{$a1Id} -> {$a2Id}: " . 'Multi\nline\ndescription',
            (string) new MessagePresentation(new SyncRequest($a1, $a2, "Multi\nline\ndescription"))
        );
    }
}
