<?php

namespace Oberon\TravelbaseClient\Model;

class Translation
{
    public const LOCALE_NL = 'nl';
    public const LOCALE_DE = 'de';
    public const LOCALE_EN = 'en';

    /**
     * @var string|null
     */
    private $locale;

    /**
     * @var string|null
     */
    private $label;

    /**
     * Translation constructor.
     * @param string|null $locale
     * @param string|null $label
     */
    public function __construct(
        ?string $locale = null,
        ?string $label = null
    ) {
        $this->locale = $locale;
        $this->label = $label;
    }

    /**
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @param string|null $locale
     * @return $this
     */
    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string|null $label
     * @return $this
     */
    public function setLabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }
}
