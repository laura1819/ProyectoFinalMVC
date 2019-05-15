<?php

/**
 * Archivo Departamento.php
 * 
 * negocio, crea departamentos y altera su estado
 *
 * @package modelo
 */
require_once 'DepartamentoPDO.php';

/**
 * Class Departamento
 * 
 * Clase que crea, borra, modifica y valida departamentos
 * 
 * @author Laura Fernandez
 */
Class Departamento {

    /**
     * @var string $codDepartamento código del departamento
     */
    private $T02_CodDepartamento;

    /**
     * @var string $descDepartamento descripción del departamento
     */
    private $T02_DescDepartamento;

    /**
     * @var int $fechaCreacionDepartamento marca de tiempo de la creación del departamento 
     */
    private $T02_FechaCreacionDepartamento;

    /**
     * @var int $volumenDeNegocio ingresos del departamento 
     */
    private $T02_VolumenDeNegocio;

    /**
     * @var int $fechaBajaDepartamento marca de tiempo de la baja del departamento
     */
    private $T02_FechaBajaDepartamento;

    /**
     * Función constructor
     * 
     * Última revisión 14/05/2019
     * Crea el objeto departamento con los parámetros recibidos
     * 
     * @author Laura Fernandez
     * @param string $codDepartamento código del departamento
     * @param string $descDepartamento descripción del departamento
     * @param int $fechaCreacionDepartamento marca de tiempo de la creación del departamento
     * @param int $volumenDeNegocio ingresos del departamento
     * @param int $fechaBajaDepartamento marca de tiempo de la baja del departamento
     */
    function __construct($T02_CodDepartamento, $T02_DescDepartamento, $T02_FechaCreacionDepartamento, $T02_VolumenDeNegocio, $T02_FechaBajaDepartamento) {
        $this->T02_CodDepartamento = $T02_CodDepartamento;
        $this->T02_DescDepartamento = $T02_DescDepartamento;
        $this->T02_FechaCreacionDepartamento = $T02_FechaCreacionDepartamento;
        $this->T02_VolumenDeNegocio = $T02_VolumenDeNegocio;
        $this->T02_FechaBajaDepartamento = $T02_FechaBajaDepartamento;
    }

    /**
     * Función getCodDepartamento
     * 
     * Devuelve el código del departamento
     * 
     * @return string
     */
    function getCodDepartamento() {
        return $this->T02_CodDepartamento;
    }

    /**
     * Función getDescDepartamento
     * 
     * Devuelve la descripción del departamento
     * 
     * @return string
     */
    function getDescDepartamento() {
        return $this->T02_DescDepartamento;
    }

    /**
     * Función getFechaCreacionDepartamento
     * 
     * Devuelve la fecha de la creación del departamento
     * 
     * @return int
     */
    function getFechaCreacionDepartamento() {
        return $this->T02_FechaCreacionDepartamento;
    }

    /**
     * Función getVolumenDeNegocio
     * 
     * Devuelve el volumen de negocio
     * 
     * @return int
     */
    function getVolumenDeNegocio() {
        return $this->T02_VolumenDeNegocio;
    }

    /**
     * Función getFechaBajaDepartamento
     * 
     * Devuelve la fecha de baja del departamento
     * 
     * @return int
     */
    function getFechaBajaDepartamento() {
        return $this->T02_FechaBajaDepartamento;
    }

    /**
     * Función setCodDepartamento
     * 
     * Modifica el código de departamento
     * 
     * @param string $codDepartamento código del departamento
     */
    function setCodDepartamento($T02_CodDepartamento) {
        $this->T02_CodDepartamento = $T02_CodDepartamento;
    }

    /**
     * Función setDescDepartamento
     * 
     * Modifica la descripción del departamento
     * 
     * @param string $descDepartamento descripción del departamento
     */
    function setDescDepartamento($T02_DescDepartamento) {
        $this->T02_DescDepartamento = $T02_DescDepartamento;
    }

    /**
     * Función setVolumenDeNegocio
     * 
     * Modifica los ingresos del departamento
     * 
     * @param int $volumenDeNegocio ingresos del departamento
     */
    function setVolumenDeNegocio($T02_VolumenDeNegocio) {
        $this->T02_VolumenDeNegocio = $T02_VolumenDeNegocio;
    }

    /**
     * Función setFechaBajaDepartamento
     * 
     * Modifica la fecha de baja del departamento
     * 
     * @param int $fechaBajaDepartamento marca de tiempo de la baja del departamento
     */
    function setFechaBajaDepartamento($T02_FechaBajaDepartamento) {
        $this->T02_FechaBajaDepartamento = $T02_FechaBajaDepartamento;
    }

    /**
     * Función buscaDepartamentoPorDescripcion
     * 
     * Última revisión 06/02/2019
     * Extrae toda la información de todos los departamentos coincidentes
     * 
     * @author Laura Fernandez
     * @param string $nombre nombre del departamento
     * @param string $opcionesBusqueda criterio de búsqueda
     * @return \Departamento $aDepartamentos array los objetos de departamento y sus atributos
     */
    public static function buscaDepartamentosPorDescripcion($nombre, $opcionesBusqueda) {
        $aDepartamentos = [];
        //Usamos buscaDepartamentosPorDescripcion de DepartamentosPDO
        $departamentos = DepartamentoPDO::buscaDepartamentosPorDescripcion($nombre, $opcionesBusqueda);
        foreach ($departamentos as $row) {
            //Guardamos los datos de los departamentos encontrados
            $departamento = new Departamento($row[T02_CodDepartamento], $row[T02_DescDepartamento], $row[T02_FechaCreacionDepartamento], $row[T02_VolumenDeNegocio], $row[T02_FechaBajaDepartamento]);
            //Se los añadimos a este array creado anteriormente
            array_push($aDepartamentos, $departamento);
        }
        return $aDepartamentos;
    }

    /**
     * Función buscaDepartamentoPorCodigo
     * 
     * Última revisión 06/02/2019
     * Extrae toda la información del departamento en base al código proporcionado
     * 
     * @author Laura Fernandez
     * @param 
     * @return 
     */
    public static function buscaDepartamentosPorCodigo($codigo) {
       
    }

    /**
     * Función altaDepartamento
     * 
     * Última revisión 14/05/2019
     * registra un nuevo departamento en la aplicación
     * 
     * @author Laura Fernandez
     * @param 
     * @param 
     * @param 
     * @return 
     */
    public static function altaDepartamento($codDepartamento, $descDepartamento, $volumenNegocio) {
        if (DepartamentoPDO::altaDepartamento($codDepartamento, $descDepartamento, $volumenNegocio)) {
            $Departamento = new Departamento($codDepartamento, $descDepartamento, current_timestamp, $volumenNegocio, '0001-01-01');
        }
        //Devuelve los datos del usuario creado
        return $Departamento;
    }

    /**
     * Función validaCodNoExiste
     * 
     * Última revisión 14/05/2019
     * @param 
     * 
     * @author Laura Fernandez
     * @return 
     */
    public static function validaCodNoExiste() {
      
    }

    /**
     * Función bajaFisicaDepartamento
     * 
     * Última revisión 14/05/2019
     * Borra un departamento de la aplicación
     * 
     * @author Laura Fernandez
     * @param 
     * @return 
     */
    public function bajaFisicaDepartamento($codigo) {
       
    }

    /**
     * Función bajaLogicaDepartamento
     * 
     * Última revisión 05/02/2019
     * Da de baja temporal, un departamento de la aplicación
     * 
     * @author Laura Fernandez
     * @param 
     * @return 
     */
    public function bajaLogicaDepartamento() {
        
    }

    /**
     * Función modificarDepartamento
     * 
     * Última revisión 14/05/2019
     * Modifica un departamento de la aplicación
     * 
     * @author Laura Fernandez
     * @param 
     * @param 
     * @return 
     */
    public function modificaDepartamento($codigo, $descDepartamento, $volumenNegocio) {
        
    }

    /**
     * Función rehabilitarDepartamento
     * 
     * Última revisión 05/02/2019
     * Da de alta un departamento que estaba de baja temporal o lógica
     * 
     * @author Laura Fernandez
     * @param 
     * @param 
     * @return 
     */
    public function rehabilitaDepartamento() {
        
    }

}

?>