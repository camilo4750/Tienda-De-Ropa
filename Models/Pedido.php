<?php

class Pedido
{
    private $idPEDIDOS;
    private $idUSUARIOS;
    private $Provincia;
    private $Localidad;
    private $Numero;
    private $Direccion;
    private $Coste;
    private $fecha;
    private $Estado;
    private $db;

    public function __construct()
    {
        $this->db = Database::Connect();
    }

    /**
     * @return mixed
     */
    public function getIdPEDIDOS()
    {
        return $this->idPEDIDOS;
    }

    /**
     * @param mixed $idPEDIDOS
     */
    public function setIdPEDIDOS($idPEDIDOS)
    {
        $this->idPEDIDOS = $idPEDIDOS;
    }

    /**
     * @return mixed
     */
    public function getIdUSUARIOS()
    {
        return $this->idUSUARIOS;
    }

    /**
     * @param mixed $idUSUARIOS
     */
    public function setIdUSUARIOS($idUSUARIOS)
    {
        $this->idUSUARIOS = $idUSUARIOS;
    }

    /**
     * @return mixed
     */
    public function getProvincia()
    {
        return $this->Provincia;
    }

    /**
     * @param mixed $Provincia
     */
    public function setProvincia($Provincia)
    {
        $this->Provincia = $Provincia;
    }

    /**
     * @return mixed
     */
    public function getLocalidad()
    {
        return $this->Localidad;
    }

    /**
     * @param mixed $Localidad
     */
    public function setLocalidad($Localidad)
    {
        $this->Localidad = $Localidad;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->Numero;
    }

    /**
     * @param mixed $Numero
     */
    public function setNumero($Numero)
    {
        $this->Numero = $Numero;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->Direccion;
    }

    /**
     * @param mixed $Direccion
     */
    public function setDireccion($Direccion)
    {
        $this->Direccion = $Direccion;
    }

    /**
     * @return mixed
     */
    public function getCoste()
    {
        return $this->Coste;
    }

    /**
     * @param mixed $Coste
     */
    public function setCoste($Coste)
    {
        $this->Coste = $Coste;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param mixed $Estado
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }

    public function GetOne()
    {
        $Producto = $this->db->query("SELECT * FROM pedidos WHERE idPEDIDOS = {$this->getIdPEDIDOS()}");
        return $Producto->fetch_object();
    }

    public function OnePedido()
    {
        $SQL = "SELECT P.idPEDIDOS, P.Coste FROM pedidos P WHERE P.idUSUARIOS = {$this->getIdUSUARIOS()} ORDER BY P.idPEDIDOS DESC LIMIT 1";
        $Producto = $this->db->query($SQL);

        return $Producto->fetch_object();
    }

    public function MisPedidos()
    {
        $SQL = "SELECT * FROM pedidos";
        $Producto = $this->db->query($SQL);

        return $Producto;
    }

    public function ProductosOnepedido($id)
    {

        $SQL = "SELECT pr.*, lp.Unidades FROM productos pr "
            . "INNER JOIN linea_pedidos lp on pr . idPRODUCTOS = lp . Productos_id "
            . "WHERE lp . Pedidos_id = {$id}";
        $PRODUCTOS = $this->db->query($SQL);

        return $PRODUCTOS;
    }

    public function Save()
    {
        $SQL = "INSERT INTO pedidos VALUES(NULL, {$this->getIdUSUARIOS()}, '{$this->getProvincia()}', '{$this->getLocalidad()}', '{$this->getNumero()}', '{$this->getDireccion()}', {$this->getCoste()}, CURDATE(), '{$this->getEstado()}')";
        $save = $this->db->query($SQL);

        $guardado = false;
        if ($save) {
            $guardado = true;
        }
        return $guardado;
    }

    public function lineas_pedidos()
    {


        $SQL = "SELECT LAST_INSERT_ID() AS 'pedidos'";
        $query = $this->db->query($SQL);
        $pedido_id = $query->fetch_object()->pedidos;

        var_dump($pedido_id);
        foreach ($_SESSION['carro'] as $elemento) {

            $producto = $elemento['Producto'];


            $Insert = "INSERT INTO linea_pedidos (idlinea_pedidos, Unidades, Pedidos_id, Productos_id, Fecha) VALUES(NULL, '{$elemento['Unidades']}', '{$pedido_id}', '{$producto->idPRODUCTOS}', CURTIME())";
            $save = $this->db->query($Insert);
        }

        $guardado = false;
        if ($save) {
            $guardado = true;
        }
        var_dump($Insert);
        return $guardado;
    }

    public function Estado()
    {
        $SQL = "UPDATE pedidos SET Estado = '{$this->getEstado()}' WHERE idPEDIDOS = {$this->getIdPEDIDOS()}";
        $Update = $this->db->query($SQL);
        $actualizado = false;
        if ($Update) {
            $actualizado = true;
        }
        return $actualizado;
    }

    public function TotalPd(){
        $SQL = $this->db->query('SELECT COUNT(*) AS \'Pedidos\' FROM pedidos');
        return $SQL->fetch_object();
    }
}