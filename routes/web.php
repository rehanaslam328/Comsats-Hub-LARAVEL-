<?php
Route::group(['middleware'=>['auth']],function(){




    Route::get('/', function () {
        return view('auth.index-register');
    });



    Route::get('/home', 'HomeController@index')->name('home');




    Route::get('admin/index','Admin\AdminController@index')->name('admin');
    Route::get('admin/ads','Admin\AdminController@ads');
    Route::get('admin/acadpost','Admin\AdminController@academicpost');
    Route::get('admin/genpost','Admin\AdminController@generalpost');




// roles
    Route::get('role/index','Admin\RoleController@index');
    Route::get('role/create','Admin\RoleController@create');
    Route::post('role/save','Admin\RoleController@store')->name('saverole');
    Route::get('role/show/{id}','Admin\RoleController@show');
    Route::get('role/edit/{id}','Admin\RoleController@edit');
    Route::post('/role/update/','Admin\RoleController@update')->name('update');
    Route::get('/role/delete/{id}','Admin\RoleController@destroy');

//users
    Route::group(['middleware' => ['role:admin']], function() {

    Route::get('user/index','Admin\UserController@index');
    Route::get('user/create','Admin\UserController@create');
    Route::post('user/save','Admin\UserController@store')->name('saveuser');
    Route::get('user/show/{id}','Admin\UserController@show');
    Route::get('user/edit/{id}','Admin\UserController@edit');
    Route::post('user/update','Admin\UserController@update')->name('userupdate');
    Route::get('user/delete/{id}','Admin\UserController@destroy');
});
    Route::get('/admin/ads/delete/{id}','Admin\AdsController@deleteAd');
// ads

    Route::get('ads/index','Ads\AdsController@index');
    Route::get('ads/create','Ads\AdsController@create');
    Route::post('ads/save','Ads\AdsController@store')->name('adsave');
    Route::get('ads/show/{id}','Ads\AdsController@show');
    Route::get('ads/edit/{id}','Ads\AdsController@edit');
    Route::post('ads/update','Ads\AdsController@update')->name('adupdate');
    Route::get('ads/delete/{id}','Ads\AdsController@destroy');
    Route::get('ads/count','Ads\AdsController@count');

// Academic Posts
    Route::get('/admin/academicpost/delete/{id}','Admin\AdminController@deleteAcademicPost');

    Route::get('AcadPost/index','AcademicPosts\AcademicPostController@index');
    Route::get('AcadPost/create','AcademicPosts\AcademicPostController@create');
    Route::post('AcadPost/send','AcademicPosts\AcademicPostController@store')->name('acadsave');
    Route::post('AcadPost/serach','AcademicPosts\AcademicPostController@search')->name('searchacademicposts');
    Route::get('AcadPost/show/{id}','AcademicPosts\AcademicPostController@show');
    Route::get('AcadPost/edit/{id}','AcademicPosts\AcademicPostController@edit');
    Route::post('AcadPost/update','AcademicPosts\AcademicPostController@update')->name('acadupdate');
    Route::get('AcadPost/delete/{id}','AcademicPosts\AcademicPostController@destroy');
    Route::get('/Acadpost/pdf-downlaod/{id}','AcademicPosts\AcademicPostController@download');
    Route::get('/Acadpost/word-downlaod/{id}','AcademicPosts\AcademicPostController@download');


 // Academic post comment

    Route::post('AcadPost/save','AcademicPosts\AcademicPostController@storeComment')->name('savecomment');
    Route::get('AcadPostComment/edit/{id}','AcademicPosts\AcademicPostController@editComment');
    Route::post('AcadPostComment/update','AcademicPosts\AcademicPostController@updateComment')->name('editcomment');
    Route::get('AcadPostComment/delete/{id}','AcademicPosts\AcademicPostController@destroyComment');



// General posts

    Route::get('/index','GeneralPost\GeneralPostController@index')->name('user');
    Route::get('/pictures','GeneralPost\GeneralPostController@getImages');
    Route::get('/gen/videos','GeneralPost\GeneralPostController@getVideos');
    Route::get('/sitemap','GeneralPost\GeneralPostController@siteMap');

    Route::get('GenPost/create','GeneralPost\GeneralPostController@create');
    Route::post('GenPost/save','GeneralPost\GeneralPostController@store')->name('gensave');
    Route::get('GenPost/show/{id}','GeneralPost\GeneralPostController@show');
    Route::get('GenPost/edit/{id}','GeneralPost\GeneralPostController@edit');
    Route::post('GenPost/update','GeneralPost\GeneralPostController@update')->name('generalupdate');
    Route::get('GenPost/delete/{id}','GeneralPost\GeneralPostController@destroy');


// General post comment

    Route::post('GenPost/send','GeneralPost\GeneralPostController@storeGeneralComment')->name('savegeneralcomment');
    Route::get('GenPost/edit/comment//{id}','GeneralPost\GeneralPostController@editGeneralComment');
    Route::post('GenPost/update','GeneralPost\GeneralPostController@updateGeneralComment')->name('generalcommentupdate');
    Route::get('GenPost/delete/comment/{id}','GeneralPost\GeneralPostController@destroyGeneralComment');




    Route::get('/index/profile/create',function(){

        return view('front-view.profile.createprofilephoto');
    });
    Route::get('/index/profile','Profile\ProfileController@index');
    Route::get('/profile/photo','Profile\ProfileController@uploadProfilePhoto');
    Route::post('/profile/photo/save','Profile\ProfileController@uploadProfilePhotoSave')->name('profilephotosave');
    Route::get('/index/profile/ads','Profile\ProfileController@profileAds');
    Route::get('/index/profile/about','Profile\AboutController@profileAbout');
    Route::get('/about/edit','Profile\AboutController@editProfile');

    });


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

Auth::routes();













































