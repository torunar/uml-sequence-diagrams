<?php

use Torunar\WebSequenceDiagrams\Api\Service;
use Torunar\WebSequenceDiagrams\Diagram;
use Torunar\WebSequenceDiagrams\Uml\Fragment\Opt;
use Torunar\WebSequenceDiagrams\Uml\Message\AsyncReply;
use Torunar\WebSequenceDiagrams\Uml\Message\SyncRequest;
use Torunar\WebSequenceDiagrams\Uml\Role\Actor;
use Torunar\WebSequenceDiagrams\Uml\Role\Participant;

require_once __DIR__ . '/../vendor/autoload.php';

$payer = new Actor('Payer');
$gateway = new Participant('Payment gateway');

$sequence = new Diagram(
    $payer,
    $gateway,
    new SyncRequest($payer, $gateway, 'Transfer funds'),
    new SyncRequest($gateway, $payer, 'Redirect to online store'),
    new SyncRequest($gateway, $gateway, 'Process transaction'),
    new AsyncReply($gateway, $payer, 'Send payment notification'),
    new Opt('payment declined by bank', [
        new AsyncReply($gateway, $payer, 'Send decline notification'),
    ])
);

$imgUrl = (new Service())->render($sequence);
echo $imgUrl . PHP_EOL;
exit(0);
