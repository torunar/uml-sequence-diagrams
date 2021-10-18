<?php

namespace Torunar\WebSequenceDiagrams\Uml\Message;

class SyncRequest extends Message
{
    protected bool $isSynchronous = true;

    protected bool $isReply = false;
}
