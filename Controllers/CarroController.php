<?php
require_once 'Models/Producto.php';
class CarroController
{
    public function index()
    {
        if (isset($_SESSION['carro']) && count($_SESSION['carro']) >= 1) {
            $carrito = $_SESSION['carro'];
        }else{
            $carrito = array();
        }

        require_once 'Views/Carro/Ver.php';
    }

    public function add()
    {
        if (isset($_GET['id'])) {
            $Productoid = $_GET['id'];
        } else {
            header("Location:" . Base_url);
        }

        if (isset($_SESSION['carro'])) {
            $count = 0;
            foreach ($_SESSION['carro'] as $indice => $elemento) {
                if ($elemento['idProducto'] == $Productoid) {
                    $_SESSION['carro'][$indice]['Unidades']++;
                    $count++;
                }
            }
        }

        if (!isset($count) || $count == 0) {
            $producto = new Producto();
            $producto->setIdPRODUCTOS($Productoid);
            $producto = $producto->Allone();
            //Añadir al carro
            if (is_object($producto)) {
                $_SESSION['carro'][] = array(
                    "idProducto"  => $producto->idPRODUCTOS,
                    "Precio" => $producto->Precio,
                    "Unidades" => 1,
                    "Producto" => $producto
                );
            }
        }
        header("Location:" . Base_url . "carro/index");
    }

    public function DeleteAll(){
        unset($_SESSION['carro']);
        header("Location:" . Base_url . "carro/index");
    }

    public function DeleteOne(){
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            unset($_SESSION['carro'][$index]);
        }
        header("Location:" . Base_url . "carro/index");
    }

    public function Up(){
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
           $_SESSION['carro'][$index]['Unidades']++;
        }
        header("Location:" . Base_url . "carro/index");
    }


    public function Down(){
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
           $_SESSION['carro'][$index]['Unidades']--;
        }
        header("Location:" . Base_url . "carro/index");
    }
}
