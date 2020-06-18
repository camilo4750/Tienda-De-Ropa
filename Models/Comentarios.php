<?php
class Comentarios {
    private $idCOMENTARIOS;
    private $idPRODUCTOS;
    private $idUSUARIOS;
    private $Comentario;
    private $Fecha;
    private $db;

    public function __construct()
    {
        $this->db = Database::Connect();
    }

    /**
     * @return mixed
     */
    public function getIdCOMENTARIOS()
    {
        return $this->idCOMENTARIOS;
    }

    /**
     * @param mixed $idCOMENTARIOS
     */
    public function setIdCOMENTARIOS($idCOMENTARIOS)
    {
        $this->idCOMENTARIOS = $idCOMENTARIOS;
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
    public function getComentario()
    {
        return $this->Comentario;
    }

    /**
     * @param mixed $Comentario
     */
    public function setComentario($Comentario)
    {
        $this->Comentario = $Comentario;
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

    public function Save(){
        $SQL = "INSERT INTO comentarios VALUES (NULL, '{$this->getIdPRODUCTOS()}', '{$this->getIdUSUARIOS()}', '{$this->getComentario()}', CURDATE());";
        $save = $this->db->query($SQL);

        $guardado = false;
        if ($save){
            $guardado = true;
        }
        return $guardado;


    }

    public function ElComentario(){
        $SQl = "DELETE FROM comentarios WHERE idCOMENTARIOS = {$this->idCOMENTARIOS}";
        $eliminar = $this->db->query($SQl);

        $eliminado = false;
        if ($eliminar){
            $eliminado = true;
        }
        return $eliminado;
    }

    public function EdComentario(){
        $SQL = "UPDATE comentarios SET Comentario = '{$this->getComentario()}' WHERE idCOMENTARIOS = {$this->idCOMENTARIOS}";
        $editar = $this->db->query($SQL);

        $editado = false;
        if ($editar){
            $editado = true;
        }
        return $editado;
    }

    public function AllComentarios(){
        $comentario = $this->db->query("SELECT C.*, P.NombreP, U.Nombre, U.Apellidos From comentarios C INNER JOIN productos P ON C.idPRODUCTOS = P.idPRODUCTOS INNER JOIN usuarios U ON C.idUSUARIOS = U.idUSUARIOS");
        return $comentario;
    }

    public function See(){
        $Comentario = $this->db->query("SELECT C.*, P.NombreP, P.idPRODUCTOS, U.Nombre, U.Apellidos, U.idUSUARIOS From comentarios C INNER JOIN productos P ON C.idPRODUCTOS = P.idPRODUCTOS INNER JOIN usuarios U ON C.idUSUARIOS = U.idUSUARIOS WHERE C.idCOMENTARIOS = {$this->getIdCOMENTARIOS()}");
        return $Comentario->fetch_object();
    }

    public function TotalC(){
        $Sql = $this->db->query('SELECT COUNT(*) AS \'Comentarios\' FROM comentarios');
        return $Sql->fetch_object();
    }


}