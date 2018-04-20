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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/chat', 'ChatController@index')->middleware('auth')->name('chat.index');
// Route::get('/chat/{id}', 'ChatController@show')->middleware('auth')->name('chat.show');
// Route::post('/chat/getChat/{id}', 'ChatController@getChat')->middleware('auth');
// Route::post('/chat/sendChat', 'ChatController@sendChat')->middleware('auth');
Auth::routes();




Route::get('/index', 'indexController@index');
Route::get('/pagereset', 'passwordresetController@index');
Route::get('/passwordreset', 'passwordresetController@reset');

Route::get('/member&{id}', 'indexController@memberdetial');

Route::get('/newsdetail&{id}', 'indexController@detail');

Route::get('/blog', 'blogController@index');
Route::get('postblog', 'blogController@post_blog');

Route::get('/comment&{id}', 'commentsController@index');
Route::get('postcomment&{id}', 'commentsController@post_comment');

// -------------------------------admin-----------------------------

Route::get('dashboard', 'admin\controllerdashboard@index');

Route::get('/profileadmin', 'admin\controlleradmin@profile_admin');
Route::post('profileupdate&{id}', 'admin\controlleradmin@profile_update');

Route::post('/adminadd', 'admin\controlleradmin@admin_add');
Route::post('/memberadd', 'admin\controllermember@member_add');

Route::get('adminedit&{id}', 'admin\controlleradmin@admin_edit');
Route::post('adminupdate&{id}', 'admin\controlleradmin@admin_update');

Route::get('adminunblock&{id}', 'admin\controlleradmin@unblock');
Route::get('adminblock&{id}', 'admin\controlleradmin@block');

Route::get('admindelete&{id}', 'admin\controlleradmin@admin_delete');

Route::get('userchack&{id}', 'admin\Controllerchackmember@user_chack');
Route::get('userconfirm&{id}', 'admin\Controllerchackmember@user_confirm');


Route::get('/memberedit&{id}', 'admin\controllermember@showedit');
Route::post('memberupdate&{id}', 'admin\controllermember@member_update');

Route::get('memberunblock&{id}', 'admin\controllermember@unblock');
Route::get('memberblock&{id}', 'admin\controllermember@block');

Route::get('memberdelete&{id}', 'admin\controllermember@member_delete');

Route::get('news_detail&{id}', 'admin\controllernews@news_detailshow');
Route::post('addnews', 'admin\controllernews@add_news');

Route::get('menewsedit&{id}', 'admin\controllernews@news_editshow');
Route::post('editnews&{id}', 'admin\controllernews@edit_news');


Route::get('newsunblock&{id}', 'admin\controllernews@news_unblock');
Route::get('newsblock&{id}', 'admin\controllernews@news_block');
Route::get('newsdelete&{id}', 'admin\controllernews@news_delete');

Route::get('blogdetail&{id}', 'admin\controllerblog@blog_show');
Route::post('addblog', 'admin\controllerblog@add_blog');
Route::get('admin_blogedit&{id}', 'admin\controllerblog@blog_edit');
Route::post('admin_blogupdate&{id}', 'admin\controllerblog@admin_blogupdate');
Route::get('blog_del&{id}', 'admin\controllerblog@blog_delete');

Route::get('admincomments&{id}', 'admin\controllerblog@admin_comment');


Route::get('commentdeleteadmin&{id}', 'admin\controllerblog@comment_deleteadmin');


// -------------------------------admin-----------------------------



// -------------------------------member---------------------------
Route::get('memberdashboard', 'member\controllermemberdashboard@index');

Route::get('member_profile', 'member\controllermemberprofile@member_profile');
Route::post('member_updateprofile&{id}', 'member\controllermemberprofile@member_updateprofile');
Route::get('member_updatetake&{id}', 'member\controllermemberprofile@member_updatetake');

Route::get('member_listfriend', 'ChatController@list_friends');
Route::get('member_chat&{id}', 'ChatController@show')->middleware('auth')->name('member_chat.show');
Route::post('member_chat/getChat/{id}', 'ChatController@getChat')->middleware('auth');
Route::post('/chat/sendChat', 'ChatController@sendChat')->middleware('auth');


Route::post('addnews_member', 'member\controllernewsmember@add_news');
Route::get('member_newsdetail&{id}', 'member\controllernewsmember@news_detailshow');
Route::get('member_newsedit&{id}', 'member\controllernewsmember@news_editshow');
Route::post('member_newsupdate&{id}', 'member\controllernewsmember@edit_news');

Route::get('member_newsblock&{id}', 'member\controllernewsmember@news_block');
Route::get('member_newsunblock&{id}', 'member\controllernewsmember@news_unblock');
Route::get('member_newsdelete&{id}', 'member\controllernewsmember@news_delete');

Route::post('addblog_member', 'member\controllerblogmember@add_blog');
Route::get('member_blogdetail&{id}', 'member\controllerblogmember@blog_show');
Route::get('blogedit_member&{id}', 'member\controllerblogmember@blog_edit');
Route::post('memberblogupdate&{id}', 'member\controllerblogmember@member_blogupdate');


Route::get('membercomments&{id}', 'member\controllerblogmember@member_comment');
Route::get('blogdelete_member&{id}', 'member\controllerblogmember@blog_delete');
Route::get('commentdeletemember&{id}', 'member\controllerblogmember@comment_deletemember');
// -------------------------------/member---------------------------
