<?php

use App\Http\Controllers\Admin\reportGenerateBarcode;
//registration start

//registration end 

Route::get('login', 'Auth\LoginController@login')->name('admin.login'); 
Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout.get');
Route::get('refreshcaptcha', 'Auth\LoginController@refreshCaptcha')->name('admin.refresh.captcha');
Route::post('login-post', 'Auth\LoginController@loginPost')->name('admin.login.post'); 

Route::group(['middleware' => 'admin'], function() {
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

	Route::prefix('account')->group(function () {
	    Route::get('form', 'AccountController@form')->name('admin.account.form');
	    Route::post('store', 'AccountController@store')->name('admin.account.post');
		Route::get('list', 'AccountController@index')->name('admin.account.list');
		Route::get('edit/{account}', 'AccountController@edit')->name('admin.account.edit');
		Route::post('update/{account}', 'AccountController@update')->name('admin.account.edit.post');
		Route::get('delete/{account}', 'AccountController@destroy')->name('admin.account.delete');

		Route::get('DistrictsAssign', 'AccountController@DistrictsAssign')->name('admin.account.DistrictsAssign'); 
		Route::get('StateDistrictsSelect', 'AccountController@StateDistrictsSelect')->name('admin.account.StateDistrictsSelect'); 
		Route::post('DistrictsAssignStore', 'AccountController@DistrictsAssignStore')->name('admin.Master.DistrictsAssignStore');
		Route::get('DistrictsAssignDelete/{id}', 'AccountController@DistrictsAssignDelete')->name('admin.Master.DistrictsAssignDelete');

		Route::get('BlockAssign', 'AccountController@BlockAssign')->name('admin.account.BlockAssign'); 
		Route::get('DistrictBlockAssign', 'AccountController@DistrictBlockAssign')->name('admin.account.DistrictBlockAssign'); 
		Route::post('DistrictBlockAssignStore', 'AccountController@DistrictBlockAssignStore')->name('admin.Master.DistrictBlockAssignStore');
		Route::get('DistrictBlockAssignDelete/{id}', 'AccountController@DistrictBlockAssignDelete')->name('admin.Master.DistrictBlockAssignDelete');

		Route::get('gramPanchayatAssign', 'AccountController@gramPanchayatAssign')->name('admin.account.gramPanchayatAssign'); 
		Route::get('DistrictBlockgramPanchayatAssign', 'AccountController@DistrictBlockgramPanchayatAssign')->name('admin.account.DistrictBlockgramPanchayatAssign'); 
		Route::post('DistrictBlockgramPanchayatAssignStore', 'AccountController@DistrictBlockgramPanchayatAssignStore')->name('admin.Master.DistrictBlockgramPanchayatAssignStore');
		Route::get('DistrictBlockgramPanchayatAssignDelete/{id}', 'AccountController@DistrictBlockgramPanchayatAssignDelete')->name('admin.Master.DistrictBlockgramPanchayatAssignDelete'); 
		
	});
	
		

    Route::group(['prefix' => 'Master'], function() {
    	//-states-//
	    Route::get('/', 'MasterController@index')->name('admin.Master.index');	   
	    Route::post('Store/{id?}', 'MasterController@store')->name('admin.Master.store');	   
	    Route::get('Edit{id}', 'MasterController@edit')->name('admin.Master.edit');
	    Route::get('Delete{id}', 'MasterController@delete')->name('admin.Master.delete');
        //-districts-//
	    Route::get('Districts', 'MasterController@districts')->name('admin.Master.districts');	   
	    Route::post('Districts-Store{id?}', 'MasterController@districtsStore')->name('admin.Master.districtsStore');	   
	    Route::get('DistrictsTable', 'MasterController@DistrictsTable')->name('admin.Master.DistrictsTable');
	    Route::get('Districts-Edit/{id}', 'MasterController@districtsEdit')->name('admin.Master.districtsEdit');
	    Route::get('Districts-delete/{id}', 'MasterController@districtsDelete')->name('admin.Master.districtsDelete');
	   
	    Route::get('BlockMCS', 'MasterController@BlockMCS')->name('admin.Master.blockmcs');  
	    Route::post('BlockMCSStore{id?}', 'MasterController@BlockMCSStore')->name('admin.Master.BlockMCSStore');	   
	    Route::get('BlockMCSEdit/{id}', 'MasterController@BlockMCSEdit')->name('admin.Master.BlockMCSEdit');
	    Route::get('BlockMCSTable', 'MasterController@BlockMCSTable')->name('admin.Master.BlockMCSTable');
	    Route::get('BlockMCSDelete/{id}', 'MasterController@BlockMCSDelete')->name('admin.Master.BlockMCSDelete');

	    Route::get('gram-panchayat', 'MasterController@gramPanchayat')->name('admin.Master.gram.panchayat');  
	    Route::post('gram-Panchayat-Store{id?}', 'MasterController@gramPanchayatStore')->name('admin.Master.gran.panchayat.store');
	    Route::get('gram-panchayat-Table', 'MasterController@gramPanchayatTable')->name('admin.Master.gram.panchayat.table');
	    Route::get('gram-panchayat-edit/{id}', 'MasterController@gramPanchayatEdit')->name('admin.Master.gram.panchayat.edit');	   
	    Route::get('gram-panchayat-delete/{id}', 'MasterController@gramPanchayatDelete')->name('admin.Master.gram.panchayat.delete');	   
	   
	    
	    //-village--//
	    Route::get('village', 'MasterController@village')->name('admin.Master.village');	   
	    Route::post('village-store{id?}', 'MasterController@villageStore')->name('admin.Master.village.store');	   
	   
	    Route::get('villageTable', 'MasterController@villageTable')->name('admin.Master.villageTable');
	    Route::get('village-edit/{id}', 'MasterController@villageEdit')->name('admin.Master.village.edit');
	    
	    Route::get('village-delete/{id}', 'MasterController@villageDelete')->name('admin.Master.village.delete');
	    
	    //-village--//
	    Route::get('ward', 'MasterController@ward')->name('admin.Master.ward');	   
	    Route::post('ward-store{id?}', 'MasterController@wardStore')->name('admin.Master.ward.store');	 
	    Route::get('wardTable', 'MasterController@wardTable')->name('admin.Master.ward.table');	 
	    //-----------------onchange-----------------------------//
	    Route::get('stateWiseDistrict', 'MasterController@stateWiseDistrict')->name('admin.Master.stateWiseDistrict');   
	    

	    Route::get('DistrictWiseBlock/{print_condition?}', 'MasterController@DistrictWiseBlock')->name('admin.Master.DistrictWiseBlock');
	     

	    Route::get('BlockWiseGramPanchayat', 'MasterController@BlockWiseGramPanchayat')->name('admin.Master.BlockWiseGramPanchayat');

	    Route::get('GramPanchayatWiseVillage', 'MasterController@GramPanchayatWiseVillage')->name('admin.Master.GramPanchayatWiseVillage'); 
	   

	   
	     
	});
	Route::group(['prefix' => 'shg-details'], function() {
		 Route::get('self-help-group', 'SHGDetailController@selfHelpGroup')->name('admin.shg.detail.selfhelpgroup'); 
		 Route::post('self-help-group-store', 'SHGDetailController@selfHelpGroupStore')->name('admin.shg.detail.selfhelpgroup.store'); 
		 Route::get('self-help-group-list', 'SHGDetailController@selfHelpGroupList')->name('admin.shg.detail.selfhelpgroup.list'); 
		 Route::get('self-help-group-edit', 'SHGDetailController@selfHelpGroupEdit')->name('admin.shg.detail.selfhelpgroup.edit'); 
		 Route::get('self-help-group-add/{id}', 'SHGDetailController@selfHelpGroupAdd')->name('admin.shg.detail.selfhelpgroup.add'); 
		 Route::get('self-help-group-add-leb2/{id}', 'SHGDetailController@selfHelpGroupAddLeb2')->name('admin.shg.detail.selfhelpgroup.addleb2'); 
		 Route::post('self-help-group-store-member/{id}', 'SHGDetailController@selfHelpGroupStoreMember')->name('admin.shg.detail.selfhelpgroup.store.member'); 
		 Route::get('self-help-group-view-member/{id}', 'SHGDetailController@selfHelpGroupViewMember')->name('admin.shg.detail.selfhelpgroup.view.member'); 
		 Route::get('self-help-group-edit-member/{id}/{selfHelpGroupid}', 'SHGDetailController@selfHelpGroupEditMember')->name('admin.shg.detail.selfhelpgroup.edit.member'); 
		 Route::post('self-help-group-update-member/{id}', 'SHGDetailController@selfHelpGroupUpdateMember')->name('admin.shg.detail.selfhelpgroup.update.member'); 
	});
	Route::group(['prefix' => 'vo-profile'], function() {
		 Route::get('vo-profile', 'SHGDetailController@voProfile')->name('admin.vo.profile'); 
		 Route::post('vo-profile-store', 'SHGDetailController@voProfileStore')->name('admin.vo.profile.store'); 
		 Route::get('vo-profile-list', 'SHGDetailController@voProfileList')->name('admin.vo.profile.list'); 
		 Route::get('vo-profile-edit/{id}', 'SHGDetailController@voProfileEdit')->name('admin.vo.profile.edit'); 
		 Route::post('vo-profile-update/{id}', 'SHGDetailController@voProfileUpdate')->name('admin.vo.profile.update'); 
		 Route::get('add-shg/{id}', 'SHGDetailController@addSHG')->name('admin.vo.profile.addshg'); 
		 Route::get('shgWiseMember', 'SHGDetailController@shgWiseMember')->name('admin.vo.profile.shgWiseMember'); 
		 Route::post('shgStore/{id}/{village_id}', 'SHGDetailController@ShgStore')->name('admin.vo.profile.shgstore'); 
		 Route::get('shgviewList/{id}', 'SHGDetailController@ShgViewList')->name('admin.vo.profile.shgViewList'); 
		 Route::get('shgedit/{id}', 'SHGDetailController@ShgEdit')->name('admin.vo.profile.shgedit'); 
		 Route::post('shgeUpdate/{id}', 'SHGDetailController@ShgUpdate')->name('admin.vo.profile.shgUpdate'); 
		 Route::get('remove-member/{id}/{type}', 'SHGDetailController@removeMember')->name('admin.vo.profile.remove.member'); 
		  
	});
	Route::group(['prefix' => 'vo-meeting'], function() {
		 Route::get('vomeeting', 'SHGDetailController@vomeeting')->name('admin.vomeeting'); 
		 Route::post('vomeetingStore', 'SHGDetailController@vomeetingStore')->name('admin.vomeeting.store'); 
		 Route::get('vomeetinglist', 'SHGDetailController@vomeetingList')->name('admin.vomeeting.list'); 
		 
		  
	});
	Route::group(['prefix' => 'report'], function() {
		 Route::get('vo-report', 'ReportController@voReport')->name('admin.report'); 
		 Route::post('vo-report-generate', 'ReportController@voReportGenerate')->name('admin.report.generate'); 
		 Route::get('self-help-gorup-report', 'ReportController@selfHelpGroupreport')->name('admin.report.self.HelpGroupreport'); 
		 Route::post('self-help-gorup-report-generate', 'ReportController@selfHelpGroupreportGenerate')->name('admin.report.self.HelpGroupreport.generate'); 
		 
		 
		  
	});
    
 });