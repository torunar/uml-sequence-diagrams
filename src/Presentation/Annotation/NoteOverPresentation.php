<?php

namespace Torunar\WebSequenceDiagrams\Presentation\Annotation;

use Stringable;
use Torunar\WebSequenceDiagrams\Uml\Annotation\NoteOver;
use Torunar\WebSequenceDiagrams\Uml\Role\Participant;

class NoteOverPresentation implements Stringable
{
    /**
     * @var \Torunar\WebSequenceDiagrams\Uml\Annotation\NoteOver
     */
    private NoteOver $note;

    public function __construct(NoteOver $note)
    {
        $this->note = $note;
    }

    public function __toString(): string
    {
        $presentation = [
            'note over ' . implode(
                ', ',
                array_map(static function (Participant $participant) {
                    return $participant->getAlias();
                }, $this->note->getParticipants())
            ),
        ];

        $presentation[] = str_replace("\n", '\n', $this->note->getMessage());

        $presentation[] = 'end note';

        return implode(PHP_EOL, $presentation);
    }
}
