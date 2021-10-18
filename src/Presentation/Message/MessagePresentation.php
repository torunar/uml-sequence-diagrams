<?php

namespace Torunar\WebSequenceDiagrams\Presentation\Message;

use Stringable;
use Torunar\WebSequenceDiagrams\Uml\Message\Message;

class MessagePresentation implements Stringable
{
    private Message $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function __toString(): string
    {
        $presentation = $this->message->getSender()->getAlias();

        $presentation .= $this->message->isReply()
            ? ' --'
            : ' -';
        $presentation .= $this->message->isSynchronous()
            ? '> '
            : '>> ';

        $presentation .= $this->message->getReceiver()->getAlias();
        $presentation .= ': ';
        $presentation .= str_replace(PHP_EOL, '\n', $this->message->getDescription());

        return $presentation;
    }
}
