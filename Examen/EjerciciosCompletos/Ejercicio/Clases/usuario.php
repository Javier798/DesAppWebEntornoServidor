<?php

namespace Clases;

class Usuario
{
    private $usuario;
    private $contraseña;
    private $data = array();

    public function __construct()
    {
    }

    public function __set($name, $value)
    {
        echo "Estableciendo '$name' a '$value'\n";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        echo "Consultando '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Propiedad indefinida mediante __get(): ' . $name .
                ' en ' . $trace[0]['file'] .
                ' en la línea ' . $trace[0]['line'],
            E_USER_NOTICE
        );
        return null;
    }
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
