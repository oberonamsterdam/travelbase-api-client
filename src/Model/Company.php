<?php

namespace Oberon\TravelbaseClient\Model;

class Company
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Activity[]
     */
    private $activities = [];

    /**
     * Company constructor.
     * @param string $id
     * @param string $name
     * @param Activity[] $activities
     */
    public function __construct(
        string $id,
        string $name,
        array $activities
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->activities = $activities;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Accommodation[]
     */
    public function getActivities(): array
    {
        return $this->activities;
    }

    /**
     * @param Activity $activity
     * @return $this
     */
    private function addActivity(Activity $activity): self
    {
        $this->activities[] = $activity;

        return $this;
    }
}
