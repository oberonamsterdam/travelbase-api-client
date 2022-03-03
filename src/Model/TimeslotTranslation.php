<?php

namespace Oberon\TravelbaseClient\Model;

class TimeslotTranslation extends Translation implements InputInterface
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
