<?php

namespace Oberon\TravelbaseClient\Model;

class Activity
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var ActivityRateGroup[]
     */
    private $activityRateGroups = [];

    /**
     * Activity constructor.
     * @param string $id
     * @param string|null $name
     * @param ActivityRateGroup[] activityRateGroups
     */
    public function __construct(
        string $id,
        ?string $name,
        array $activityRateGroups
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->activityRateGroups = $activityRateGroups;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return ActivityRateGroup[]
     */
    public function getActivityRateGroups(): array
    {
        return $this->activityRateGroups;
    }

    /**
     * @param ActivityRateGroup $activityRateGroup
     * @return $this
     */
    private function addActivityRateGroup(ActivityRateGroup $activityRateGroup): self
    {
        $this->activityRateGroups[] = $activityRateGroup;

        return $this;
    }
}
