<?php

class Categoria
{
    private $idCATEGORIAS;
    private $Nombre;
    private $db;

    public function __construct()
    {
        $this->db = Database::Connect();
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
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param mixed $Nombre
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    public function Save(){
        $sql = "INSERT INTO categorias VALUES (NULL, '{$this->getNombre()}');";
        $save = $this->db->query($sql);

        $guardado = false;
        if ($save){
            $guardado = true;
        }
        return $save;
    }
    public function All(){
        $Categoria = $this->db->query("SELECT * FROM categorias;");
        return $Categoria;
    }

    public function AllOne(){
        $category = $this->db->query("SELECT * FROM categorias where idCATEGORIAS = {$this->getIdCATEGORIAS()} ");
        return $category->fetch_object();
    }

    public function Edit(){
        $sql = "UPDATE categorias SET Nombre = '{$this->getNombre()}' where idCATEGORIAS = {$this->idCATEGORIAS}";
        $save = $this->db->query($sql);

        $guardado = false;
        if ($save){
          $guardado = true;
        }
        return $guardado;
    }

    public function Delete(){
        $SQL = "DELETE FROM categorias WHERE idCATEGORIAS = {$this->idCATEGORIAS}";
        $delete = $this->db->query($SQL);

        $borrado = false;
        if ($delete){
            $borrado = true;
        }
        return $borrado;
    }
}