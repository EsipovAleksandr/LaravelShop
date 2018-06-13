<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//выводим Лидеры продаж в главное окно
Route::get('/',['uses'=>'GoodsController@HitShow']
);


Route::get('/categories/{categoreName}',[
    'uses'=>'CategoriesController@categoryAction',
    'as'=>'categore.index'
]);

Route::get('/goods/{productName}',[
'uses'=>'GoodsController@showAction'
]);

//добавить и открыть корзину
Route::get('/add-to-cart-open/{id}',[
    'uses'=>'GoodsController@getAddToCartOpen',
    'as' =>'goods.addToCartOpen'
]);

Route::get('/add-to-cart-openTo/{id}/{id2}',[
    'uses'=>'GoodsController@getAddToCartOpenTo',
    'as' =>'goods.addToCartOpenTo'
]);

Auth::routes();
//добавить в корзину
Route::get('/add-to-cart/{id}',[
    'uses'=>'GoodsController@getAddToCart',
    'as' =>'goods.addToCart'
]);

//увеличить количество
Route::get('/getQuantityAdd/{id}',[
    'uses'=>'GoodsController@getQuantityAdd',
    'as' =>'cart.getQuantityAdd'
]);
//уменьшить количество
Route::get('/getQuantityDelet/{id}',[
    'uses'=>'GoodsController@getQuantityDelete',
    'as' =>'cart.getQuantityDelet'
]);
//откыть корзину
Route::get('/shopping-cart',[
    'uses'=>'GoodsController@getCart',
    'as' =>'goods.shoppongCart'
]);

//удалить всю корзину
Route::get('/delete-all',['uses'=>'GoodsController@deleteAll',
        'as'=>'deleteAll']
);

//удадить один товар из корзины
Route::get('/delete/{id}',['uses'=>'GoodsController@delete',
        'as'=>'delete']
);
Route::get('/checkout',['uses'=>'OrdersController@getCheckout',
        'as'=>'checkout']
);

Route::post('/checkout',['uses'=>'OrdersController@postCheckout',
        'as'=>'checkout']
);

Route::get('/Admin/',['uses'=>'AdminController@ShowAdmin',
    'as'=>'admin.admin']

);

Route::post('/addCategory',['uses'=>'AdminController@addnewcatAction',
        'as'=>'admin.addCategory']
);

Route::get('/Admin/category',['uses'=>'AdminController@ShowCategory',
        'as'=>'adminCategory']
);

Route::post('/updatecategory',['uses'=>'AdminController@updateCategory',
        'as'=>'adminUpdate']
);

Route::post('/DeleteCategory',['uses'=>'AdminController@DeleteCategory',
    'as'=>'adminCategoreDelete']
);


Route::get('/Admin/products',['uses'=>'AdminController@ShowProducts',
        'as'=>'adminProducts']
);

Route::post('/addProducts',['uses'=>'AdminController@addProducts',
        'as'=>'adminAddProducts']
);
Route::post('/updateProduct',['uses'=>'AdminController@updateProduct',
        'as'=>'adminUpdateProduct']
);

Route::post('/DeleteProduct',['uses'=>'AdminController@DeleteProduct',
        'as'=>'adminProductDelete']
);

Route::post('/UploadProduct',['uses'=>'AdminController@UploadProduct',
        'as'=>'adminProductUpload']
);

Route::get('/Admin/orders',['uses'=>'AdminController@ShowOrders',
        'as'=>'adminOrders']
);
Route::get('/Admin/user',['uses'=>'AdminController@ShowUser',
        'as'=>'adminUser']
);

Route::post('/DeleteUser',['uses'=>'UserController@DeleteUser',
        'as'=>'adminUserDelete']
);

Route::post('/DeleteOrder',['uses'=>'AdminController@DeleteOrder',
        'as'=>'adminOrderDelete']
);
Route::post('/OrderProduct',['uses'=>'AdminController@OrderProduct',
        'as'=>'adminOrderProduct']
);


Route::post('/UploadUser',['uses'=>'UserController@UploadUser',
        'as'=>'adminUpdateUser']
);



