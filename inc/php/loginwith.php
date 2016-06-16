<?php

/**
* @file loginwith.php
* @author MagicInventor
* @date 2016
*
*/

include('../../header.php'); 
require_once(TS_EXTRA.'/Hybrid/Auth.php');
require_once(TS_EXTRA.'/Hybrid/Endpoint.php');

$action = $tsCore->setSecure($_GET['action']);
try {
    // ¿esta logueado? ¿esta viculado? || avisar
    if($tsUser->is_member && $tsUser->info['user_social_'.$action] != null) {
        $tsTitle = 'Error';
        $tsPage = 'aviso';


        $smarty->assign("tsAviso",array('titulo' => 'Opps...', 'mensaje' => 'Ya tu cuenta esta vinculada con '.$action.'.', 'but' => 'Ir a pagina principal', 'link' => "/"));
        $smarty->assign("tsTitle",$tsTitle);
        include("../../footer.php");
        exit;
    }

    if($_GET['oauth_token'] || $_GET['hauth_start']) Hybrid_Endpoint::process();
    //$login_config['base_url'] = $tsCore->settings['url'].'/login/'.$action;
    $hybridauth = new Hybrid_Auth( $login_config );
    
    $red_social = $hybridauth->authenticate($action);

    $user_profile = $red_social->getUserProfile();

    // pongo los if separado porque queda mas organizado oksi

    // ¿un usuario ya tiene el id y no esta logueado? || loguear
    if(db_exec(array(__FILE__, __LINE__), 'num_rows', ($my_user = db_exec(array(__FILE__, __LINE__), 'query', 'SELECT user_name, user_password FROM u_miembros WHERE user_social_'.$action.' = \''.$user_profile->identifier.'\'')))) {
        $user_login = db_exec(array(__FILE__, __LINE__), 'fetch_row', $my_user);

        echo $tsUser->loginUser($user_login[0], $user_login[1], true, $tsCore->settings['url'], true);
        exit;
    }

    // ¿esta logueado y no esta viculado? || si lo esta, vicularlo
    if($tsUser->is_member) {
        db_exec(array(__FILE__, __LINE__), 'query', 'UPDATE u_miembros SET user_social_'.$action.' = \''.$user_profile->identifier.'\' WHERE user_id = \''.$tsUser->uid.'\'');

        $tsPage = 'aviso';
        $tsTitle = 'Cuenta vinculada';
        
        $smarty->assign("tsAviso",array('titulo' => 'Yeah!', 'mensaje' => 'Has vinculado tu cuenta con '.$action.'.', 'but' => 'Ir a Cuenta', 'link' => $tsCore->settings['url'].'/cuenta/'));
        $smarty->assign("tsTitle",$tsTitle);

        include("../../footer.php"); 

    } else {
        echo 'test';
        $_SESSION['for_register'] = serialize($user_profile);
        $_SESSION['for_register_social'] = $action;
        header('Location: '.$tsCore->settings['url'].'/login/'.$action.'/finish');
    }

    $red_social->logout();
} catch( Exception $e ){
    echo "Ooophs, we got an error: " . $e->getMessage();
}
