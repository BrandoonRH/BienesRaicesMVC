<?php 
require_once __DIR__ . '/../includes/app.php'; 

use MVC\Router; 
use Controllers\PropiedadController;
use Controllers\AdminController;
use Controllers\VendedorController;
use Controllers\PaginasController;
use Controllers\LoginController;


$router = new Router(); 
/****RUTAS PARA LOGIN****** */
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

/***RUTAS PARA USUARIO AUTENTICADO*** */
//Ruta Panel de Administración 
$router->get('/admin', [AdminController::class, 'index']); 

//Rutas CRUD Propiedades 
$router->get('/admin/propiedades/ver', [PropiedadController::class, 'index']);
$router->get('/admin/propiedades/crear', [PropiedadController::class, 'crear']);
$router->post('/admin/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/admin/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/admin/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/admin/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

$router->get('/admin/propiedades/actualizarVista', [PropiedadController::class, 'actualizarView']);

//Rutas CRUD Vendedores 
$router->get('/admin/vendedores/ver', [VendedorController::class, 'index']);
$router->get('/admin/vendedores/crear', [VendedorController::class, 'crear']);
$router->post('/admin/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/admin/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/admin/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/admin/vendedores/eliminar', [VendedorController::class, 'eliminar']);


/****RUTAS PARA USUARIOS NO AUTENTICADOS****** */
//Rutas Para Paginas
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/propiedades', [PaginasController::class, 'propiedades']);
$router->get('/propiedad', [PaginasController::class, 'propiedad']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);





$router->comprobarRutas();
