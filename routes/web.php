<?php

use App\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/emicalculator', 'HomeController@emicalculator')->name('emicalculator');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/interestRate', 'HomeController@interestRate')->name('interestRate');
Route::get('/statuscheck', 'HomeController@statuscheck')->name('statuscheck');
Route::get('/eligibility', 'HomeController@eligibility')->name('eligibility');
Route::get('/eligibility2', 'HomeController@eligibility_two')->name('eligibility2');

Route::post('/banklist', 'HomeController@banklisteligibility')->name('banklist');



Route::get('/loan/apply', 'LoanController@apply')->name('loan.apply');
Route::post('/loan/submit', 'LoanController@submit')->name('loan.submit');

Route::get('/transfer', 'HomeController@transfer')->name('transfer');
Route::post('/success', 'ApplyController@success')->name('success');


// Route::post('/getCustData', 'ApplyController@getCustData')->name('getCustData');


Auth::routes();


//===================== Admin Routes =============================

Route::namespace('Admin')->prefix('back-office')->name('back-office.')->group(function(){
    Route::get('/', 'AdminController@index');
    Route::resource('/users', 'UserController');
    Route::resource('/roles', 'RoleController');

    /* ================Banking Routes============= */
    Route::get('/banks', 'BankController@index')->name('banks');
    Route::get('/bank/create', 'BankController@create')->name('bank.create');
    Route::post('/bank/store', 'BankController@store')->name('bank.store');
    Route::get('/bank/{bank_id}/edit', 'BankController@edit')->name('bank.edit');
    Route::PUT('/bank/update/{bank_id}', 'BankController@update')->name('bank.update');
    Route::DELETE('/bank/destroy/{bank_id}', 'BankController@destroy')->name('bank.destroy');
    Route::post('/bank/add-more-cibil', 'BankController@addMoreCibil');

    /* ================Application Status Routes============= */
    Route::get('/applicationstatus', 'ApplicationStatusController@index')->name('applicationstatus');
    Route::get('/applicationstatus/create', 'ApplicationStatusController@create')->name('applicationstatus.create');
    Route::post('/applicationstatus/store', 'ApplicationStatusController@store')->name('applicationstatus.store');
    Route::get('/applicationstatus/{status}/edit', 'ApplicationStatusController@edit')->name('applicationstatus.edit');
    Route::PUT('/applicationstatus/update/{status}', 'ApplicationStatusController@update')->name('applicationstatus.update');
    Route::DELETE('/applicationstatus/destroy/{status}', 'ApplicationStatusController@destroy')->name('applicationstatus.destroy');

    // Route::get('/disbursements', 'CustomerController@newLeads')->name('customers.newleads');
    /* ================Customer Routes============= */
    Route::get('/customers/newleads', 'CustomerController@newLeads')->name('customers.newleads');
    Route::get('/customers/customers', 'CustomerController@customers')->name('customers.customers');
    Route::get('/customers/sendtobank', 'CustomerController@sendtobank')->name('customers.sendtobank');
    Route::get('/customers/loginProcess', 'CustomerController@loginProcess')->name('customers.loginProcess');
    Route::get('/customers/sanctioned', 'CustomerController@sanctionData')->name('customers.sanctioned');
    Route::get('/customers/readytodisburse', 'CustomerController@readytodisburse')->name('customers.readytodisburse');
    Route::get('/customers/disbursebank', 'CustomerController@disbursebank')->name('customers.disbursebank');
    Route::get('/customers/chequefixing', 'CustomerController@chequefixing')->name('customers.chequefixing');
    Route::get('/customers/disbursedapplications', 'CustomerController@disbursedapplications')->name('customers.disbursedapplications');
    Route::get('/customers/partdisbursements', 'CustomerController@partdisbursements')->name('customers.partdisbursements');
    Route::get('/customers/partchequefixing', 'CustomerController@partchequefixing')->name('customers.partchequefixing');
   
    Route::post('/change-customer-status', 'CustomerController@changeCustomerStatus');

    Route::get('/customers/allcustomers', 'CustomerController@allCustomers')->name('customers.allcustomers');
    Route::get('/customers/droppedcustomers', 'CustomerController@droppedCustomers')->name('customers.droppedcustomers');
    Route::get('/customers/self-funding', 'CustomerController@selfFunding')->name('customers.self-funding');
    Route::get('/customers/not-interested', 'CustomerController@notInterested')->name('customers.not-interested');

    Route::get('/customers/addnewlead', 'CustomerController@addNewCustomer')->name('customers.addnewlead');
    Route::post('/customers/storecustomer', 'CustomerController@storeCustomer')->name('customers.storecustomer');

    Route::get('/customers/{id}/editnewcustomer', 'CustomerController@editnewcustomer')->name('customers.editnewcustomer');
    Route::PUT('/customers/updatenewcustomer/{id}', 'CustomerController@updatenewcustomer')->name('customers.updatenewcustomer');

   
    Route::get('/customers/{id}/pipelinecustomeredit', 'CustomerController@pipelinecustomeredit')->name('customers.pipelinecustomeredit');
    Route::PUT('/customers/updatepipelinecustomer/{id}', 'CustomerController@updatepipelinecustomer')->name('customers.updatepipelinecustomer');

    Route::get('/customers/{id}/editsendtobank', 'CustomerController@editsendtobank')->name('customers.editsendtobank');
    Route::PUT('/customers/updatesendtobank/{id}', 'CustomerController@updatesendtobank')->name('customers.updatesendtobank');

    Route::get('/customers/{id}/editsanctioned', 'CustomerController@editSanctioned')->name('customers.editsanctioned');
    Route::PUT('/customers/updatesanctionedcustomer/{id}', 'CustomerController@updateSanctionedCustomer')->name('customers.updatesanctionedcustomer');

    Route::get('/customers/{id}/editreadytodisburse', 'CustomerController@editreadytodisburse')->name('customers.editreadytodisburse');
    Route::PUT('/customers/updatereadytodisburse/{id}', 'CustomerController@updatereadytodisburse')->name('customers.updatereadytodisburse');


    Route::get('/customers/{id}/editdisbursebank', 'CustomerController@editdisbursebank')->name('customers.editdisbursebank');
    Route::PUT('/customers/updatedisbursebank/{id}', 'CustomerController@updatedisbursebank')->name('customers.updatedisbursebank');

    Route::get('/customers/{id}/editchequefixing', 'CustomerController@editchequefixing')->name('customers.editchequefixing');
    Route::PUT('/customers/updatechequefixing/{id}', 'CustomerController@updatechequefixing')->name('customers.updatechequefixing');


    Route::get('/customers/{id}/viewapplication', 'CustomerController@viewapplication')->name('customers.viewapplication');
    Route::PUT('/customers/sendtopartdisb/{id}', 'CustomerController@sendtopartdisb')->name('customers.sendtopartdisb');

    Route::get('/customers/{id}/editpartdisbursements', 'CustomerController@editpartdisbursements')->name('customers.editpartdisbursements');
    Route::PUT('/customers/updatepartdisbursements/{id}', 'CustomerController@updatepartdisbursements')->name('customers.updatepartdisbursements');

    Route::get('/customers/{id}/editpartchequefixing', 'CustomerController@editpartchequefixing')->name('customers.editpartchequefixing');
    // Route::PUT('/customers/updatepartchequefixing/{id}', 'CustomerController@updatepartchequefixing')->name('customers.updatepartchequefixing');


    /* ================== for exporting Csv File =========== */
    Route::get('/customers/allcustomersexport', 'CustomerController@allCustomerProcess')->name('customers.allcustomersexport');
    Route::get('/customers/pipelineCustomers', 'CustomerController@pipelineCustomers')->name('customers.pipelineCustomers');
    Route::get('/customers/exportloginProcess', 'CustomerController@exportloginProcess')->name('customers.exportloginProcess');
    Route::get('/customers/exportsanctioned', 'CustomerController@sanctionedProcess')->name('customers.exportsanctioned');
    Route::get('/customers/exportdisbursed', 'CustomerController@disbursementProcess')->name('customers.exportdisbursed');

    /* ================== for Importing Csv File =========== */
    Route::post('/customers/importnewCustomer', 'CustomerController@importnewCustomer')->name('customers.importnewCustomer');
    Route::post('/customers/importDisbursement', 'CustomerController@importDisbursement')->name('customers.importDisbursement');


    /* Ajax call for excutive assignment */
    Route::post('/fetchAgents', 'CustomerController@fetchAgents');
    Route::post('/updatestatues', 'CustomerController@updatestatues');
    Route::post('/addnewbankdoc', 'CustomerController@addnewbankdoc');

    Route::post('/customers/destroy', 'CustomerController@destroy')->name('customers.destroy');


    Route::get('/appointments', 'AppointmentController@index')->name('appointments');
    //Route::put('/appointments/edit/{id}', 'AppointmentController@index')->name('appointments.edit');

    Route::resource('/cibil','CibilSettingController');

    Route::resource('/builders','BuilderController');

});

Route::post('back-office/change-agent-appointment', 'Admin\CustomerController@changeAgentAppointment');

Route::post('back-office/eligibilities/applicant', 'Admin\EligibilityController@applicant')->name('back-office.eligibilities.applicant');
Route::get('back-office/eligibilities/details',  'Admin\EligibilityController@details')->name('back-office.eligibilities.details');
Route::post('back-office/eligibilities/eligibility', 'Admin\EligibilityController@eligibility')->name('back-office.eligibilities.eligibility');


/*=============================== new routes =================================*/
Route::get('back-office/eligibilities', 'Admin\EligibilityController@index')->name('back-office.eligibilities');
Route::post('back-office/eligibilities/openForm', 'Admin\EligibilityController@openForm');
Route::get('back-office.eligibilities.salaried', 'Admin\EligibilityController@openForm')->name('back-office.eligibilities.salaried');
Route::get('back-office.eligibilities.selfEmployeed', 'Admin\EligibilityController@openForm')->name('back-office.eligibilities.selfEmployeed');

Route::post('back-office/eligibilities/SelfEmployeeType', 'Admin\EligibilityController@SelfEmployeeType');

Route::get('back-office.eligibilities.generalselfemployeed', 'Admin\EligibilityController@SelfEmployeeType')->name('back-office.eligibilities.generalselfemployeed');
Route::get('back-office.eligibilities.professionalselfemployeed', 'Admin\EligibilityController@SelfEmployeeType')->name('back-office.eligibilities.professionalselfemployeed');
Route::post('back-office/eligibilities/selfemployeeGeneral', 'Admin\EligibilityController@selfemployeeGeneral')->name('back-office.eligibilities.selfemployeeGeneral');
Route::post('back-office/eligibilities/generalSelfEligibility', 'Admin\EligibilityController@selfemployeeGeneral')->name('back-office.eligibilities.generalSelfEligibility');
Route::post('back-office/eligibilities/selfemployeeProfessional', 'Admin\EligibilityController@selfemployeeProfessional')->name('back-office.eligibilities.selfemployeeProfessional');
Route::post('back-office/eligibilities/professionalSelfEmployeeEligibility', 'Admin\EligibilityController@professionalSelfEmployeeEligibility')->name('back-office.eligibilities.professionalSelfEmployeeEligibility');

Route::post("/ajaxstatuschecking", 'LoanController@statuscheckAjax');

