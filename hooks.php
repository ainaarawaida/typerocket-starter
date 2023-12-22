<?php


use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => DB_HOST,
    'database'  => DB_NAME ,
    'username'  => DB_USER,
    'password'  => DB_PASSWORD,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();



add_filter('woocommerce_login_redirect', 'woocommerce_login_redirect', 20, 2);
function woocommerce_login_redirect($redirect, $user)
{
    // Get the first of all the roles assigned to the user
    $role = $user->roles[0];
    $myaccount = home_url('my-account');
    if ($role == 'administrator') {
        //Redirect administrators to the dashboard
        $redirect = admin_url();
    } elseif ($role == 'shop_manager') {
        //Redirect shop managers to the dashboard
        $redirect = $myaccount;
    } else {
        //Redirect any other role to the previous visited page or, if not available, to the home
        $redirect = wp_get_referer() ? wp_get_referer() : home_url();
    }
    return $redirect;
}

add_action( 'wp_logout', 'my_custom_logout_redirect' );
function my_custom_logout_redirect() {
  $redirect_url = home_url('my-account'); // Customize this URL based on your logic
  wp_redirect( $redirect_url );
  exit;
}





?>