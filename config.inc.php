<?php if ( ! defined('TS_HEADER')) exit('No direct script access allowed'); 
/*
| -------------------------------------------------------------------
| AJUSTES DE BASE DE DATOS
| -------------------------------------------------------------------
| Esta variable contendrá los ajustes necesarios para acceder a su base de datos.
| -------------------------------------------------------------------
| EXPLICACIÓN DE VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
*/
$db['hostname'] = 'localhost';
$db['username'] = 'root';
$db['password'] = '';
$db['database'] = 'rengo';



/*
 * -------------------------------------------------------------------
 *  Constantes
 * -------------------------------------------------------------------
 */
define('TSCookieName','PPCook');
define('RC_PUK',"6LcXvL0SAAAAAPJkBrro96lnXGZ56TBRExEmVM3L"); //public key recaptcha aqui
define('RC_PIK',"6LcXvL0SAAAAAEg1zizOxJPTjlD0ZtbbzubF2NjE"); //private key recaptcha aqui
    
/*
| -------------------------------------------------------------------
| AJUSTES DE MENSAJES ESTÁTICOS
| -------------------------------------------------------------------
| Esta variable contendrá los ajustes necesarios para mostrar un mensaje estático.
| -------------------------------------------------------------------
| EXPLICACIÓN DE VALORES
| -------------------------------------------------------------------
|
|	['msgs'] = false <No mostrará la página estática>
|	['msgs'] = 1 <Mostrará la página estática con descripción breve para visitantes/usuarios y detalles para moderadores/administradores>
|	['msgs'] = 2 <Mostrará la página estática con detalles para todos>
*/
$display['msgs'] = 1;