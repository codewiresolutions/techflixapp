<?php


use App\Http\Controllers\admin\CareerJobsController;
use App\Http\Controllers\admin\ChatController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\EmailSettingController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\OrderDetailController;
use App\Http\Controllers\admin\PaymentMethodController;
use App\Http\Controllers\admin\PaymentsController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\QuestionController;
use App\Http\Controllers\admin\QuizController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\NamecheapController;
use App\Http\Controllers\PerfectMoneyController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\website\DomainController;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\website\HostingController;
use App\Http\Controllers\website\JobApplicant;
use App\Http\Controllers\website\PaypalController as webPaypalController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index');
Route::get('/quizzes/{quiz}', [QuizController::class, 'show'])->name('quizzes.show');
Route::post('/quizzes/{quiz}/submit', [QuizController::class, 'submit'])->name('quizzes.submit')->middleware('auth');
Route::get('/quizzes/{quiz}/result', [QuizController::class, 'result'])->name('quizzes.result')->middleware('auth');


Route::fallback(function () {
    return view('errors.404');

});

Route::prefix('admin')->group(function () {
    Route::get('/quizzes', [QuizController::class, 'get'])->name('admin.quizzes.index');
    Route::get('/quizzes/create', [QuizController::class, 'create'])->name('admin.quizzes.create');
    Route::post('/quizzes', [QuizController::class, 'store'])->name('admin.quizzes.store');
    Route::get('/quizzes/{quiz}/edit', [QuizController::class, 'edit'])->name('admin.quizzes.edit');
    Route::put('/quizzes/{quiz}', [QuizController::class, 'update'])->name('admin.quizzes.update');
    Route::delete('/quizzes/{quiz}', [QuizController::class, 'destroy'])->name('admin.quizzes.destroy');
});

//PUBLIC ROUTES START FROM HERE
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('admin/login', [AuthController::class, 'adminLogin'])->name('admin.login');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('user-userAuthentication', [AuthController::class, 'userAuthentication'])->name('user.authenticate');
Route::post('user-registration', [AuthController::class, 'userRegistration'])->name('user.registration');

//PUBLIC ROUTES END FROM HERE


//CHAT ROUTES START FROM HERE
Route::post('sendmessage', [ChatController::class, 'sendMessage'])->name('sendMessage');
Route::get('/chat-history', [ChatController::class, 'getChatHistory'])->name('getChatHistory')->middleware('auth');
Route::get('/new-messages', [ChatController::class, 'getNewMessages'])->name('getNewMessages');
//CHAT ROUTES  END FROM HERE


// VISITORS USERS ROUTES START FROM HERE
Route::middleware(['auth'])->group(function () {

    Route::group(['middleware' => 'authenticate_user'], function () {
        Route::resource('orders', OrderController::class);
        Route::get('payments', [PaymentsController::class, 'paymentReports'])->name('payments');
        Route::post('/store-order-details', [OrderController::class, 'storeOrderDetails'])->name('store.order.details');
        Route::get('order_detail_search/{id}', [OrderController::class, 'orderSearch'])->name('order_detail_search');
        Route::resource('profile', ProfileController::class);
        Route::resource('/dashboard', DashboardController::class);
        Route::post('/order_update/{id}', [DashboardController::class, 'orderUpdate'])->name('admin.order.update');
    });

    // ADMIN USERS ROUTES START FROM HERE
    Route::prefix('admin')->name('admin.')->middleware(['is_admin', 'authenticate_admin'])->group(function () {
        Route::resource('products', ProductController::class);
        Route::delete('product_delete/{id}', [ProductController::class, 'productDelete'])->name('product_delete');
        Route::resource('subcategory', SubCategoryController::class);
        Route::resource('users', UserController::class);
        Route::resource('reports', ReportController::class);
        Route::resource('subcategory_deatil', OrderDetailController::class); // CRUD
        Route::resource('settings', SettingController::class);
        Route::resource('PaymentMethod', PaymentMethodController::class);
        Route::post('change-password', [SettingController::class, 'updatePassword'])->name('password.update');
        Route::resource('orders', OrderController::class);
        Route::resource('email-settings', EmailSettingController::class);
        Route::post('/update-order-status', [OrderController::class, 'updateOrderStatus'])->name('update-order-status');

        Route::get('jobs', [CareerJobsController::class, 'index'])->name('jobs.index');
        Route::get('job-applicants', [JobApplicant::class, 'jobApplicants'])->name('job.applicants');
        Route::get('download/resume/{filename}', [JobApplicant::class, 'downloadResume'])->name('download.resume');
        Route::get('download/portfolio/{filename}', [JobApplicant::class, 'downloadPortfolio'])->name('download.portfolio');
        Route::get('jobs/create', [CareerJobsController::class, 'create'])->name('jobs.create');
        Route::post('jobs/store', [CareerJobsController::class, 'store'])->name('jobs.store');
        Route::Delete('jobs/destroy/{id}', [CareerJobsController::class, 'destroy'])->name('jobs.destroy');
        Route::get('jobs/trashed', [CareerJobsController::class, 'trashed'])->name('jobs.trashed');
    Route::put('jobs/restore/{id}', [CareerJobsController::class, 'restore'])->name('jobs.restore');
        Route::get('jobs/edit/{id}', [CareerJobsController::class, 'edit'])->name('jobs.edit');
        Route::put('jobs/update/{id}', [CareerJobsController::class, 'update'])->name('jobs.update');
        Route::Delete('job-applicants/destroy/{id}', [CareerJobsController::class, 'jobapplicantdestroy'])->name('job-applicants.destroy');



        Route::get('quizzes/question/create/{id}', [QuestionController::class, 'create'])->name('quiz.questions.create');
        Route::post('questions', [QuestionController::class, 'store'])->name('questions.store');
        Route::get('quizzes-questions-show/{id}', [QuestionController::class, 'questionsShow'])->name('quizzes.questions.show');
        Route::post('/update-answer', [QuestionController::class, 'updateAnswer'])->name('updateAnswer');



        Route::get('/quizzes', [QuizController::class, 'get'])->name('quizzes.index');
        Route::get('/quizzes/create', [QuizController::class, 'create'])->name('quizzes.create');
        Route::get('/quizzes/{quiz}/edit', [QuizController::class, 'edit'])->name('quizzes.edit');
        Route::put('/quizzes/{quiz}', [QuizController::class, 'update'])->name('quizzes.update');
        Route::delete('/quizzes/{quiz}', [QuizController::class, 'destroy'])->name('quizzes.destroy');


        Route::get('quizzes-questions/{id}', [\App\Http\Controllers\My\QuizController::class, 'create'])->name('quizzes-questions-create');
        Route::get('questions-index/{id}', [QuestionController::class, 'index'])->name('questions.index');



    });
});
Route::get('user-score', [\App\Http\Controllers\website\QuizController::class, 'UserScore'])->name('user.score');
// NOTIFICATIONS ROUTES START FROM HERE
Route::get('/notifications', [DashboardController::class, 'getNotifications']);
Route::match(['get', 'post'], '/update-notification-status', [DashboardController::class, 'updateStatus'])->name('update-notification-status');
// NOTIFICATIONS ROUTES END FROM HERE

// PERFECT MONEY ROUTES START FROM HERE

Route::post('reorder/{id?}', [OrderController::class, 'reOrder'])->name('re_order.store');
// PERFECT MONEY ROUTES END FROM HERE

Route::get('jobs', [CareerJobsController::class, 'jobList'])->name('jobs');
Route::post('job-apply', [CareerJobsController::class, 'jobApply'])->name('job.apply');

//PAYMENT ROUTES START FROM HERE
Route::get('payments/{id}', [PaymentsController::class, 'index'])->name('payments.page');
Route::get('paywithpaypal', [webPaypalController::class, 'payWithPaypal'])->name('paywithpaypal');
Route::post('paypal/{id?}', [webPaypalController::class, 'postPaymentWithpaypal'])->name('paypal');
Route::get('paypal', [webPaypalController::class, 'getPaymentStatus'])->name('status');
//PAYMENT ROUTES END FROM HERE


//Home ROUTES START FROM HERE
Route::get('home', [HomeController::class, 'home'])->name('home.page');
Route::get('tip/{id}', [HomeController::class, 'tip'])->name('tip.page');
Route::get('congratulation/{id}', [HomeController::class, 'congratulation'])->name('congratulation.page');
Route::get('product-search/{id}', [HomeController::class, 'productSearch'])->name('product.search');
Route::get('service/{id}', [HomeController::class, 'service'])->name('service.page');
Route::get('order_detail/{id}', [HomeController::class, 'orderDetail'])->name('order_detail.page');
Route::get('upload_file/{id}', [HomeController::class, 'uploadFile'])->name('upload_file.page');
Route::get('confirm-and-pay/{id}', [HomeController::class, 'confirmAndPay'])->name('confirm_and_pay.page');
//Home ROUTES END FROM HERE


//Website MAIN MENUS ROUTES END FROM HERE
Route::get('buy-services', [HomeController::class, 'buyServices'])->name('buy.services');
Route::get('blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('contact-us', [HomeController::class, 'contactUs'])->name('contact-us');
Route::get('about-us', [HomeController::class, 'aboutUs'])->name('about-us');
Route::get('careers', [HomeController::class, 'careers'])->name('careers');
Route::get('portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('quiz-contest', [HomeController::class, 'quizContest'])->name('quiz.contest');
Route::get('terms-and-conditions', [HomeController::class, 'termsAndConditions'])->name('terms.and.conditions');
//Website MAIN MENUS  ROUTES END FROM HERE
Route::post('/contact-submit', [HomeController::class, 'submit'])->name('contact.submit');

Route::controller(StripePaymentController::class)->group(function () {
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});
//Categories routes Start
Route::get('sub_category_detail_search/{id}', [HomeController::class, 'sub_category_detail_search'])->name('sub_category_detail_search');
Route::get('sub_category_detail_search/{id}', [HomeController::class, 'sub_category_detail_search'])->name('sub_category_detail_search');
//Categories routes End


Route::get('/checkout', [PaymentMethodController::class, 'checkout'])->name('checkout');
Route::post('/checkout/process', [PaymentsController::class, 'index'])->name('checkout.process');
Route::get('/payment/success', [PaymentsController::class, 'paymentSuccess'])->name('payment.success');


/*
Route::get('money', [PerfectMoneyController::class,'index'])->name('money');
Route::post('/perfect-money/status', [PerfectMoneyController::class, 'status'])->name('perfectmoney.status');
Route::post('/perfect-money/payment', [PerfectMoneyController::class, 'payment'])->name('perfectmoney.payment');
Route::post('/payment/cancel', [PerfectMoneyController::class, 'cancel'])->name('payment.cancel');
*/


Route::controller(PerfectMoneyController::class)->group(function () {
    Route::get('money', 'index')->name('money');
    Route::post('/perfect-money/status', 'status')->name('perfectmoney.status');
    Route::post('/perfect-money/payment', 'payment')->name('perfectmoney.payment');
    Route::post('/payment/cancel', 'cancel')->name('payment.cancel');
});


Route::get('/success', function () {
    // Return a view named 'example'
    return view('website.pages.success');
})->name('success');


//Route::post('admin-post-login', [AuthController::class, 'adminpostLogin'])->name('admin.login.post');
// Route::post('sendmessage', [ChatController::class, 'sendMessage'])->name('sendmessage');
// Route::post('password', [SettingController::class, 'update_password'])->name('password/update');
// Route::get('payments/{id}', [HomeController::class, 'payments'])->name('payments.page');
// Route::get('confirm_and_pay/{id}', [HomeController::class, 'confirm_and_pay'])->name('confirm_and_pay.page');
// Route::get('dashboard', [AuthController::class, 'dashboard']);

// Route::group(['middleware' => ['setlocale'],'prefix' => '{locale}', 'where' => ['locale' => '[a-zA-Z]{2}']], function() {

Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');



//Quizzes


Route::get('quiz', [\App\Http\Controllers\website\QuizController::class, 'index'])->name('quiz');
Route::get('quiz-test/{id}', [\App\Http\Controllers\website\QuizController::class, 'testAttempt'])->name('quiz-test');
Route::get('/quiz/{quizId}/attempt/{questionStep}', [\App\Http\Controllers\website\QuizController::class, 'testAttempt'])->name('quiz.attempt');
Route::post('/quiz/{quizId}/answer/{questionStep}', [\App\Http\Controllers\website\QuizController::class, 'submitAnswer'])->name('quiz.answer');
Route::get('/quiz/{quizId}/complete', [\App\Http\Controllers\website\QuizController::class, 'quizComplete'])->name('quiz.complete');



//Domain and hosting routes
Route::get('/domain/search', [DomainController::class, 'search'])->name('Domain.search');;
Route::post('/domain/register', [DomainController::class, 'register']);

Route::post('/hosting/create', [HostingController::class, 'create']);
Route::get('/hosting/plans', [HostingController::class, 'getPlans']);
Route::get('/namecheap/create-domain', [NamecheapController::class, 'createTestDomain']);
Route::get('/namecheap/get-domains', [NamecheapController::class, 'index']);

Route::get('/namecheap/check-domain', [NamecheapController::class, 'showDomainCheckForm'])->name('namecheap.showDomainCheckForm');
Route::post('/namecheap/check-domain', [NamecheapController::class, 'checkDomainAvailability'])->name('namecheap.checkDomainAvailability');
Route::post('/namecheap/get-domain-info', [NamecheapController::class, 'getDomainInfo'])->name('namecheap.getDomainInfo');
