<?php
class Persona
{
    private $idUSUARIOS;
    private $Nombre;
    private $Apellidos;
    private $Email;
    private $Password;
    private $Rol;
    private $db;

    public function __construct()
    {
        $this->db = Database::Connect();
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

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->Apellidos;
    }

    /**
     * @param mixed $Apellidos
     */
    public function setApellidos($Apellidos)
    {
        $this->Apellidos = $Apellidos;
    }

       /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

       /**
     * @return mixed
     */
    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->Password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    /**
     * @param mixed $Password
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

       /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->Rol;
    }

    /**
     * @param mixed $Rol
     */
    public function setRol($Rol)
    {
        $this->Rol = $Rol;
    }

    public function save(){
        $SQL = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'User' );";
        $save = $this->db->query($SQL);

        $guardado = false;
        if ($save){
            $guardado = true;
        }
        return $guardado;
    }

    public function login(){
        $result = false;
        $email = $this->Email;
        $password = $this->Password;

        //Comprobar correo
        $SQL = "SELECT * FROM usuarios WHERE Email = '$email'";
        $Login = $this->db->query($SQL);

        if($Login && $Login->num_rows == 1){
            $usuario = $Login->fetch_object();
            $Verify = password_verify($password, $usuario->Password);

            if($Verify){
                $result = $usuario;
            }
        }
        return $result;
    }

    public function All()
    {
       $All = $this->db->query("SELECT * FROM usuarios WHERE Rol = 'User'");
       return $All;
    }

    public function Delete(){
        $SQL = "DELETE FROM usuarios WHERE idUSUARIOS = {$this->idUSUARIOS}";
        $delete = $this->db->query($SQL);

        $borrado = false;
        if ($delete){
            $borrado = true;
        }
        return $borrado;
    }

    public function AllOne(){
        $SQL = $this->db->query("SELECT * FROM usuarios WHERE idUSUARIOS = {$this->getIdUSUARIOS()}");
        return $SQL->fetch_object();
    }

    public function TotalP(){

        $SQL = $this->db->query('SELECT COUNT(*) AS \'Personas\' FROM usuarios');
        return $SQL->fetch_object();
    }
}
