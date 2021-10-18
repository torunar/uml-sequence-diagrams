<?php

namespace Torunar\WebSequenceDiagrams\Uml\Message;

class AsyncReply extends Message
{
    protected bool $isSynchronous = false;

    protected bool $isReply = true;
}
