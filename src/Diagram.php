<?php

namespace Torunar\WebSequenceDiagrams;

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

class Diagram
{
    /**
     * @var array<string, Participant>
     */
    private array $roles = [];

    /**
     * @var array<Message|Opt|Loop|Alt|NoteLeftOf|NoteRightOf|NoteOver|Activate|Deactivate|Destroy>
     */
    private array $items = [];

    public function addRole(Participant $role)
    {
        $this->roles[$role->getAlias()] = $role;
    }

    /**
     * @return array<string, Participant>
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array<Participant> $roles
     */
    public function setRoles(array $roles)
    {
        $this->roles = [];
        foreach ($roles as $role) {
            $this->addRole($role);
        }
    }

    /**
     * @param Activate|Alt|Deactivate|Destroy|Loop|Message|NoteLeftOf|NoteOver|NoteRightOf|Opt $item
     */
    public function addItem(Deactivate|NoteOver|Destroy|Activate|Opt|Loop|NoteRightOf|Alt|Message|NoteLeftOf $item)
    {
        $this->items[] = $item;
    }

    /**
     * @param array<Message|Opt|Loop|Alt|NoteLeftOf|NoteRightOf|NoteOver|Activate|Deactivate|Destroy> $items
     */
    public function addItems(array $items)
    {
        foreach ($items as $item) {
            $this->addItem($item);
        }
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function __construct(...$items)
    {
        foreach ($items as $item) {
            if ($item instanceof Participant) {
                $this->addRole($item);
                continue;
            }

            /** @var Message|Opt|Loop|Alt|NoteLeftOf|NoteRightOf|NoteOver|Activate|Deactivate|Destroy $item */
            $this->addItem($item);
        }
    }
}
