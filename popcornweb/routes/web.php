<?php

use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Route;
$prefixControllerAdmin='App\Http\Controllers\Admin';
$prefixControllerUser='App\Http\Controllers\Users';
//=============================Users=======================================
//=============================Trang chủ=======================================
// Route::get('/', function() {
//     return view('users.home.index');
// });


$controller=$prefixControllerUser.'\HomeController';
$method='@index';
Route::get('/',$controller.$method);

$prefix='/home';
Route::group(['prefix' => $prefix], function() use($prefixControllerUser) {
    $controller=$prefixControllerUser.'\HomeController';

    $method='@index';
    Route::get('/'                  ,['as' => 'home'            , 'uses' => $controller.$method]);
});
//=============================List=======================================

$prefix='/search';
Route::group(['prefix' => $prefix], function() use($prefixControllerUser) {
    $controller=$prefixControllerUser.'\SearchController';

    $method='@index';
    Route::get('/'                  ,['as' => 'search'        , 'uses' => $controller.$method]);
});
//=============================Danh sách=======================================

$prefix='/catalog';
Route::group(['prefix' => $prefix], function() use($prefixControllerUser) {
    $controller=$prefixControllerUser.'\CatalogController';

    $method='@index';
    Route::get('/'                  ,['as' => 'catalog'        , 'uses' => $controller.$method]);
    $method='@filter';
    Route::get('/filter'                  ,['as' => 'filter'        , 'uses' => $controller.$method]);
});

// //=============================Danh sách 1=======================================

// $prefix='/catalog1';
// Route::group(['prefix' => $prefix], function() use($prefixControllerUser) {
//     $controller=$prefixControllerUser.'\Catalog1Controller';

//     $method='@index';
//     Route::get('/'                  ,['as' => 'catalog1'        , 'uses' => $controller.$method]);
// });

// //=============================Danh sách 2=======================================
// $prefix='/catalog2';
// Route::group(['prefix' => $prefix], function() use($prefixControllerUser) {
//     $controller=$prefixControllerUser.'\Catalog2Controller';

//     $method='@index';
//     Route::get('/'                  ,['as' => 'catalog2'        , 'uses' => $controller.$method]);
// });

//=============================Gói mua=======================================

$prefix='/pricing';
Route::group(['prefix' => $prefix], function() use($prefixControllerUser) {
    $controller=$prefixControllerUser.'\PricingController';

    $method='@index';
    Route::get('/'                  ,['as' => 'pricing'         , 'uses' => $controller.$method]);

    $method='@resultpayment';
    Route::get('/resultpayment'                  ,['as' => 'resultpayment'         , 'uses' => $controller.$method]);


});

//=============================Trợ giúp=======================================

$prefix='/faq';
Route::group(['prefix' => $prefix], function() use($prefixControllerUser) {
    $controller=$prefixControllerUser.'\FaqController';

    $method='@index';
    Route::get('/'                  ,['as' => 'faq'             , 'uses' => $controller.$method]);
});

//=============================About=======================================

$prefix='/about';
Route::group(['prefix' => $prefix], function() use($prefixControllerUser) {
    $controller=$prefixControllerUser.'\AboutController';

    $method='@index';
    Route::get('/'                  ,['as' => 'about'           , 'uses' => $controller.$method]);
});

//=============================Đăng nhập=======================================

$prefix='/signin';
Route::group(['prefix' => $prefix], function() use($prefixControllerUser) {
    $controller=$prefixControllerUser.'\SignInController';

    $method='@index';
    Route::get('/'                  ,['as' => 'signin'          , 'uses' => $controller.$method]);

    $method='@auth';
    Route::post('/auth'                  ,['as' => 'auth'          , 'uses' => $controller.$method]);

    $method='@logout';
    Route::get('/logout'                  ,['as' => 'logout'          , 'uses' => $controller.$method]);
});

//=============================Đăng ký=======================================
$prefix='/signup';
Route::group(['prefix' => $prefix], function() use($prefixControllerUser) {
    $controller=$prefixControllerUser.'\SignUpController';

    $method='@index';
    Route::get('/'                  ,['as' => 'signup'          , 'uses' => $controller.$method]);

    $method='@create';
    Route::post('/create'     ,['as' => 'create'   , 'uses' => $controller.$method]);

});
//=============================404=======================================

$prefix='/404';
Route::group(['prefix' => $prefix], function() use($prefixControllerUser) {
    $controller=$prefixControllerUser.'\NotFoundController';

    $method='@index';
    Route::get('/'                  ,['as' => '404'             , 'uses' => $controller.$method]);
});
//=============================Detail=======================================
$prefix='/detail';
Route::group(['prefix' => $prefix], function() use($prefixControllerUser) {
    $controller=$prefixControllerUser.'\DetailController';

    $method='@index';
    Route::get('/{phim_id}'                  ,['as' => 'detail'         , 'uses' => $controller.$method]);
    $method='@writingreview';
    Route::post('/writingreview'                  ,['as' => 'writingreview'         , 'uses' => $controller.$method]);
    $method='@editreview';
    Route::post('/editreview'                  ,['as' => 'editreview'         , 'uses' => $controller.$method]);
    $method='@deletereview';
    Route::post('/deletereview'                  ,['as' => 'deletereview'         , 'uses' => $controller.$method]);

    $method='@love';
    Route::post('/love'                  ,['as' => 'love'         , 'uses' => $controller.$method]);
    $method='@unlove';
    Route::post('/unlove'                  ,['as' => 'unlove'         , 'uses' => $controller.$method]);

    $method='@report';
    Route::post('/report'                  ,['as' => 'report'         , 'uses' => $controller.$method]);


});
//=============================Info=======================================

$prefix='/info';
Route::group(['prefix' => $prefix], function() use($prefixControllerUser) {
    $controller=$prefixControllerUser.'\InfoController';

    $method='@index';
    Route::get('/'                  ,['as' => 'info'             , 'uses' => $controller.$method]);

    $method='@changepass';
    Route::post('/changepass'        ,['as' => 'changepass'       , 'uses' => $controller.$method]);

    $method='@changeinfo';
    Route::post('/changeinfo'        ,['as' => 'changeinfo'       , 'uses' => $controller.$method]);

    $method='@changeavt';
    Route::post('/changeavt'        ,['as' => 'changeavt'       , 'uses' => $controller.$method]);

    $method='@deleteavt';
    Route::post('/deleteavt'        ,['as' => 'deleteavt'       , 'uses' => $controller.$method]);

    $method='@deleteaccount';
    Route::post('/deleteaccount'        ,['as' => 'deleteaccount'       , 'uses' => $controller.$method]);



});
//=============================Loving Film=======================================

$prefix='/lovingfilm';
Route::group(['prefix' => $prefix], function() use($prefixControllerUser) {
    $controller=$prefixControllerUser.'\LovingFilmController';

    $method='@index';
    Route::get('/'                  ,['as' => 'lovingfilm'             , 'uses' => $controller.$method]);

});

//=============================Transaction=======================================

$prefix='/transaction';
Route::group(['prefix' => $prefix], function() use($prefixControllerUser) {
    $controller=$prefixControllerUser.'\TransactionController';

    $method='@index';
    Route::get('/'                  ,['as' => 'transaction'             , 'uses' => $controller.$method]);

});


//=============================Fogotpass=======================================

$prefix='/forgot';
Route::group(['prefix' => $prefix], function() use($prefixControllerUser) {
    $controller=$prefixControllerUser.'\ForgotController';

    $method='@index';
    Route::get('/'                  ,['as' => 'forgot'             , 'uses' => $controller.$method]);

});


//=============================Detail1=======================================
// $prefix='/detail1';
// Route::group(['prefix' => $prefix], function() use($prefixControllerUser) {
//     $controller=$prefixControllerUser.'\Detail1Controller';

//     $method='@index';
//     Route::get('/{phim_id}'                  ,['as' => 'detail1'         , 'uses' => $controller.$method]);
// });

//=============================Detail2=======================================
// $prefix='/detail2';
// Route::group(['prefix' => $prefix], function() use($prefixControllerUser) {
//     $controller=$prefixControllerUser.'\Detail2Controller';

//     $method='@index';
//     Route::get('/'                  ,['as' => 'detail2'         , 'uses' => $controller.$method]);
// });
//=============================VN PAY=======================================
$controller=$prefixControllerUser.'\PaymentController';
$method='@payment';
Route::get('https://sandbox.vnpayment.vn/paymentv2/vpcpay.html',['as' => 'payment'         , 'uses' => $controller.$method]);


$method='@return';
Route::get('/return-vnpay' ,['as' => 'return'         , 'uses' => $controller.$method]);

//=============================Send mail=======================================
$controller=$prefixControllerUser.'\MailController';
$method='@send';
Route::post('mail/send',['as' => 'sendmail'         , 'uses' => $controller.$method]);

$method='@confirmtoken';
Route::get('mail/confirmtoken',['as' => 'confirmtoken'         , 'uses' => $controller.$method]);

$method='@resetpassword';
Route::post('mail/resetpassword',['as' => 'resetpassword'         , 'uses' => $controller.$method]);

//=============================Admin=======================================
$prefix='/admin';
Route::group(['prefix' => $prefix], function() use($prefixControllerAdmin) {
    //=============================Dashboard=======================================
    $controller=$prefixControllerAdmin.'\DashboardController';
    $method='@index';
    Route::get('/dashboard'         ,['as' => 'admindashboard'       , 'uses' => $controller.$method]);

    $controller=$prefixControllerAdmin.'\SignInController';

    $method='@index';
    Route::get('/'            ,['as' => 'adminsignin'          , 'uses' => $controller.$method]);



    //Add item
    // $method='@additem';
    // Route::get('/additem'           ,['as' => 'adminadditem'         , 'uses' => $controller.$method]);

    // $method='@addnew';
    // Route::post('/addnew'           ,['as' => 'adminaddnew'         , 'uses' => $controller.$method]);

    //=============================Statistical=======================================
    $controller=$prefixControllerAdmin.'\StatisticalController';
    $method='@index';
    Route::get('/statistical'         ,['as' => 'adminstatistical'       , 'uses' => $controller.$method]);

    $method='@statisticalfilter';
    Route::get('/statisticalfilter'         ,['as' => 'adminstatisticalfilter'       , 'uses' => $controller.$method]);
    //=============================View=======================================
    $controller=$prefixControllerAdmin.'\ViewController';
    $method='@index';
    Route::get('/view'         ,['as' => 'adminview'       , 'uses' => $controller.$method]);

    $method='@viewfilter';
    Route::get('/viewfilter'         ,['as' => 'adminviewfilter'       , 'uses' => $controller.$method]);



    //=============================Catalog=======================================
    $controller=$prefixControllerAdmin.'\CatalogController';

    $method='@index';
    Route::get('/catalog'           ,['as' => 'admincatalog'         , 'uses' => $controller.$method]);

    $method='@catalogedit';
    Route::get('/catalogedit/{phim_id}'           ,['as' => 'admincatalogedit'         , 'uses' => $controller.$method]);

    $method='@catalogedited';
    Route::post('/catalogedited'           ,['as' => 'admincatalogedited'         , 'uses' => $controller.$method]);

    $method='@changeposter';
    Route::post('/changeposter'           ,['as' => 'adminchangeposter'         , 'uses' => $controller.$method]);

    $method='@filmfind';
    Route::get('/filmfind'           ,['as' => 'adminfilmfind'         , 'uses' => $controller.$method]);

    $method='@filmnamesort';
    Route::get('/filmnamesort'           ,['as' => 'adminfilmnamesort'         , 'uses' => $controller.$method]);

    $method='@filmdatesort';
    Route::get('/filmdatesort'           ,['as' => 'adminfilmdatesort'         , 'uses' => $controller.$method]);

    $method='@filmstatussort';
    Route::get('/filmstatussort'           ,['as' => 'adminfilmstatussort'         , 'uses' => $controller.$method]);

    $method='@filmimdbsort';
    Route::get('/filmimdbsort'           ,['as' => 'adminfilmimdbsort'         , 'uses' => $controller.$method]);


    $method='@filmlock';
    Route::post('/filmlock'           ,['as' => 'adminfilmlock'         , 'uses' => $controller.$method]);

    $method='@filmunlock';
    Route::post('/filmunlock'           ,['as' => 'adminfilmunlock'         , 'uses' => $controller.$method]);

    $method='@deletefilm';
    Route::post('/deletefilm'           ,['as' => 'admindeletefilm'         , 'uses' => $controller.$method]);
    //=============================Add movie=======================================
    $controller=$prefixControllerAdmin.'\AddMovieController';

    $method='@index';
    Route::get('/addmovie'           ,['as' => 'adminaddmovie'         , 'uses' => $controller.$method]);

    $method='@uploadmovie';
    Route::post('/uploadmovie'           ,['as' => 'adminuploadmovie'         , 'uses' => $controller.$method]);





    //=============================Add TV show=======================================
    $controller=$prefixControllerAdmin.'\AddTVShowController';

    $method='@index';
    Route::post('/addtvshow'           ,['as' => 'adminaddtvshow'         , 'uses' => $controller.$method]);

    $method='@uploadtvshow';
    Route::post('/uploadtvshow'           ,['as' => 'adminuploadtvshow'         , 'uses' => $controller.$method]);

    //=============================UserAccount=======================================
    $controller=$prefixControllerAdmin.'\UserAccountController';

    $method='@index';
    Route::get('/useraccount'             ,['as' => 'adminuseraccount'           , 'uses' => $controller.$method]);
    $method='@userfind';
    Route::get('/userfind'             ,['as' => 'adminuserfind'           , 'uses' => $controller.$method]);

    $method='@useridsort';
    Route::get('/useridsort'             ,['as' => 'adminuseridsort'           , 'uses' => $controller.$method]);

    $method='@usernamesort';
    Route::get('/usernamesort'             ,['as' => 'adminusernamesort'           , 'uses' => $controller.$method]);

    $method='@userstatussort';
    Route::get('/userstatussort'             ,['as' => 'adminuserstatussort'           , 'uses' => $controller.$method]);
    //Edit user
    // $method='@useredit';
    // Route::get('/useredit'          ,['as' => 'adminuseredit'        , 'uses' => $controller.$method]);

    $method='@userlock';
    Route::post('/userlock'          ,['as' => 'adminuserlock'        , 'uses' => $controller.$method]);

    $method='@userunlock';
    Route::post('/userunlock'          ,['as' => 'adminuserunlock'        , 'uses' => $controller.$method]);


    //=============================StaffAccount=======================================
    $controller=$prefixControllerAdmin.'\StaffAccountController';

    $method='@index';
    Route::get('/staffaccount'             ,['as' => 'adminstaffaccount'           , 'uses' => $controller.$method]);

    $method='@staffidsort';
    Route::get('/staffidsort'             ,['as' => 'adminstaffidsort'           , 'uses' => $controller.$method]);

    $method='@staffnamesort';
    Route::get('/staffnamesort'             ,['as' => 'adminstaffnamesort'           , 'uses' => $controller.$method]);

    $method='@staffstatussort';
    Route::get('/staffstatussort'             ,['as' => 'adminstaffstatussort'           , 'uses' => $controller.$method]);

    $method='@stafffind';
    Route::get('/stafffind'             ,['as' => 'adminstafffind'           , 'uses' => $controller.$method]);

    $method='@staffedit';
    Route::get('/staffedit/{quantri_id}'          ,['as' => 'adminstaffedit'        , 'uses' => $controller.$method]);

    $method='@staffedited';
    Route::post('/staffedited'          ,['as' => 'adminstaffedited'        , 'uses' => $controller.$method]);

    $method='@staffchangepass';
    Route::post('/staffchangepass'          ,['as' => 'adminstaffchangepass'        , 'uses' => $controller.$method]);

    $method='@stafflock';
    Route::post('/stafflock'          ,['as' => 'adminstafflock'        , 'uses' => $controller.$method]);

    $method='@staffunlock';
    Route::post('/staffunlock'          ,['as' => 'adminstaffunlock'        , 'uses' => $controller.$method]);

    $method='@staffdelete';
    Route::post('/staffdelete'          ,['as' => 'adminstaffdelete'        , 'uses' => $controller.$method]);



    //=============================Comments=======================================
    // $controller=$prefixControllerAdmin.'\CommentsController';

    // $method='@index';
    // Route::get('/comments'          ,['as' => 'admincomments'         , 'uses' => $controller.$method]);

    //=============================Reviews=======================================
    $controller=$prefixControllerAdmin.'\ReviewsController';

    $method='@index';
    Route::get('/reviews'          ,['as' => 'adminreviews'           , 'uses' => $controller.$method]);

    $method='@findreview';
    Route::get('/findreview'          ,['as' => 'adminfindreview'           , 'uses' => $controller.$method]);

    $method='@datereview';
    Route::get('/datereview'          ,['as' => 'admindatereview'           , 'uses' => $controller.$method]);

    $method='@ratereview';
    Route::get('/ratereview'          ,['as' => 'adminratereview'           , 'uses' => $controller.$method]);

    $method='@deletereview';
    Route::post('/deletereview'          ,['as' => 'admindeletereview'           , 'uses' => $controller.$method]);
    //=============================Sign in=======================================
    $controller=$prefixControllerAdmin.'\SignInController';

    $method='@index';
    Route::get('/signin'            ,['as' => 'adminsignin'          , 'uses' => $controller.$method]);

    $method='@auth';
    Route::post('/auth'                  ,['as' => 'adminauth'       , 'uses' => $controller.$method]);

    $method='@logout';
    Route::get('/logout'                  ,['as' => 'adminlogout'          , 'uses' => $controller.$method]);

    //=============================Sign up=======================================
    $controller=$prefixControllerAdmin.'\SignUpController';

    $method='@index';
    Route::get('/signup'            ,['as' => 'adminsignup'          , 'uses' => $controller.$method]);

    $method='@create';
    Route::post('/create'     ,['as' => 'admincreate'   , 'uses' => $controller.$method]);

    //=============================Forgot=======================================
    $controller=$prefixControllerAdmin.'\ForgotController';

    $method='@index';
    Route::get('/forgot'            ,['as' => 'adminforgot'          , 'uses' => $controller.$method]);

    //=============================404=======================================
    $controller=$prefixControllerAdmin.'\NotFoundController';

    $method='@index';
    Route::get('/404'                  ,['as' => 'admin404'             , 'uses' => $controller.$method]);



});


