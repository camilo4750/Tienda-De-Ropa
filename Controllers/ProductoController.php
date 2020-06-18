<?php
require_once 'Models/Producto.php';
require_once 'Models/Comentarios.php';

class ProductoController
{

    public function index()
    {
        $producto = new Producto();
        $Productos = $producto->getRandom(12);
        require_once 'Views/Productos/Destacado.php';
    }

    public function crear()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setIdPRODUCTOS($id);
            $Datos = $producto->Allone();
            $Edit = true;
        }
        require_once 'Views/Productos/CrearP.php';
    }


    public function gestionar()
    {
        $producto = new Producto();
        $productos = $producto->All();
        require_once 'Views/Productos/Gestionar.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $Categoria = isset($_POST['idCATEGORIAS']) ? $_POST['idCATEGORIAS'] : false;
            $NombreP = isset($_POST['NombreP']) ? $_POST['NombreP'] : false;
            $Descripcion = isset($_POST['Descripcion']) ? $_POST['Descripcion'] : false;
            $Precio = isset($_POST['Precio']) ? $_POST['Precio'] : false;
            $Stock = isset($_POST['Stock']) ? $_POST['Stock'] : false;
            $Oferta = isset($_POST['Oferta']) ? $_POST['Oferta'] : false;

            if ($Categoria && $NombreP && $Descripcion && $Precio && $Stock && $Oferta) {
                $Producto = new Producto();
                $Producto->setIdCATEGORIAS($Categoria);
                $Producto->setNombreP($NombreP);
                $Producto->setDescripcion($Descripcion);
                $Producto->setPrecio($Precio);
                $Producto->setStock($Stock);
                $Producto->setOferta($Oferta);

                if (isset($_FILES['Imagen'])) {
                    $file = $_FILES['Imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if ($mimetype == 'image/png' || $mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/gif') {
                        if (!is_dir('Upload/Imagenes')) {
                            mkdir('Upload/Imagenes', 0777, true);
                        }
                        $Producto->setImagen($filename);
                        move_uploaded_file($file['tmp_name'], 'Upload/Imagenes/' . $filename);

                    }
                }

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $Producto->setIdPRODUCTOS($id);
                    $Editado = $Producto->Edit();
                } else {
                    $Save = $Producto->Save();
                }

                if ($Save) {
                    $_SESSION['Agregado'] = 'El producto se ha agregado correctamente';
                    header("Location:" . Base_url . "producto/gestionar");
                } else {
                    echo 'Error en el save -';
                    var_dump($Producto);
                }

                if ($Editado) {
                    $_SESSION['Editado'] = 'El producto se ha editado correctamente';
                }
            }

        }
        header("Location:" . Base_url . "producto/gestionar");
    }

    public function ver()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = new Producto();
            $product->setIdPRODUCTOS($id);
            $producto = $product->Allone();

            $product = new Producto();
            $COMENTARIO = $product->Coment($producto->idPRODUCTOS);
        }
        $random = $product->getRandom(12);
        require_once 'Views/Productos/Ver.php';
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $prod = new Producto();
            $prod->setIdPRODUCTOS($id);
            $borrar = $prod->delete();

            if ($borrar) {
                $_SESSION['Borrado'] = "EL producto se ha borrrado correctamente";

            }
        }
        header("Location:" . Base_url . "producto/gestionar");
    }

    public function SaveC()
    {
        if (isset($_POST)) {
            $Comentario = isset($_POST['Comentario']) ? $_POST['Comentario'] : false;
            $Prenda = isset($_POST['idPRODUCTOS']) ? $_POST['idPRODUCTOS'] : false;
            $Usuario = isset($_POST['idUSUARIOS']) ? $_POST['idUSUARIOS'] : false;

            if ($Comentario && $Prenda && $Usuario) {
                $comentarios = new Comentarios();
                $comentarios->setIdPRODUCTOS($Prenda);
                $comentarios->setIdUSUARIOS($Usuario);
                $comentarios->setComentario($Comentario);


                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $comentarios->setIdCOMENTARIOS($id);
                    $Editado = $comentarios->EdComentario();
                } else {
                    $Save = $comentarios->Save();
                }

                if ($Save) {
                    $_SESSION['Agregado'] = "El comentario se ha agregado correctamente";
                    header("Location:" . Base_url . "producto/ver&id= $Prenda ");
                }
                if ($Editado) {
                    $_SESSION['Editado'] = "El comentario se ha Editado correctamente";
                    header("Location:" . Base_url . "producto/ver&id= $Prenda ");
                }
            }
        }
    }


    public function ElComentario()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $comentario = new Comentarios();
            $comentario->setIdCOMENTARIOS($id);
            $result = $comentario->ElComentario();
            if ($result) {
                $_SESSION['Eliminado'] = "El comentario se Ha eliminado correctamente";
            }
        }
        header("Location:" . Base_url . "producto/index");
    }

    public function Gcomentarios()
    {
        $comentarios = new Comentarios();
        $Coment = $comentarios->AllComentarios();
        require_once 'Views/Comentarios/Ver.php';
    }

    public function ElComentarios()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $comentario = new Comentarios();
            $comentario->setIdCOMENTARIOS($id);
            $result = $comentario->ElComentario();
            if ($result) {
                $_SESSION['Eliminado'] = "El comentario se Ha eliminado correctamente";
            }
        }
        header("Location:" . Base_url . "producto/Gcomentarios");
    }

    public function SeeC()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $comentario = new Comentarios();
            $comentario->setIdCOMENTARIOS($id);
            $See = $comentario->See();

            require_once 'Views/Comentarios/See.php';
        }
    }

    public function SeeP()
    {
        if (isset($_GET)) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setIdPRODUCTOS($id);
            $producto = $producto->Allone();

            require_once 'Views/Productos/See.php';
        }
    }
}