<?php

/**
 * MisFunciones class
 * 
 * Clase MisFunciones  Desarrollo Web en Entorno Servidor Tema 6: Servicios web Ejemplo: Documentación 
 * para generación automática del documento WSDL 
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class MisFunciones extends SoapClient
{

    private static $classmap = array(
                                   );

    public function MisFunciones($wsdl = "http://localhost/dwes18/distancia/E7/version_2/web2/funcioneswdls.wdls", $options = array())
    {
        foreach(self::$classmap as $key => $value) {
            if(!isset($options['classmap'][$key])) {
                $options['classmap'][$key] = $value;
            }
        }
        parent::__construct($wsdl, $options);
    }

    /**
     * Devuelve el nombre del modulo 
     *
     * @param  string $cod
     * @return stringArray
     */
    public function saberNombre($cod)
    {
        return $this->__soapCall(
            'saberNombre', array($cod),       array(
            'uri' => 'http://localhost/dwes18/distancia/E7/version_2/web2/',
            'soapaction' => ''
            )
        );
    }

    /**
     * Devuelve alumnos matriculados en un ciclo concreto 
     *
     * @param  string $codCiclo
     * @return stringArray
     */
    public function matriculadosCiclo($codCiclo)
    {
        return $this->__soapCall(
            'matriculadosCiclo', array($codCiclo),       array(
            'uri' => 'http://localhost/dwes18/distancia/E7/version_2/web2/',
            'soapaction' => ''
            )
        );
    }

    /**
     * Devuelve el nombre y en cuantos modulos esta matriculado el  alumno 
     *
     * @param  
     * @return stringArray
     */
    public function modulosCompletos()
    {
        return $this->__soapCall(
            'modulosCompletos', array(),       array(
            'uri' => 'http://localhost/dwes18/distancia/E7/version_2/web2/',
            'soapaction' => ''
            )
        );
    }

}

?>
