<?php
session_start(); /*uso session_start para trabajar con una sesion */

/* verifica si el usuario inicio sesion */
if (isset($_SESSION['id'])) {
    /* si existe el identificador de sesion, es porque el usuario
    inicio sesion, lo mando a la aplicacion */
    switch($_SESSION['user']['tipo']) {
        case 'cliente':
            header('location:./homeCliente');
            break;
        case 'veterinario':
        case 'estilista':
            header('location:./homeProfesional');
            break;
        case 'administrador':
            header('location:./homeAdministrador');
            break;
        }
} else {
    /* si no existe el identificador, lo mando al form de login */
    header('location:./login');
}
?>  