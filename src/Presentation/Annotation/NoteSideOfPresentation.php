<?php

namespace Torunar\WebSequenceDiagrams\Presentation\Annotation;

use Stringable;
use Torunar\WebSequenceDiagrams\Uml\Annotation\NoteLeftOf;
use Torunar\WebSequenceDiagrams\Uml\Annotation\NoteRightOf;

class NoteSideOfPresentation implements Stringable
{
    protected NoteLeftOf|NoteRightOf $note;

    /**
     * @param \Torunar\WebSequenceDiagrams\Uml\Annotation\NoteRightOf|\Torunar\WebSequenceDiagrams\Uml\Annotation\NoteLeftOf $note
     */
    public function __construct(
        NoteRightOf|NoteLeftOf $note
    ) {

        $this->note = $note;
    }

    public function __toString(): string
    {
        $presentation = [
            'note ' . ($this->note instanceof NoteLeftOf ? 'left' : 'right') . ' of ' . $this->note->getParticipant()->getAlias(),
        ];

        $presentation[] = str_replace("\n", '\n', $this->note->getMessage());

        $presentation[] = 'end note';

        return implode(PHP_EOL, $presentation);
    }
}
