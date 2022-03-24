<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DataRoomController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LinkedInController;
use App\Http\Controllers\NDAController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectContractsController;
use App\Http\Controllers\ProjectDebtController;
use App\Http\Controllers\ProjectEnvironmentalController;
use App\Http\Controllers\ProjectFinancialController;
use App\Http\Controllers\ProjectOperationsController;
use App\Http\Controllers\ProjectOverviewController;
use App\Http\Controllers\ProjectRevenueController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ProjectShareholdersController;
use App\Http\Controllers\ProjectSiteController;
use App\Http\Controllers\ProjectTaxesController;
use App\Http\Controllers\ProjectTeaserController;
use App\Http\Controllers\RequestProjectController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UsersController;
use App\Models\Company;
use App\Models\DataRoom;
use Illuminate\Support\Facades\Route;

Route::post('/update-password', [UsersController::class, 'changePassword'])->name('changePassword');

Route::group(['middleware' => 'auth:web'], function () {

    Route::middleware('VerifyEmail')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('dashboard');
        Route::get('/my-company', [UsersController::class, 'mycompany'])->name('mycompany');
        Route::get('/my-platforms', [UsersController::class, 'platforms'])->name('platforms');
        // Platforms
        Route::get('/add-platforms', [UsersController::class, 'addplatforms'])->name('add_platforms');
        Route::get('/view-my-platforms/{id}', [UsersController::class, 'myplatforms'])->name('my_platforms');
        Route::get('/view-my-projects/{id}', [UsersController::class, 'myprojects'])->name('my_platforms');
        Route::post('/store-platforms', [PlatformController::class, 'store'])->name('store_platforms');
        // Projects
        Route::get('/my-projects', [UsersController::class, 'projects'])->name('projects');

        Route::get('/user-chat/{name}', [UsersController::class, 'chat'])->name('chat');
        Route::post('/userchat-project', [DataRoomController::class, 'store'])->name('chat.store');

        Route::get('/add-projects', [ProjectsController::class, 'addprojects'])->name('add_projects');
        Route::post('/store-projects', [ProjectsController::class, 'store'])->name('store_projects');

        Route::get('/add-employees', [EmployeesController::class, 'index'])->name('add_employees');
        Route::post('/store-employees', [EmployeesController::class, 'store'])->name('store_employees');

        Route::get('/add-projects-overview', [ProjectOverviewController::class, 'addprojects'])->name('overview');
        Route::post('/store-projects-overview', [ProjectOverviewController::class, 'store'])->name('store_overview');

        Route::get('/add-projects-teaser', [ProjectTeaserController::class, 'addteaser'])->name('add_projects_teaser');
        Route::post('/store-projects-teaser', [ProjectTeaserController::class, 'store'])->name('store_projects_teaser');

        Route::get('/add-projects-site', [ProjectSiteController::class, 'addsite'])->name('add_projects_site');
        Route::post('/store-projects-site', [ProjectSiteController::class, 'store'])->name('store_projects_site');

        Route::get('/add-projects-revenues-stream', [ProjectRevenueController::class, 'addrevenues'])->name('add_projects_revenues');
        Route::post('/store-projects-revenues-stream', [ProjectRevenueController::class, 'store'])->name('store_projects_revenues');

        Route::get('/add-projects-environmental-social', [ProjectEnvironmentalController::class, 'environmental'])->name('add_projects_environmental');
        Route::post('/store-projects-revenues-stream', [ProjectEnvironmentalController::class, 'store'])->name('store_projects_environmental');


        Route::get('/add-projects-projects-operations-maintenance', [ProjectOperationsController::class, 'addmaintenance'])->name('add_projects_maintenance');
        Route::post('/store-projects_operations', [ProjectOperationsController::class, 'store'])->name('store_projects_maintenance');

        Route::get('/add-projects-contracts', [ProjectContractsController::class, 'addcontracts'])->name('add_projects_contracts');
        Route::post('/store-projects-contracts', [ProjectContractsController::class, 'store'])->name('store_projects_contracts');

        Route::get('/add-projects-taxes', [ProjectTaxesController::class, 'addtaxes'])->name('add_projects_taxes');
        Route::post('/store-projects-taxes', [ProjectTaxesController::class, 'store'])->name('store_projects_taxes');

        Route::get('/add-projects-shareholders', [ProjectShareholdersController::class, 'addshareholders'])->name('add_projects_shareholders');
        Route::post('/store-projects-shareholders', [ProjectShareholdersController::class, 'store'])->name('store_projects_shareholders');

        Route::get('/add-projects-debt', [ProjectDebtController::class, 'adddebt'])->name('add_projects_debt');
        Route::post('/store-projects-debt', [ProjectDebtController::class, 'store'])->name('store_projects_debt');

        Route::get('/add-projects-financial', [ProjectFinancialController::class, 'addfinancial'])->name('add_projects_financial');
        Route::post('/store-projects-financial', [ProjectFinancialController::class, 'store'])->name('store_projects_financial');

        Route::get('/my-investments', [UsersController::class, 'investments'])->name('investments');
        Route::get('/ongoing-transactions', [UsersController::class, 'transactions'])->name('transactions');
        Route::get('/investment-opportunities', [UsersController::class, 'opportunities'])->name('opportunities');
        Route::get('/request-management', [UsersController::class, 'management'])->name('management');

        Route::get('/view-user-individual-profile/{id}', [UsersController::class, 'individualProfilee'])->name('individualProfile');
        Route::get('/view-user-company-profile/{id}', [UsersController::class, 'companyProfilee'])->name('companyProfile');

        Route::post('/request-project', [RequestProjectController::class, 'requestproject'])->name('requestproject');

        Route::get('/sign-non-disclosure-agreement-developer/{id}', [NDAController::class, 'ndadeveloper'])->name('ndadeveloper');
        Route::get('/sign-non-disclosure-agreement-investor/{id}', [NDAController::class, 'ndainvestor'])->name('ndainvestor');
        Route::post('/store-nda-developer', [NDAController::class, 'developer'])->name('post.nda.developer');
        Route::post('/store-nda-investor', [NDAController::class, 'investor'])->name('post.nda.investor');

        Route::get('/user-project-developer-active/{id}', [RequestProjectController::class, 'status1dev']);
        Route::get('/user-project-developer-block/{id}', [RequestProjectController::class, 'status0dev']);

        Route::get('/user-project-invester-active/{id}', [RequestProjectController::class, 'status1inves']);
        Route::get('/user-project-invester-block/{id}', [RequestProjectController::class, 'status0inves']);


        Route::get('/stripe-payment', [StripeController::class, 'handleGet']);
        Route::post('/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment');
    });
    Route::middleware('NoRedirect')->group(function () {
        Route::get('/verify-email', [UsersController::class, 'email'])->name('verify.email');
        Route::post('/user/verify', [UsersController::class, 'verify'])->name('verifyEmail');
    });
    Route::prefix('user')->group(function () {

        Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
        Route::get('/profile', [UsersController::class, 'profile'])->name('profile');
        Route::get('/edit/profile/individual', [UsersController::class, 'ediprofileIndivi'])->name('editprofileindividual');
        Route::post('/update/profile/individual', [ProfileController::class, 'updateIndividual'])->name('updateIndividual');
        Route::get('/edit/profile/company', [UsersController::class, 'ediprofileCompany'])->name('editprofilecompany');
        Route::post('/update/profile/company', [CompanyController::class, 'UpdateCompany'])->name('UpdateCompany');
        Route::post('/edit/profile', [UsersController::class, 'edit_profile'])->name('store_edit_profile');

        Route::get('/edit/profile/image', [UsersController::class, 'profileimage'])->name('profileimage');
        Route::post('/edit/profile/image', [UsersController::class, 'storeimage'])->name('storeimage');

        Route::get('/resend-otp', [UsersController::class, 'resend'])->name('ResendOTP');
        Route::get('/change-password', [UsersController::class, 'change'])->name('change');
        Route::middleware('NoRedirect')->group(function () {
            Route::get('/choose-role', [UsersController::class, 'choose'])->name('choose');
        });
        Route::middleware('NoRedirect')->group(function () {
            Route::get('/as-a-individual', [UsersController::class, 'individual'])->name('individual');
            Route::get('/as-a-company', [UsersController::class, 'company'])->name('company');
        });
        Route::get('/update-profile', [UsersController::class, 'updateprofile'])->name('updateprofile');
        Route::post('/update-profilee', [ProfileController::class, 'store'])->name('updateprofilee');
        Route::post('/update-company-profile', [CompanyController::class, 'store'])->name('updateCompanyProfile');
    });
});
Route::post('/checkemail', [UsersController::class, 'checkemail'])->name('forget-password');
Route::get('/password/reset/{token}', [UsersController::class, 'reset_form'])->name('PasswordToken');
Route::post('/updatePass', [UsersController::class, 'resetPassword'])->name('updatepassword');

Route::post('/user/authenticate', [UsersController::class, 'authenticate']);
Route::post('/save', [UsersController::class, 'store'])->name('store');
Route::get('/user/forget-password', [UsersController::class, 'forget']);
Route::get('/user/register', [UsersController::class, 'register']);
Route::get('/user/login', [UsersController::class, 'signin'])->name('login');

Route::get('auth/social', [GoogleController::class, 'show'])->name('social.login');
Route::get('oauth/{google}', [GoogleController::class, 'redirectToProvider'])->name('social.oauth');
Route::get('/auth/{google}/callback/', [GoogleController::class, 'handleProviderCallback'])->name('social.callback');



Route::group(['middleware' => 'auth:web'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard/get-admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/all-users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/individual-users', [AdminController::class, 'individualusers'])->name('admin.individual.users');
        Route::get('/company-users', [AdminController::class, 'companyusers'])->name('admin.company.users');
        Route::get('/user-individual-profile/{id}', [AdminController::class, 'individualProfile'])->name('admin.individual.profile');
        Route::get('/user-company-profile/{id}', [AdminController::class, 'companyProfile'])->name('admin.company.profile');
        Route::get('/platforms', [AdminController::class, 'platforms'])->name('admin.platforms');
        Route::get('/projects', [AdminController::class, 'projects'])->name('admin.projects');
        Route::get('/investments', [AdminController::class, 'investments'])->name('admin.investments');
        Route::get('/ongoing-transactions', [AdminController::class, 'transactions'])->name('admin.transactions');
        Route::get('/investment-opportunities', [AdminController::class, 'opportunities'])->name('admin.opportunities');
        Route::get('/request-management', [AdminController::class, 'management'])->name('admin.management');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::get('/view-user-individual-profile/{id}', [UsersController::class, 'individualProfilee'])->name('admin.individualProfile');
        Route::get('/view-user-company-profile/{id}', [UsersController::class, 'companyProfilee'])->name('admin.companyProfile');
        Route::get('/user-project-active/{id}', [RequestProjectController::class, 'statuss1']);
        Route::get('/user-project-block/{id}', [RequestProjectController::class, 'statuss0']);
        Route::post('/create_dataroom', [DataRoomController::class, 'create_dataroom'])->name('create_dataroom');
    });
});

Route::post('/admin/authenticate', [AdminController::class, 'authenticate']);
Route::post('/admin/save', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/forget-password', [AdminController::class, 'forget']);
Route::get('/admin/login/get-admin-login', [AdminController::class, 'signin'])->name('admin.login');

Route::get('/user-status-active/{id}', [AdminController::class, 'status1']);
Route::get('/user-status-block/{id}', [AdminController::class, 'status0']);

Route::get('/user-profile-active/{id}', [AdminController::class, 'profile1']);
Route::get('/user-profile-block/{id}', [AdminController::class, 'profile0']);

Route::get('/employee-profile-active/{id}', [AdminController::class, 'employee1']);
Route::get('/employee-profile-block/{id}', [AdminController::class, 'employee0']);
