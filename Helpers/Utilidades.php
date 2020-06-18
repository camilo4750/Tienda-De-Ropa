<?php

class Utilidades
{
    public static function DeleteSession()
    {
        $borrado = false;

        if (isset($_SESSION['Agregado'])) {
            $_SESSION['Agregado'] = null;
            $borrado = true;
        }

        if (isset($_SESSION['Incompleto'])) {
            $_SESSION['Incompleto'] = null;
            $borrado = true;
        }

        if (isset($_SESSION['Editado'])) {
            $_SESSION['Editado'] = null;
            $borrado = true;
        }

        if (isset($_SESSION['Borrado'])) {
            $_SESSION['Borrado'] = null;
            $borrado = true;
        }
        if (isset($_SESSION['error'])) {
            $_SESSION['error'] = null;
            $borrado = true;
        }

        return $borrado;
    }

    public static function ShowCategorias()
    {
        require_once 'Models/Categoria.php';
        $Categoria = new Categoria();
        $Categorias = $Categoria->All();
        return $Categorias;
    }

    public static function statsCarro()
    {
        $stats = array(
            'count' => 0,
            'total' => 0,
        );

        if (isset($_SESSION['carro'])) {
            $stats['count'] = count($_SESSION['carro']);

            foreach ($_SESSION['carro'] as $Producto) {
                $stats['total'] += $Producto['Precio'] * $Producto['Unidades'];
            }
        }
        return $stats;
    }
}

