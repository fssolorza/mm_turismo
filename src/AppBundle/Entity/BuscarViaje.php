<?php

namespace AppBundle\Entity;


class BuscarViaje
{

    /**
     * @var Viaje
     */
    private $viaje;
    

    /**
     * Set viaje
     *
     * @param Viaje $viaje
     *
     */
    public function setViaje($viaje)
    {
        $this->viaje = $viaje;

        return $this;
    }

    /**
     * Get viaje
     *
     * @return Viaje
     */
    public function getViaje()
    {
        return $this->viaje;
    }


    public function __toString()
    {
        return $this->getViaje()->__toString();
    }
}

