<?php

use App\Models\Todo;
use Illuminate\Support\Collection;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your WordPress site. These
| routes are loaded from the TypeRocket\Http\RouteCollection immediately
| after the typerocket_routes action is fired.
|
*/

if (is_user_logged_in()) {
  
 
  tr_route()->get()->match('/')->do(function () {
    $todo = Todo::get();
    dd($todo);
    
  });

  // tr_route()->get()->match('my-account')->do('index@Myaccount');
  tr_route()->get()->match('my-account')->do(function () {
    wp_redirect('/my-account/dashboard');
    exit;
  });
  tr_route()->get()->match('my-account/dashboard')->do('index@Myaccount');


  tr_route()->get()->match('my-account/resources/users')->do('index@User');
  tr_route()->get()->match('my-account/resources/users/add')->do('add@User');
  tr_route()->post()->match('my-account/resources/users/store')->do('store@User');
  tr_route()->get()->match('my-account/resources/users/([^/]+)/edit', ['id'])->do('edit@User');
  tr_route()->post()->match('my-account/resources/users/update/([^/]+)', ['id'])->do('update@User');
  tr_route()->post()->match('my-account/resources/users/([^/]+)/destroy', ['id'])->do('destroy@User');
  tr_route()->post()->match('my-account/resources/users/resetpassword/([^/]+)', ['id'])->do('resetpassword@User');
  tr_route()->post()->match('my-account/resources/users/saveAttachment/([^/]+)', ['id'])->do('saveAttachment@User');
  tr_route()->post()->match('my-account/resources/users/updateAttachment/([^/]+)', ['id'])->do('updateAttachment@User');
  tr_route()->post()->match('my-account/resources/users/deleteAttachment/([^/]+)', ['id'])->do('deleteAttachment@User');

  tr_route()->post()->match('my-account/resources/users/saveNotes')->do('saveNotes@User');
  tr_route()->post()->match('my-account/resources/users/updateNotes/([^/]+)', ['id'])->do('updateNotes@User');
  tr_route()->post()->match('my-account/resources/users/deleteNotes/([^/]+)', ['id'])->do('deleteNotes@User');


  //invoices
  tr_route()->get()->match('my-account/billing/invoices')->do('index@Invoice');
  tr_route()->get()->match('my-account/billing/invoices/add')->do('add@Invoice');
  tr_route()->post()->match('my-account/billing/invoices/create')->do('create@Invoice');
  tr_route()->get()->match('my-account/billing/invoices/edit/([^/]+)', ['id'])->do('edit@Invoice');
  tr_route()->post()->match('my-account/billing/invoices/update/([^/]+)', ['id'])->do('update@Invoice');
  tr_route()->post()->match('my-account/billing/invoices/destroy/([^/]+)', ['id'])->do('destroy@Invoice');


}

tr_route()->get()->match('my-account/resources/users/test')->do('test@User');

// tr_route()->get()->match('/')->do(function () {
    
//   $data = ['a' => 'bbb', 'cc' => 'vvvv'] ;
//   $collection = new Collection($data);
//   dump($data);
//     dd($collection); 

//   });




