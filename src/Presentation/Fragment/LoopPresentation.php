<?php

namespace Torunar\WebSequenceDiagrams\Presentation\Fragment;

use Stringable;
use Torunar\WebSequenceDiagrams\Presentation\PresentationFactory;
use Torunar\WebSequenceDiagrams\Uml\Fragment\Loop;

class LoopPresentation implements Stringable
{
    private Loop $fragment;

    public function __construct(Loop $fragment)
    {
        $this->fragment = $fragment;
    }

    public function __toString(): string
    {
        $presentation = [
            "loop {$this->fragment->getCondition()}",
        ];

        foreach ($this->fragment->getItems() as $item) {
            $presentation[] = PresentationFactory::getPresentation($item);
        }

        $presentation[] = 'end';

        return implode(PHP_EOL, $presentation);
    }
}
