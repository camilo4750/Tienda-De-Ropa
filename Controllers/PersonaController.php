<?php
require_once 'Models/Persona.php';
require_once 'Models/Comentarios.php';
require_once 'Models/Pedido.php';
require_once 'Models/Producto.php';
class PersonaController
{
    public function inicioS()
    {
        require_once 'Views/session.php';
    }

    public function index()
    {
        $Personas = new Persona();
        $Persona = $Personas->TotalP();

        $Comentarios = new Comentarios();
        $Comentario = $Comentarios->TotalC();


        $Pedidos = new Pedido();
        $Pedido = $Pedidos->TotalPd();

        $Productos = new Producto();
        $Producto = $Productos->TotalPr();

        require_once 'Views/Home.php';
    }

    public function registro(){
        require_once 'Views/Usuarios/Registro.php';
    }

    public function save(){
        if (isset($_POST)){
            $Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : false;
            $Apellidos = isset($_POST['Apellidos']) ? $_POST['Apellidos'] : false;
            $Email = isset($_POST['Email']) ? $_POST['Email'] : false;
            $Password = isset($_POST['Password']) ? $_POST['Password'] : false;
           
            if ($Nombre && $Apellidos && $Email && $Password){
                $persona = new Persona();
                $persona->setNombre($Nombre);
                $persona->setApellidos($Apellidos);
                $persona->setEmail($Email);
                $persona->setPassword($Password);
                $Save = $persona->save();


                if ($Save){
                    $_SESSION['Agregado'] = "Se ha registrado correctamente";
                    
                }else{
                    var_dump($persona);
                    
                }
            }else{
                echo 'Error al llegar datos';
            }
        }else{
            echo 'Error en post';
            var_dump($_POST);
            
        }
        header("Location:" . Base_url . "persona/inicioS");
    }

    public function login(){
        if(isset($_POST)){
            $persona = new Persona();
            $persona->setEmail($_POST['Email']);
            $persona->setPassword($_POST['Password']);
            $identificado = $persona->login();
            if ($identificado && is_object($identificado)){
                if ($identificado->Rol == 'Admin'){
                    $_SESSION['Admin'] = true;
                    header("Location:" . Base_url . "persona/index");
                }
                if ($identificado->Rol == 'User'){
                    $_SESSION['User'] = $identificado;
                    header("Location:" . Base_url);
                }
               
            }else{
                $_SESSION['error'] = "Login incorrecto";
                header("Location:" . Base_url . "persona/inicioS");
            }
        }
    }

    public function logaut()
    {
        if (isset($_SESSION['User'])) {
            unset($_SESSION['User']);
        }

        if (isset($_SESSION['Admin'])) {
            unset($_SESSION['Admin']);
        }
        header("Location:" . Base_url);
    }

    public function All()
    {
        $Persona = new Persona();
        $PERSONAS = $Persona->All();
        require_once 'Views/Usuarios/Ver.php';
    }

    public function Delete(){
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $persona = new Persona();
            $persona->setIdUSUARIOS($id);
            $Borrado = $persona->Delete();

            if ($Borrado){
                $_SESSION['Borrado'] = "La persona se ha eliminado correctamente";
            }
        }
        header("Location:" . Base_url . 'persona/All');
    }

    public function See(){
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $persona = new Persona();
            $persona->setIdUSUARIOS($id);
            $Persona = $persona->Allone();

            require_once 'Views/Usuarios/See.php';
        }
    }
}
