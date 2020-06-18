<?php
require_once 'Models/Pedido.php';

class PedidosController
{
    public function pedido()
    {
        require_once 'Views/Pedido/Hacer.php';
    }

    public function Hecho()
    {
        if (isset($_SESSION['User'])) {
            $identify = $_SESSION['User'];
            $pedido = new Pedido();
            $pedido->setIdUSUARIOS($identify->idUSUARIOS);
            $Producto = $pedido->OnePedido();



            $LINE = new Pedido();
            $PRODUCTOS = $LINE->ProductosOnepedido($Producto->idPEDIDOS);


        }
        require_once 'Views/Pedido/Hecho.php';
    }

    public function save()
    {
        if (isset($_SESSION['User'])) {
            $usuario = $_SESSION['User']->idUSUARIOS;
            $provincia = isset($_POST['Provincia']) ? $_POST['Provincia'] : false;
            $localidad = isset($_POST['Localidad']) ? $_POST['Localidad'] : false;
            $numero = isset($_POST['Numero']) ? $_POST['Numero'] : false;
            $direccion = isset($_POST['Direccion']) ? $_POST['Direccion'] : false;

            $stats = Utilidades::statsCarro();
            $total = $stats['total'];
            if ($usuario && $provincia && $localidad && $numero && $direccion) {
                $pedido = new Pedido();
                $pedido->setIdUSUARIOS($usuario);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setNumero($numero);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($total);
                $pedido->setEstado('Confirmar');
                $save = $pedido->Save();

                $linea_pedido = $pedido->lineas_pedidos();
                if ($save && $linea_pedido) {
                    $_SESSION['Agregado'] = 'Tu pedido se ha confirmado';
                    header("Location:" . Base_url . "pedidos/Hecho");
                } else {
                    var_dump($linea_pedido);
                }
            } else {
                $_SESSION['Incompleto'] = 'Por favor rellena todos los datos';
                header("Location:" . Base_url . "pedidos/pedido");
            }
        } else {
            require_once 'Views/Error.php';
        }
    }

    public function MisPedidos()
    {
        $Pedidos = new Pedido();
        $PEDIDOS = $Pedidos->MisPedidos();
        require_once 'Views/Pedido/MisPedidos.php';
    }

    public function confirmado()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $pedido = new Pedido();
            $pedido->setIdPEDIDOS($id);
            $pedido->setEstado('Confirmado');
            $PEDIDOS = $pedido->Estado();
        }
        header('Location:' . Base_url . 'pedidos/MisPedidos');
    }

    public function confirmar()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $pedido = new Pedido();
            $pedido->setIdPEDIDOS($id);
            $pedido->setEstado('Confirmar');
            $PEDIDOS = $pedido->Estado();
        }
        header('Location:' . Base_url . 'pedidos/MisPedidos');
    }

    public function OnePedido()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // sacar el pedido
            $pedido = new Pedido();
            $pedido->setIdPEDIDOS($id);
            $Pedido = $pedido->GetOne();

            //sacar los productos
            $LINE = new Pedido();
            $PRODUCTOS = $LINE->ProductosOnepedido($id);
        }
        require_once 'Views/Pedido/VerPedido.php';
    }
}
