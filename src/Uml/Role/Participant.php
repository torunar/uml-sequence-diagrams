<?php

namespace Torunar\WebSequenceDiagrams\Uml\Role;

class Participant
{
    private string $name;

    private string $alias;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->alias = $this->initAlias($name);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAlias(): string
    {
        return $this->alias;
    }

    private function initAlias(string $alias)
    {
        return md5($alias);
    }
}
