<?php

namespace Torunar\WebSequenceDiagrams\Uml\Fragment;

class Alt
{
    protected Opt $mainOutcome;

    /**
     * @var array<\Torunar\WebSequenceDiagrams\Uml\Fragment\Opt>
     */
    protected array $alternatives;

    public function __construct(Opt $mainOutcome, array $alternatives)
    {
        $this->mainOutcome = $mainOutcome;
        $this->alternatives = $alternatives;
    }

    public function getMainOutcome(): Opt
    {
        return $this->mainOutcome;
    }

    /**
     * @return \Torunar\WebSequenceDiagrams\Uml\Fragment\Opt[]
     */
    public function getAlternatives(): array
    {
        return $this->alternatives;
    }
}
