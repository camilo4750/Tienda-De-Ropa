<?php
require_once 'Models/Categoria.php';
require_once 'Models/Producto.php';

class CategoriaController
{
    public function crear()
    {
        require_once 'Views/Categorias/CrearC.php';
    }

    public function gestionar()
    {
        $Categoria = new Categoria();;
        $Categorias = $Categoria->All();
        require_once 'Views/Categorias/Gestionar.php';
    }

    Public function save()
    {
        if (isset($_POST)) {
            $Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : false;

            if ($Nombre){
                $Categoria = new Categoria();
                $Categoria->setNombre($Nombre);


                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    $Categoria->setIdCATEGORIAS($id);
                   $editado =  $Categoria->Edit();
                }else{
                    $save = $Categoria->Save();
                }

                if ($save) {
                    $_SESSION['Agregado'] = 'La categoria se ha agregado correctamente';
                }
                if ($editado){
                    $_SESSION['Editado'] = 'La categoria se ha editado correctamente';
                }
            }else{
                echo 'error al llegar';
            }
        }else{
            echo 'error en post';
        }
        header("Location:" . Base_url . "categoria/gestionar");
    }

    public function edit()
    {
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $Edit = true;
            $category = new Categoria();
            $category->setIdCATEGORIAS($id);
            $categoria = $category->AllOne();
            require_once 'Views/Categorias/CrearC.php';
        }
    }
    public function delete()
    {
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $category = new  Categoria();
            $category->setIdCATEGORIAS($id);
            $borrado = $category->Delete();

            if ($borrado){
                $_SESSION['Borrado'] = 'La categoria se ha borrado correctamente';
            }
        }
        header("Location:" . Base_url . "categoria/gestionar");
    }

    public function ver(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $category = new Categoria();
            $category->setIdCATEGORIAS($id);
            $categoria = $category->AllOne();

            $prod = new Producto();
            $prod->setIdCATEGORIAS($id);
            $Products = $prod->Allcategory();
        }
        require_once 'Views/Categorias/Ver.php';
    }
}