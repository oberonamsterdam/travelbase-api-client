<?php

namespace Oberon\TravelbaseClient\Model;

class TimeslotTranslationLabel extends TranslationLabel implements InputInterface
{

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'label' => $this->getLabel(),
            'locale' => $this->getLocale()
        ];
    }
}
