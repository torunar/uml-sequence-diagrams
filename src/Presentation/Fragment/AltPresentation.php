<?php

namespace Torunar\WebSequenceDiagrams\Presentation\Fragment;

use Stringable;
use Torunar\WebSequenceDiagrams\Presentation\PresentationFactory;
use Torunar\WebSequenceDiagrams\Uml\Fragment\Alt;

class AltPresentation implements Stringable
{
    private Alt $fragment;

    public function __construct(Alt $fragment)
    {
        $this->fragment = $fragment;
    }

    public function __toString(): string
    {
        $presentation = [
            "alt {$this->fragment->getMainOutcome()->getMessage()}",
        ];

        foreach ($this->fragment->getMainOutcome()->getItems() as $item) {
            $presentation[] = PresentationFactory::getPresentation($item);
        }

        foreach ($this->fragment->getAlternatives() as $branch) {
            $presentation[] = 'else' . ($branch->getMessage() === '' ? '' : " {$branch->getMessage()}");
            foreach ($branch->getItems() as $item) {
                $presentation[] = PresentationFactory::getPresentation($item);
            }
        }

        $presentation[] = 'end';

        return implode(PHP_EOL, $presentation);
    }
}
