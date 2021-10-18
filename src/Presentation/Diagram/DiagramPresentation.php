<?php

namespace Torunar\WebSequenceDiagrams\Presentation\Diagram;

use Stringable;
use Torunar\WebSequenceDiagrams\Diagram;
use Torunar\WebSequenceDiagrams\Presentation\PresentationFactory;

class DiagramPresentation implements Stringable
{
    private Diagram $diagram;

    public function __construct(Diagram $diagram)
    {
        $this->diagram = $diagram;
    }

    public function __toString(): string
    {
        $presentation = [];
        foreach ($this->diagram->getRoles() as $item) {
            $presentation[] = PresentationFactory::getPresentation($item);
        }
        foreach ($this->diagram->getItems() as $item) {
            $presentation[] = PresentationFactory::getPresentation($item);
        }

        return implode(PHP_EOL, $presentation);
    }
}
