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


Route::get('admin/login','admin\userController@getLoginAdmin');
Route::post('admin/login','admin\userController@postLoginAdmin');
//logout
Route::get('admin/logout','admin\userController@getLogoutAdmin');

Route::group(['prefix' => 'admin','middleware'=>'adminLogin'], function() {

	//index
    Route::get('/','admin\indexController@index');
    Route::get('index','admin\indexController@index');
    
    //user
    Route::group(['prefix' => 'user'], function()
    {
        Route::get('list','admin\userController@listUser');
        //thêm
        Route::get('add','admin\userController@getAdd');
        Route::post('add','admin\userController@postAdd');
        //sửa
        Route::get('edit/{id}','admin\userController@getEdit');
        Route::post('edit/{id}','admin\userController@postEdit');
        // delete
        Route::get('delete/{id}','admin\userController@getDelete');
    });

    //category
    Route::group(['prefix' => 'category'], function()
    {
        Route::get('list','admin\categoryController@listCategory');
        // thêm
        Route::get('add','admin\categoryController@getAdd');
        Route::post('add','admin\categoryController@postAdd');
        //sửa
        Route::get('edit/{id}','admin\categoryController@getEdit');
        Route::post('edit/{id}','admin\categoryController@postEdit');
        // xóa
        Route::get('delete/{id}','admin\categoryController@getDelete');

    });

    // sub category 
    Route::group(['prefix' => 'sub-category'], function()
    {
        Route::get('list','admin\sub_cateController@listSubcate');
        // thêm
        Route::get('add','admin\sub_cateController@getAdd');
        Route::post('add','admin\sub_cateController@postAdd');
        //sửa
        Route::get('edit/{id}','admin\sub_cateController@getEdit');
        Route::post('edit/{id}','admin\sub_cateController@postEdit');
        // xóa
        Route::get('delete/{id}','admin\sub_cateController@getDelete');
    });

    //brand
    Route::group(['prefix' => 'brand'], function()
    {
        Route::get('list','admin\brandController@listBrand');
        //thêm
        Route::get('add','admin\brandController@getAdd');
        Route::post('add','admin\brandController@postAdd');
        //sửa
        Route::get('edit/{id}','admin\brandController@getEdit');
        Route::post('edit/{id}','admin\brandController@postEdit');
        //delete
        Route::get('delete/{id}','admin\brandController@getDelete');
    });

    // product
    Route::group(['prefix' => 'product'], function()
    {
        Route::get('list','admin\productController@listProduct');
        // thêm
        Route::get('add','admin\productController@getAdd');
        Route::post('add','admin\productController@postAdd');
        // sửa
        Route::get('edit/{id}','admin\productController@getEdit');
        Route::post('edit/{id}','admin\productController@postEdit');
        //xóa
        Route::get('delete/{id}','admin\productController@getDelete');
    });

    //load ajax
    Route::group(['prefix' => 'ajax'], function() {
        Route::get('subcate/{idCate}','admin\ajaxController@getSubcate');
    });

    // slide
    Route::group(['prefix' => 'slide'], function()
    {
        Route::get('list','admin\slideController@listSlide');
        // add
        Route::get('add','admin\slideController@getAdd');
        Route::post('add','admin\slideController@postAdd');
        // edit
        Route::get('edit/{id}','admin\slideController@getEdit');
        Route::post('edit/{id}','admin\slideController@postEdit');
        //delete
        Route::get('delete/{id}','admin\slideController@getDelete');
    });
   	
    // slide ads
    Route::group(['prefix' => 'slide-ads'], function()
    {
        Route::get('list','admin\adverController@listSlideAds');
        // add
        Route::get('add','admin\adverController@getAdd');
        Route::post('add','admin\adverController@postAdd');
        // edit
        Route::get('edit/{id}','admin\adverController@getEdit');
        Route::post('edit/{id}','admin\adverController@postEdit');
        //delete
        Route::get('delete/{id}','admin\adverController@getDelete');
    });
   	

    // footer
    Route::group(['prefix' => 'footer'], function()
    {
        Route::get('list','admin\footerController@listFooter');
         // thêm
        Route::get('add','admin\footerController@getAdd');
        Route::post('add','admin\footerController@postAdd');
        //sửa
        Route::get('edit/{id}','admin\footerController@getEdit');
        Route::post('edit/{id}','admin\footerController@postEdit');
        // xóa
        Route::get('delete/{id}','admin\footerController@getDelete');
    });

    // sub footer
    Route::group(['prefix' => 'sub-footer'], function()
    {
        Route::get('list','admin\sub_footerController@listSubFooter');
        // thêm
        Route::get('add','admin\sub_footerController@getAdd');
        Route::post('add','admin\sub_footerController@postAdd');
        //sửa
        Route::get('edit/{id}','admin\sub_footerController@getEdit');
        Route::post('edit/{id}','admin\sub_footerController@postEdit');
        // xóa
        Route::get('delete/{id}','admin\sub_footerController@getDelete');
    });
    // blog
    Route::group(['prefix' => 'blog'], function()
    {
        Route::get('list','admin\blogController@listBlog');

        //add
        Route::get('add','admin\blogController@getAdd');
        Route::post('add','admin\blogController@postAdd');
        //edit
        Route::get('edit/{id}','admin\blogController@getEdit');
        Route::post('edit/{id}','admin\blogController@postEdit');
        // delete
        Route::get('delete/{id}','admin\blogController@getDelete');
    });
    //comment
    Route::group(['prefix' => 'comment-blog'], function()
    {
        Route::get('list','admin\commentBlogController@listComBlog');

        //add
        Route::get('add','admin\commentBlogController@getAdd');
        Route::post('add','admin\commentBlogController@postAdd');
        //edit
        Route::get('edit/{id}','admin\commentBlogController@getEdit');
        Route::post('edit/{id}','admin\commentBlogController@postEdit');
        // delete
        Route::get('delete/{id}','admin\commentBlogController@getDelete');
    });

    Route::group(['prefix' => 'comment-product'], function()
    {
        Route::get('list','admin\commentProductController@listComPro');

        //add
        Route::get('add','admin\commentProductController@getAdd');
        Route::post('add','admin\commentProductController@postAdd');
        //edit
        Route::get('edit/{id}','admin\commentProductController@getEdit');
        Route::post('edit/{id}','admin\commentProductController@postEdit');
        // delete
        Route::get('delete/{id}','admin\commentProductController@getDelete');
    });
    // customer
    Route::group(['prefix' => 'customer'], function() {
        Route::get('list','admin\customerController@listCustomer');

        Route::get('chuagiao','admin\customerController@chuagiao');
        Route::get('dagiao','admin\customerController@dagiao');
        Route::get('detail/{id}','admin\customerController@detailCustomer');
        Route::post('detail/{id}','admin\customerController@postdetailCustomer');
        Route::get('delete/{id}','admin\customerController@deleteCustomer');

    });
    // icons
    Route::get('icons.html', function() {
        return view('admin.layouts.icons');
    });
    //charts and thống kê
    Route::group(['prefix' => 'chart'], function() {
        Route::get('list.html','admin\chartController@chart');
        Route::get('day.html','admin\chartController@day');
        Route::get('week.html','admin\chartController@week');
        Route::get('month.html','admin\chartController@month');
        Route::get('year.html','admin\chartController@year');
        //test chart
        Route::get('test','admin\chartController@testchart');
        // ajax thống kê
        Route::post('day.html','admin\chartController@postday');
    });
});




// FONT-END
// home
Route::get('/','PagesController@home');
Route::get('home','PagesController@home');
Route::get('index.html','PagesController@home');
// product
Route::get('product.html','PagesController@product');
// product detail
Route::get('product-detail/{tenkodau}-{id}.html','PagesController@product_detail')->where(array('tenkodau' => '[0-9a-zA-Z_-]+', 'id' => '[0-9]+') );
//category
Route::get('category/{tenkodau}-{id}.html','PagesController@category')->where(array('tenkodau' => '[0-9a-zA-Z_-]+', 'id' => '[0-9]+') );

//brand
Route::get('brand/{tenkodau}-{id}.html','PagesController@brand')->where(array('tenkodau' => '[0-9a-zA-Z_-]+', 'id' => '[0-9]+') );
//load ajax
Route::get('load-img/{Images}','AjaxController@getImages');


// login sign-in
Route::get('login.html','PagesController@getLogin');
Route::post('login.html','PagesController@postLogin');
// sign up
Route::post('signup.html','PagesController@postSignup');
//already there after laravel auth scaffold
//Route::get('auth/register', 'Auth\RegisterController@getRegister');
//Route::post('auth/register', 'Auth\RegisterController@postRegister');

//edit profile
Route::get('profile.html','PagesController@getProfile');
Route::post('profile.html','PagesController@postProfile');

// myorder
Route::get('myorder.html','PagesController@getOrder');
Route::post('myorder.html','PagesController@postOrder');
// order-detail
Route::get('myorder/view-{id}.html','PagesController@getViewOrder')->where('id','[0-9a-zA-Z_-]+');
// hủy đơn hàng
Route::get('myorder/delete-{id}.html','PagesController@getDeleteOrder')->where('id','[0-9a-zA-Z_-]+');
// logout
Route::get('logout.html','PagesController@logout');

// blog
Route::get('blog.html','PagesController@blog');
// blog detail

Route::get('blog-detail/{tenkodau}-{id}.html','PagesController@blog_detail')->where(array('tenkodau' => '[0-9a-zA-Z_-]+', 'id' => '[0-9]+') );


Route::get('contact.html', function() {
    return view('pages.contact');
});

// comment blog
Route::post('blog-detail/{tenkodau}-{id}.html','PagesController@commentBlog')->where(array('tenkodau' => '[0-9a-zA-Z_-]+', 'id' => '[0-9]+') );
// comment product
Route::post('product-detail/{tenkodau}-{id}.html','PagesController@commentProduct')->where(array('tenkodau' => '[0-9a-zA-Z_-]+', 'id' => '[0-9]+') );

//buy
Route::get('buy/{tenkodau}-{id}.html','PagesController@buy')->where(array('tenkodau' => '[0-9a-zA-Z_-]+', 'id' => '[0-9]+') );
// buy product-detail
Route::post('buy-product/{tenkodau}-{id}.html','PagesController@buyProduct')->where(array('tenkodau' => '[0-9a-zA-Z_-]+', 'id' => '[0-9]+') );;
// cart
Route::get('cart.html','PagesController@cart')->where(array('tenkodau' => '[0-9a-zA-Z_-]+', 'id' => '[0-9]+') );
// update cart
Route::post('update','AjaxController@update');

// delete product in cart
Route::get('delete/{id}.html','PagesController@delete')->where('id','[0-9a-zA-Z_-]+');

//delete all product in cart
Route::get('delete-cart.html','PagesController@deleteAll');

// checkout
Route::get('checkout.html','PagesController@checkout');
Route::post('checkout.html','PagesController@postcheckout');

// contact
Route::get('contact.html','PagesController@getContact');
Route::post('contact.html','MailController@postContact');

// ajax product
Route::post('product.html','PagesController@postProduct');
// ajax brand
Route::post('brand.html','PagesController@postBrand');
// ajax category
Route::post('category.html','PagesController@postCategory');
// search
Route::any('search','PagesController@search');