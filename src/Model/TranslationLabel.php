<?php

namespace Oberon\TravelbaseClient\Model;

class TranslationLabel
{
    /**
     * Required attribute
     * @var string
     */
    private $locale;

    /**
     * Required attribute
     * @var string
     */
    private $label;

    /**
     * Translation constructor.
     * @param string $locale --- Required
     * @param string $label --- Required
     */
    public function __construct(
        string $locale,
        string $label
    ) {
        $this->locale = $locale;
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     * @return $this
     */
    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return $this
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }
}
