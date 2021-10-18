<?php

namespace Torunar\WebSequenceDiagrams\Presentation\Fragment;

use Stringable;
use Torunar\WebSequenceDiagrams\Presentation\PresentationFactory;
use Torunar\WebSequenceDiagrams\Uml\Fragment\Opt;

class OptPresentation implements Stringable
{
    private Opt $fragment;

    public function __construct(Opt $fragment)
    {
        $this->fragment = $fragment;
    }

    public function __toString(): string
    {
        $presentation = [
            "opt {$this->fragment->getMessage()}",
        ];

        foreach ($this->fragment->getItems() as $item) {
            $presentation[] = PresentationFactory::getPresentation($item);
        }

        $presentation[] = 'end';

        return implode(PHP_EOL, $presentation);
    }
}
