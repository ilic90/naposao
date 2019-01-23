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

// uid - user id
// jid - job id
// cid - company
Route::get('/lang/{locale}',function($locale){

	if (in_array($locale, \Config::get('app.locales'))) {
		Session::put('locale', $locale);
	  }
	  return redirect()->back();
});

Route::group(['middleware'=>['guest','notusersession']],function (){

// Authentication routes...
Route::get('/userLogin', 'UserController@getUserLogin')->name('getUserLogin');
Route::post('/userLogin', 'UserController@postUserLogin')->name('postUserLogin');
Route::get('/userRegister', 'UserController@getUserRegister')->name('getUserRegister');
Route::post('/userRegister', 'UserController@postUserRegister')->name('postUserRegister');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister'); 

Route::get('/companyLogin', 'CompanyController@getLogin')->name('getCompanyLogin');
Route::post('/companyLogin', 'CompanyController@authenticate')->name('authenticate');
Route::get('/companyRegister', 'CompanyController@getRegister')->name('getCompanyRegister');
Route::post('/companyRegister', 'CompanyController@postRegister')->name('postCompanyRegister');
Route::get('/companyRegister-Step-2', 'CompanyController@getRegisterStep2')->name('getCompanyRegisterStep2');
Route::post('/companyRegister-Step-2', 'CompanyController@postRegisterStep2')->name('postCompanyRegisterStep2');
Route::get('/companyRegister-Step-3/{cid}', 'CompanyController@getRegisterStep3')->name('getCompanyRegisterStep3');
Route::post('/companyRegister-Step-3', 'CompanyController@postRegisterStep3')->name('postCompanyRegisterStep3');


});
Route::get('/resetPassword', 'UserController@getResetPasswordEmail')->name('getResetPasswordEmail');
Route::post('/resetPasswordEmail', 'UserController@sendResetPasswordEmail')->name('sendResetPasswordEmail');
Route::get('/resetPassword/{token}', 'UserController@getResetPassword')->name('getResetPassword');
Route::post('/setNewPassword/{token}', 'UserController@setNewPassword')->name('setNewPassword');
Route::get('/confirmUser/{token}', 'UserController@confirmUser')->name('confirmUser');

Route::get('/logout', 'UserController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('getHome');
Route::get('/404', 'HomeController@get404')->name('get404');



//User(applicant) related routes
Route::group(['middleware'=>'usersession'],function (){
	Route::get('/profile', 'UserController@getUserProfile')->name('getUserProfile');
	Route::post('/profile', 'UserController@postProfile')->name('postUserProfile');
	Route::get('/profile/{uid}/favorites', 'UserController@getFavorites')->name('getUserFavorites');
	Route::post('/profile/{uid}/favorites/{jid}', 'UserController@postFavorite')->name('postUserFavorites');
	Route::get('/cvCreator', 'UserController@getCvCreator')->name('getCvCreator');
	Route::get('/myFiles', 'UserController@getMyFiles')->name('getMyFiles');
	Route::get('/history', 'UserController@getHistory')->name('getHistory');
	Route::get('/messages', 'UserController@getMessages')->name('getMessages');
	Route::get('/userConversation/{aid}', 'UserController@getUserConversation')->name('getUserConversation');
	Route::get('/applicationHistory', 'UserController@getHistory')->name('getHistory');
	Route::post('/postUserMessage', 'UserController@postUserMessage')->name('postUserMessage');
//CV routes
	Route::get('/CV', 'CvController@getCV')->name('getCV');
	Route::get('/createCV', 'CvController@getCreateCV')->name('createCV');
	Route::get('/storeCV','CvController@storeCV')->name('storeCV');
	Route::get('/CVstep2', 'CvController@cvStep2')->name('cvStep2');
	Route::get('/workHistory/{cvid}','CvController@getWorkHistory')->name('getWorkHistory');
	Route::get('/createWorkHistory','CvController@createWorkHistory')->name('createWorkHistory');
	Route::get('/createEducation', 'CvController@createEducation')->name('createEducation');
	Route::get('/getCVhtml/{cvid}','CvController@getCVhtml')->name('getCVhtml');
	Route::get('/deleteCV/{cvid}', 'CvController@deleteCV')->name('deleteCV');
	Route::get('generate-pdf/{cvid}', 'PdfGenerateController@pdfview')->name('generate-pdf');
	Route::get('/editCV/{cvid}', 'CvController@editCV')->name('editCV');
	Route::get('/addWorkHistory', 'CvController@addWorkHistory')->name('addWorkHistory');
	Route::get('/addEducation', 'CvController@addEducation')->name('addEducation');
	Route::post('/updateCV', 'CvController@updateCV')->name('updateCV');
	Route::post('/editEducation', 'CvController@editEducation')->name('editEducation');
	Route::post('/editWorkHistory', 'CvController@editWorkHistory')->name('editWorkHistory');
	Route::get('/removeEducation/{eid}', 'CvController@removeEducation')->name('removeEducation');
	Route::get('/removeWorkHistory/{whid}', 'CvController@removeWorkHistory')->name('removeWorkHistory');
	Route::get('/storePdf/{cvid}', 'PdfGenerateController@storePdf')->name('storePdf');
	Route::get('/updatePdf/{cvid}', 'PdfGenerateController@updatePdf')->name('updatePdf');


	Route::post('/updateEducation', 'UserController@updateEducation')->name('updateEducation');
	Route::post('/updateCountry', 'UserController@updateCountry')->name('updateCountry');
	Route::post('/updateCity', 'UserController@updateCity')->name('updateCity');
	Route::post('/updateRegion', 'UserController@updateRegion')->name('updateRegion');
	Route::post('/updateBirthdate', 'UserController@updateBirthdate')->name('updateBirthdate');
	Route::post('/updateGender', 'UserController@updateGender')->name('updateGender');
	Route::post('/updatePhone', 'UserController@updatePhone')->name('updatePhone');
	Route::post('/updateDescription', 'UserController@updateDescription')->name('updateDescription');
	Route::post('/updateAvatar', 'UserController@updateAvatar')->name('updateAvatar');
	Route::post('/updateSkills', 'UserController@updateSkills')->name('updateSkills');
	Route::post('/updateLanguages', 'UserController@updateLanguages')->name('updateLanguages');
	Route::post('/updateAdStatus/{aid}', 'AdminController@updateAdStatus')->name('updateAdStatus');
	Route::post('/deleteAd/{aid}', 'AdminController@deleteAd')->name('deleteAd');
	Route::get('/deleteAd/{aid}', 'AdminController@deleteAd')->name('getDeleteAd');
	Route::get('/admin/editAd/{aid}', 'AdminController@adminEditAd')->name('adminEditAd');
	Route::post('/admin/editAd/', 'AdminController@postAdminEditAd')->name('postAdminEditAd');
	Route::post('/updateUserStatus/{uid}', 'AdminController@updateUserStatus')->name('updateUserStatus');
	Route::get('/admin/deleteUser/{uid}', 'AdminController@adminDeleteUser')->name('adminDeleteUser');


	Route::post('/updatePopup', 'UserController@updatePopup')->name('updatePopup');
	Route::get('/getPopUpData', 'UserController@getPopUpData')->name('getPopUpData');


	Route::post('/updateFavorites', 'JobController@updateFav')->name('updateFav');
	Route::post('/removeFavorites', 'JobController@removeFav')->name('removeFav');
	Route::get('/favorites', 'JobController@getUserFavorites')->name('getUserFavorites');
	// Route::get('/favorites', 'JobController@getUserFavorites')->name('getUserFavorites');
	Route::post('/removeHistory', 'UserController@removeHistory')->name('removeHistory');

});

Route::group(['middleware'=>'isadmin'],function (){
	// admin routes
	Route::get('/admin', 'AdminController@getAdminLogin')->name('getAdminLogin');
	Route::post('/admin', 'AdminController@postAdminLogin')->name('postAdminLogin');
	Route::get('/adminPanel', 'AdminController@getAdminPanel')->name('getAdminPanel');
	Route::get('/admin/ads', 'AdminController@getAdminAds')->name('getAdminAds');
	Route::get('/admin/companies', 'AdminController@getAdminCompanies')->name('getAdminCompanies');
	Route::get('/admin/users', 'AdminController@getAdminUsers')->name('getAdminUsers');
	Route::get('/admin/reports/ads', 'AdminController@getReports')->name('getReports');
	Route::get('/admin/reports/companies', 'AdminController@getReportsCompanies')->name('getReportsCompanies');
	Route::get('/admin/editCompany/{cid}', 'AdminController@getEditCompanyAdmin')->name('getEditCompanyAdmin');
	Route::post('/admin/postEditCompany/', 'AdminController@postEditCompanyAdmin')->name('postEditCompanyAdmin');
	Route::get('/admin/deleteCompany/{cid}', 'AdminController@deleteCompany')->name('deleteCompany');
	Route::get('/updateCompanyStatus/{cid}/{stat}', 'AdminController@updateCompanyStatus')->name('updateCompanyStatus');
	Route::get('/admin/languages','AdminController@getAdminLanguages')->name('getAdminLanguages');
	Route::get('/admin/delete/language/{lid}','AdminController@adminDeleteLanguage')->name('adminDeleteLanguage');
	Route::post('/admin/add/language','AdminController@adminAddLanguage')->name('adminAddLanguage');
	Route::get('/admin/categories','AdminController@getAdminCategories')->name('getAdminCategories');
	Route::get('/admin/delete/category/{catid}','AdminController@adminDeleteCategory')->name('adminDeleteCategory');
	Route::post('/admin/add/category','AdminController@adminAddCategory')->name('adminAddCategory');
	Route::get('/admin/activate/company/{cid}', 'AdminController@adminActivateCompany')->name('adminActivateCompany');
	Route::get('/admin/deactivate/company/{cid}', 'AdminController@adminDeactivateCompany')->name('adminDeactivateCompany');
	Route::get('/admin/info', 'AdminController@getAdminInfo')->name('getAdminInfo');
	Route::post('/admin/updateInfo', 'AdminController@updateAdminInfo')->name('updateAdminInfo');
});

Route::get('/user/{uid}', 'UserController@getProfile')->name('getProfile');
Route::get('/users', 'UserController@getUsers')->name('getUsers');
Route::post('/reportAd/{aid}/{uid}', 'AdminController@reportAd')->name('reportAd');
Route::post('/reportCompany/{cid}/{uid}', 'AdminController@reportCompany')->name('reportCompany');

Route::get('/jobs', 'JobController@getJobs')->name('getJobs');
Route::get('/job/{jid}', 'JobController@getJob')->name('getSpecificJob');

Route::get('/searchResults', 'UserController@getSearchResults')->name('getSearchResults');
Route::get('/jobsByCategory/{catid}', 'JobController@getJobsByCategory')->name('getJobsByCategory');

//Company routes

Route::group(['middleware'=>'auth'],function (){

Route::post('/profile', 'CompanyController@postProfile')->name('postCompanyProfile');
Route::get('/controlPanel', 'CompanyController@getControlPanel')->name('getControlPanel');
Route::get('/editBusinessCard', 'CompanyController@editBusinessCard')->name('editBusinessCard');
Route::post('/updateAboutUs', 'CompanyController@updateAboutUs')->name('updateAboutUs');
Route::post('/updateCareer', 'CompanyController@updateCareer')->name('updateCareer');
// Route::post('/updateCover', 'CompanyController@updateCover')->name('updateCover');
// Route::post('/updateCompanyLogo', 'CompanyController@updateLogo')->name('updateCompanyLogo');
Route::get('/editCompany/{cid}', 'CompanyController@getEditCompany')->name('getEditCompany');
Route::post('/postEditCompany', 'CompanyController@postEditCompany')->name('postEditCompany');
Route::get('/myAds', 'JobController@getAllJobs')->name('getAllJobs');
Route::get('/payment', 'CompanyController@getPayment')->name('getPayment');
Route::get('/invoices', 'CompanyController@getInvoices')->name('getInvoices');
Route::get('/getInvoice/{iid}', 'CompanyController@getInvoiceHtml')->name('getInvoiceHtml');
Route::get('/deleteInvoice/{iid}', 'CompanyController@deleteInvoice')->name('deleteInvoice');
Route::get('invoice-generate-pdf/{iid}', 'PdfGenerateController@invoicePdf')->name('invoicePdf');

Route::get('/addNewJob', 'JobController@getNewJob')->name('addNewJob');
Route::get('/addNewJobStandard', 'JobController@getNewJobStandard')->name('addNewJobStandard');
Route::get('/addNewJobCustom', 'JobController@getNewJobCustom')->name('addNewJobCustom');
Route::get('/addNewJobVIP', 'JobController@getNewJobVIP')->name('addNewJobVIP');
Route::get('/addNewJobPremium', 'JobController@getNewJobPremium')->name('addNewJobPremium');
Route::post('/postNewJob', 'JobController@postNewJob')->name('postNewJob');
Route::get('/getApplicants/{aid}', 'JobController@getApplicants')->name('getApplicants');
Route::get('/deleteJob/{jid}', 'JobController@deleteJob')->name('deleteJob');
Route::get('/promoteJob/{jid}', 'JobController@promoteJob')->name('promoteJob');
Route::get('/reinforceJob/{jid}', 'JobController@reinforceJob')->name('reinforceJob');

Route::get('/promoteCompany/{cid}', 'CompanyController@promoteCompany')->name('promoteCompany');

Route::get('/company/editAd/{jid}', 'JobController@companyEditAd')->name('companyEditAd');
Route::post('/company/postEditAd', 'JobController@postCompanyEditAd')->name('postCompanyEditAd');

Route::get('/makeConfidential/{jid}', 'JobController@makeConfidential')->name('makeConfidential');
Route::get('/makeUnconfidential/{jid}', 'JobController@makeUnconfidential')->name('makeUnconfidential');

Route::get('/conversation/{aid}', 'JobController@getConversation')->name('getConversation');
});

//reset company password
Route::get('/CompanyResetPassword', 'CompanyController@getResetPasswordEmail')->name('getCompanyResetPasswordEmail');
Route::post('/CompanyResetPasswordEmail', 'CompanyController@sendResetPasswordEmail')->name('sendCompanyResetPasswordEmail');
Route::get('/CompanyResetPassword/{token}', 'CompanyController@getResetPassword')->name('getCompanyResetPassword');
Route::post('/CompanySetNewPassword/{token}', 'CompanyController@setNewPassword')->name('setCompanyNewPassword');
Route::get('/confirmCompany/{token}', 'CompanyController@confirmCompany')->name('confirmCompany');

// Morao sam da ih izbacim zbog admina
Route::post('/updateCover', 'CompanyController@updateCover')->name('updateCover');
Route::post('/updateCompanyLogo', 'CompanyController@updateLogo')->name('updateCompanyLogo');

Route::get('/applications', 'JobController@getApplications')->name('getApplications');

Route::get('/company/{cid}', 'CompanyController@getProfile')->name('getCompanyProfile');

Route::get('/Job/{jid}/{cid}/{uid}', 'JobController@getJobApplication')->name('getJobApplication');
Route::post('/applyForJob', 'JobController@postJobApplication')->name('postJobApplication');

Route::get('/today', 'JobController@getToday')->name('getToday');

Route::post('/sendMessage', 'JobController@postSendMessage')->name('postSendMessage');

Route::post('/updateMessages', 'JobController@getRefresh')->name('getRefresh');

Route::get('/sendMail', 'HomeController@sendMail')->name('sendMail');

route::post('/submitPayment', 'HomeController@submitPayment')->name('submitPayment');

Route::get('image-crop', 'CompanyController@imageCrop')->name('imageCrop');
Route::get('image-crop2', 'UserController@imageCrop2')->name('imageCrop2');
Route::post('image-crop', 'CompanyController@imageCropPost')->name('imageCropPost');
Route::post('image-crop2', 'UserController@imageCropPost2')->name('imageCropPost2');


// middleware for showing errors on companyRegister-Step-3
// Route::group(['middleware'=>'web'],function (){

// 	Route::resource('/post', 'CompanyController');
// });

//ajax route for create cv step 2
//Route::post('/cvEducation','CvController@education');




