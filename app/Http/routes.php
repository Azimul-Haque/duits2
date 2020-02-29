<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/clear', ['as'=>'clear','uses'=>'IndexController@clear']);

// index routes
// index routes
Route::get('/', ['as'=>'index.index','uses'=>'IndexController@index']);
Route::get('/journey', ['as'=>'index.journey','uses'=>'IndexController@getJourney']);
Route::get('/constitution', ['as'=>'index.constitution','uses'=>'IndexController@getConstitution']);
Route::get('/faq', ['as'=>'index.faq','uses'=>'IndexController@getFaq']);
Route::get('/committee/{committeetype_id}', ['as'=>'index.committee','uses'=>'IndexController@getCommittee']);
Route::get('/adhoc', ['as'=>'index.adhoc','uses'=>'IndexController@getAdhoc']);
Route::get('/executive', ['as'=>'index.executive','uses'=>'IndexController@getExecutive']);
Route::get('/news', ['as'=>'index.news','uses'=>'IndexController@getNews']);
Route::get('/events', ['as'=>'index.events','uses'=>'IndexController@getEvents']);
Route::get('/gallery', ['as'=>'index.gallery','uses'=>'IndexController@getGallery']);
Route::get('/members', ['as'=>'index.members','uses'=>'IndexController@getMembers']);
Route::get('/contact', ['as'=>'index.contact','uses'=>'IndexController@getContact']);
Route::post('/contact/form/message/store', ['as'=>'index.storeformmessage','uses'=>'IndexController@storeFormMessage']);
Route::get('/member/login', ['as'=>'index.login','uses'=>'IndexController@getLogin']);
Route::get('/member/profile/{unique_key}', ['as'=>'index.profile','uses'=>'IndexController@getProfile']);
Route::post('/member/application/store', ['as'=>'index.storeapplication','uses'=>'IndexController@storeApplication']);
Route::get('/notice', ['as'=>'index.notice','uses'=>'IndexController@getNotice']);
Route::get('/gallery', ['as'=>'index.gallery','uses'=>'IndexController@getGallery']);
Route::get('/gallery/{id}/single', ['as'=>'index.gallery.single','uses'=>'IndexController@getSingleGalleryAlbum']);

Route::get('/application', ['as'=>'index.application','uses'=>'IndexController@getApplication']);
Route::post('/application/store', ['as'=>'application.store','uses'=>'IndexController@storeITFestApplication']);
Route::get('/application/payorcheck/{registration_id}', ['as'=>'application.payorcheck','uses'=>'IndexController@getPayorCheck']);
Route::get('/application/application/{registration_id}', ['as'=>'application.printreceipt','uses'=>'IndexController@getPrintReceipt']);

Route::post('payment/success', 'PaymentController@paymentSuccessOrFailed')->name('payment.success');
Route::post('payment/failed', 'PaymentController@paymentSuccessOrFailed')->name('payment.failed');
Route::post('payment/cancel', 'PaymentController@paymentSuccessOrFailed')->name('payment.cancel');

Route::get('/ongoingactivities/recruitment', 'IndexController@getRecruitmentApplication')->name('ongoingactivities.recruitment');
Route::post('/ongoingactivities/recruitment/store', 'IndexController@storeRecruitmentApplication')->name('ongoingactivities.recruitment.store');
Route::get('/ongoingactivities/recruitment/{member_id}', 'IndexController@getNewApplicant')->name('ongoingactivities.recruitment.newapplicant');
// index routes
// index routes

// blog routes
// blog routes
Route::resource('blogs','BlogController');
Route::get('blog/{slug}',['as' => 'blog.single', 'uses' => 'BlogController@getBlogPost']);
Route::get('blogger/profile/{unique_key}',['as' => 'blogger.profile', 'uses' => 'BlogController@getBloggerProfile']);
Route::get('/like/{user_id}/{blog_id}',['as' => 'blog.like', 'uses' => 'BlogController@likeBlogAPI']);
Route::get('/check/like/{user_id}/{blog_id}',['as' => 'blog.checklike', 'uses' => 'BlogController@checkLikeAPI']);
Route::get('/category/{name}',['as' => 'blog.categorywise', 'uses' => 'BlogController@getCategoryWise']);
Route::get('/archive/{date}',['as' => 'blog.monthwise', 'uses' => 'BlogController@getMonthWise']);
// blog routes
// blog routes

Auth::routes();

// dashboard routes
// dashboard routes
Route::resource('users','UserController');
Route::get('/dashboard', ['as'=>'dashboard.index','uses'=>'DashboardController@index']);
Route::get('/dashboard/committee', ['as'=>'dashboard.committee','uses'=>'DashboardController@getCommittee']);
Route::post('/dashboard/committee', ['as'=>'dashboard.storecommittee','uses'=>'DashboardController@storeCommittee']);
Route::put('/dashboard/committee/{id}', ['as'=>'dashboard.updatecommittee','uses'=>'DashboardController@updateCommittee']);
Route::delete('/dashboard/committee/{id}', ['as'=>'dashboard.deletecommittee','uses'=>'DashboardController@deleteCommittee']);

Route::get('/dashboard/news', ['as'=>'dashboard.news','uses'=>'DashboardController@getNews']);
Route::get('/dashboard/events', ['as'=>'dashboard.events','uses'=>'DashboardController@getEvents']);
Route::get('/dashboard/blogs', ['as'=>'dashboard.blogs','uses'=>'DashboardController@getBlogs']);
Route::get('/dashboard/members', ['as'=>'dashboard.members','uses'=>'DashboardController@getMembers']);
Route::delete('/dashboard/deletemember/{id}', ['as'=>'dashboard.deletemember','uses'=>'DashboardController@deleteMember']);
Route::get('/dashboard/applications', ['as'=>'dashboard.applications','uses'=>'DashboardController@getApplications']);
Route::get('/dashboard/applications/pdf', ['as'=>'dashboard.applications.pdf','uses'=>'DashboardController@getApplicationsPDF']);

// eita member add er jonno kora, change hobe
Route::patch('/dashboard/applications/{id}/approve', ['as'=>'dashboard.approveapplication','uses'=>'DashboardController@approveApplication']);
Route::delete('/dashboard/application/{id}', ['as'=>'dashboard.deleteapplication','uses'=>'DashboardController@deleteApplication']);

Route::get('/dashboard/notice', ['as'=>'dashboard.notice','uses'=>'DashboardController@getNotice']);
Route::post('/dashboard/notice/store', ['as'=>'dashboard.storenotice','uses'=>'DashboardController@storeNotice']);
Route::put('/dashboard/notice/{id}/update', ['as'=>'dashboard.updatenotice','uses'=>'DashboardController@updateNotice']);
Route::delete('/dashboard/notice/{id}/delete', ['as'=>'dashboard.deletenotice','uses'=>'DashboardController@deleteNotice']);

Route::get('/dashboard/gallery', ['as'=>'dashboard.gallery','uses'=>'DashboardController@getGallery']);
Route::get('/dashboard/gallery/create', ['as'=>'dashboard.creategallery','uses'=>'DashboardController@getCreateGallery']);
Route::post('/dashboard/gallery/store', ['as'=>'dashboard.storegallery','uses'=>'DashboardController@storeGalleryAlbum']);
Route::get('/dashboard/gallery/{id}/edit', ['as'=>'dashboard.editgallery','uses'=>'DashboardController@getEditGalleryAlbum']);
Route::put('/dashboard/{id}/gallery/update', ['as'=>'dashboard.updategallery','uses'=>'DashboardController@updateGalleryAlbum']);
Route::delete('/dashboard/gallery/{id}', ['as'=>'dashboard.deletealbum','uses'=>'DashboardController@deleteAlbum']);
Route::delete('/dashboard/gallery/album/single/{id}/delete', ['as'=>'dashboard.deletesinglephoto','uses'=>'DashboardController@deleteSinglePhoto']);

Route::get('/dashboard/recruitment/applications', ['as'=>'dashboard.recruitment.applications','uses'=>'DashboardController@getRecruitmentApplications']);
Route::get('/dashboard/recruitment/applications/pdf', ['as'=>'dashboard.recruitment.applications.pdf','uses'=>'DashboardController@getRecruitmentApplicationPDF']);
Route::patch('/dashboard/recruitment/applications/{id}/approve', ['as'=>'dashboard.recruitment.approveapplication','uses'=>'DashboardController@approveRecruitmentApplication']);
Route::get('/dashboard/recruitment/application/pdf/{id}', ['as'=>'dashboard.recruitment.application.pdf','uses'=>'DashboardController@getRecruitmentApplicationSiglePDF']);
Route::delete('/dashboard/recruitment/application/{id}', ['as'=>'dashboard.recruitment.deleteapplication','uses'=>'DashboardController@deleteRecruitmentApplication']);

Route::get('/dashboard/blogs', ['as'=>'dashboard.blogs','uses'=>'DashboardController@getBlogs']);
// dashboard routes
// dashboard routes
