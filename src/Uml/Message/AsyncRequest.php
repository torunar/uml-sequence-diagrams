<?php

namespace Torunar\WebSequenceDiagrams\Uml\Message;

class AsyncRequest extends Message
{
    protected bool $isSynchronous = false;

    protected bool $isReply = false;
}
