<?php

class Producto
{
    private $idPRODUCTOS;
    private $idCATEGORIAS;
    private $NombreP;
    private $Descripcion;
    private $Precio;
    private $Stock;
    private $Oferta;
    private $Imagen;
    private $Fecha;
    private $db;

    public function __construct()
    {
        $this->db = Database::Connect();
    }

    /**
     * @return mixed
     */
    public function getIdPRODUCTOS()
    {
        return $this->idPRODUCTOS;
    }

    /**
     * @param mixed $idPRODUCTOS
     */
    public function setIdPRODUCTOS($idPRODUCTOS)
    {
        $this->idPRODUCTOS = $idPRODUCTOS;
    }

    /**
     * @return mixed
     */
    public function getIdCATEGORIAS()
    {
        return $this->idCATEGORIAS;
    }

    /**
     * @param mixed $idCATEGORIAS
     */
    public function setIdCATEGORIAS($idCATEGORIAS)
    {
        $this->idCATEGORIAS = $idCATEGORIAS;
    }

    /**
     * @return mixed
     */
    public function getNombreP()
    {
        return $this->NombreP;
    }

    /**
     * @param mixed $NombreP
     */
    public function setNombreP($NombreP)
    {
        $this->NombreP = $NombreP;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    /**
     * @param mixed $Descripcion
     */
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->Precio;
    }

    /**
     * @param mixed $Precio
     */
    public function setPrecio($Precio)
    {
        $this->Precio = $Precio;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->Stock;
    }

    /**
     * @param mixed $Stock
     */
    public function setStock($Stock)
    {
        $this->Stock = $Stock;
    }

    /**
     * @return mixed
     */
    public function getOferta()
    {
        return $this->Oferta;
    }

    /**
     * @param mixed $Oferta
     */
    public function setOferta($Oferta)
    {
        $this->Oferta = $Oferta;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->Imagen;
    }

    /**
     * @param mixed $Imagen
     */
    public function setImagen($Imagen)
    {
        $this->Imagen = $Imagen;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->Fecha;
    }

    /**
     * @param mixed $Fecha
     */
    public function setFecha($Fecha)
    {
        $this->Fecha = $Fecha;
    }

    public function Save()
    {
        $db = "INSERT INTO productos VALUES (NULL, '{$this->getIdCATEGORIAS()}', '{$this->getNombreP()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, '{$this->getOferta()}', '{$this->getImagen()}', CURDATE());";
        $Save = $this->db->query($db);


        $guardado = false;
        if ($Save) {
            $guardado = true;
        }

        return $guardado;
    }
    
    public function Edit(){
    $SQL = "UPDATE productos SET idCATEGORIAS = {$this->getIdCATEGORIAS()}, NombreP = '{$this->getNombreP()}', Descripcion = '{$this->getDescripcion()}', Precio = {$this->getPrecio()}, Stock = {$this->getStock()}, Oferta = '{$this->getOferta()}'  ";
    
    if ($this->getImagen() != null){
        $SQL .= ", Imagen = '{$this->getImagen()}'";
    }

    $SQL .= " WHERE idPRODUCTOS = {$this->getIdPRODUCTOS()}";

    $Edit = $this->db->query($SQL);

    $guardado = false;
    if ($Edit) {
        $guardado = true;
    }

    return $guardado;

    }

    public function All()
    {
        $productos = $this->db->query("SELECT P.*, C.Nombre FROM productos P INNER JOIN categorias C ON P.idCATEGORIAS = C.idCATEGORIAS");
        return $productos;
    }
    
    public function Allone()
    {
        $productos = $this->db->query("SELECT * FROM productos WHERE idPRODUCTOS = {$this->getIdPRODUCTOS()}");
        return $productos->fetch_object();
    }
    
    public function Allcategory(){
        $SQL = "SELECT p.*, c.Nombre FROM productos p INNER JOIN categorias c ON c.idCATEGORIAS = p.idCATEGORIAS WHERE p.idCATEGORIAS = {$this->getIdCATEGORIAS()} ORDER BY idPRODUCTOS DESC";
        $Products = $this->db->query($SQL);
        return $Products;
    }

    public function getRandom($limit)
    {
        $Productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        return $Productos;
    }

    public function delete()
    {
    $SQL = "DELETE * FROM productos WHERE idPRODUCTOS = {$this->idPRODUCTOS}";
    $delete = $this->db->query($SQL);

    $borrado = false;
    if ($delete){
        $borrado = true;
    }
    return $borrado;
    }

    public function Coment()
    {
        $Coment = $this->db->query("SELECT C.*, U.Nombre, U.Apellidos, U.Email FROM Comentarios C INNER JOIN usuarios U ON C.idUSUARIOS = U.idUSUARIOS");
       return $Coment;
    }

    public function  TotalPr(){
        $SQL = $this->db->query('SELECT COUNT(*) AS \'Productos\' FROM productos');
        return $SQL->fetch_object();
    }


}