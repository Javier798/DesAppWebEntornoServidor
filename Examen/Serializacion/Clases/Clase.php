<?php

namespace Clases;

class Clase
{
    private $usuario;
    private $contraseña;
    /**
     * Get the value of usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get the value of contraseña
     */
    public function getContraseña()
    {
        return $this->contraseña;
    }

    /**
     * Set the value of contraseña
     *
     * @return  self
     */
    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;

        return $this;
    }
}
