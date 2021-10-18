<?php

namespace Torunar\WebSequenceDiagrams\Presentation;

use Torunar\WebSequenceDiagrams\Presentation\Activity\ActivatePresentation;
use Torunar\WebSequenceDiagrams\Presentation\Activity\DeactivatePresentation;
use Torunar\WebSequenceDiagrams\Presentation\Activity\DestroyPresentation;
use Torunar\WebSequenceDiagrams\Presentation\Annotation\NoteOverPresentation;
use Torunar\WebSequenceDiagrams\Presentation\Annotation\NoteSideOfPresentation;
use Torunar\WebSequenceDiagrams\Presentation\Fragment\AltPresentation;
use Torunar\WebSequenceDiagrams\Presentation\Fragment\LoopPresentation;
use Torunar\WebSequenceDiagrams\Presentation\Fragment\OptPresentation;
use Torunar\WebSequenceDiagrams\Presentation\Message\MessagePresentation;
use Torunar\WebSequenceDiagrams\Presentation\Role\RolePresentation;
use Torunar\WebSequenceDiagrams\Uml\Activity\Activate;
use Torunar\WebSequenceDiagrams\Uml\Activity\Deactivate;
use Torunar\WebSequenceDiagrams\Uml\Activity\Destroy;
use Torunar\WebSequenceDiagrams\Uml\Annotation\NoteLeftOf;
use Torunar\WebSequenceDiagrams\Uml\Annotation\NoteOver;
use Torunar\WebSequenceDiagrams\Uml\Annotation\NoteRightOf;
use Torunar\WebSequenceDiagrams\Uml\Fragment\Alt;
use Torunar\WebSequenceDiagrams\Uml\Fragment\Loop;
use Torunar\WebSequenceDiagrams\Uml\Fragment\Opt;
use Torunar\WebSequenceDiagrams\Uml\Message\Message;
use Torunar\WebSequenceDiagrams\Uml\Role\Participant;

class PresentationFactory
{
    public static function getPresentation($item): string
    {
        if ($item instanceof Participant) {
            return (string) new RolePresentation($item);
        }
        if ($item instanceof Message) {
            return (string) new MessagePresentation($item);
        }
        if ($item instanceof Opt) {
            return (string) new OptPresentation($item);
        }
        if ($item instanceof Loop) {
            return (string) new LoopPresentation($item);
        }
        if ($item instanceof Alt) {
            return (string) new AltPresentation($item);
        }
        if ($item instanceof NoteLeftOf || $item instanceof NoteRightOf) {
            return (string) new NoteSideOfPresentation($item);
        }
        if ($item instanceof NoteOver) {
            return (string) new NoteOverPresentation($item);
        }
        if ($item instanceof Activate) {
            return (string) new ActivatePresentation($item);
        }
        if ($item instanceof Deactivate) {
            return (string) new DeactivatePresentation($item);
        }
        if ($item instanceof Destroy) {
            return (string) new DestroyPresentation($item);
        }

        return '';
    }
}
