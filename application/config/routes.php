<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// -------------------------- login and register -----------------------------

$route['login']['get'] = 'Auth/login';
$route['me']['post'] = 'Auth/login';
$route['signup']['get'] = 'Auth/register';
$route['register']['post'] = 'Auth/register';
$route['forgot']['get'] = 'Auth/forgot_password';
$route['check']['post'] = 'Auth/forgot_password';
$route['change']['get'] = 'Auth/reset_password';
$route['reset']['post'] = 'Auth/reset_password';
$route['logout']['get'] = 'Auth/logout';

// ----------------------------- frontend Pages ----------------------------------

$route['/']['get'] = 'Pages';
$route['about-us']['get'] = 'Pages/about_us';
$route['how-to-play']['get'] = 'Pages/how_to_play';
$route['play-now']['get'] = 'Pages/play_now';
$route['donate']['get'] = 'Pages/donate';
$route['donate/add']['post'] = 'Pages/add_donate';
$route['faqs']['get'] = 'Pages/faqs';
$route['contact-us']['get'] = 'Pages/contact_us';
$route['send-email']['post'] = 'Pages/contact_us';
$route['winners']['get'] = 'Pages/winners';


// ---------------------- Paystack Pages ------------------------------

$route['pay/(:num)'] = 'Paystack/Paystack_inline/$1';
$route['success']['get'] = 'Paystack/success';
$route['fail']['get'] = 'Paystack/fail';

// ----------------------------- user-dashboard ----------------------------------

$route['user']['get'] = 'Users/dashboard';
$route['user/profile']['get'] = 'Users/profile';
$route['user/profile/update']['post'] = 'Users/update_profile';
$route['user/payment-profile']['get'] = 'UserPayments/view';
$route['user/payment-profile/create']['get'] = 'UserPayments';
$route['user/payment-profile/save']['post'] = 'UserPayments/save';
$route['user/lottery/play']['get'] = 'Draw_Lotteries';
$route['user/lottery/store']['post'] = 'Draw_Lotteries/save';
$route['user/deposits']['get'] = 'Deposits/view';
$route['user/add-deposit']['get'] = 'Deposits';
$route['user/deposit/add']['post'] = 'Deposits/add_deposit';
$route['user/deposit/now/(:num)'] = 'Paystack/pay_now/$1';
$route['user/purchase']['get'] = 'Purchases/view';
$route['user/winnings']['get'] = 'Winnings/view';
$route['user/commissions']['get'] = 'Commissions/view';
$route['user/withdrawals']['get'] = 'Withdrawals/view';
$route['user/withdrawal/request']['get'] = 'Withdrawals';
$route['user/withdrawal/add']['post'] = 'Withdrawals/add';
$route['user/transactions']['get'] = 'Transactions/view';
$route['user/referrals']['get'] = 'Referrals/view';
$route['user/reset']['get'] = 'Users/update_password';
$route['user/update']['post'] = 'Users/update_password';
$route['user/testimonials']['get'] = 'Testimonials/view';
$route['user/add-testimonial']['get'] = 'Testimonials';
$route['user/testimonial/add']['post'] = 'Testimonials/add_testimonial';
$route['user/supports']['get'] = 'Supports/view';
$route['user/add-support']['get'] = 'Supports';
$route['user/ticket/add']['post'] = 'Supports/add_support';


// --------------------------- admin-dashboard --------------------------------

$route['admin']['get'] = 'Admins';
$route['admin/login']['post'] = 'Admins/login';
$route['admin/logout']['get'] = 'Admins/logout';
$route['admin/update-password']['get'] = 'Admins/update_password';
$route['admin/update-password']['post'] = 'Admins/update_password';

$route['admin/dashboard']['get'] = 'Admins/admin_dashboard';
$route['admin/counter']['get'] = 'Admins/counter';
$route['admin/counter/save']['post'] = 'Admins/save_counter';
$route['admin/deposits']['get'] = 'Admins/deposits';
$route['admin/draw-history']['get'] = 'Admins/draw_history';
$route['admin/manage-lottery']['get'] = 'Manage_Lotteries/view';
$route['admin/manage-lottery/add']['post'] = 'Manage_Lotteries/add';
$route['admin/manage-lottery/(:num)/edit']['post'] = 'Manage_Lotteries/edit/$1';
// $route['admin/manage-lottery/delete/(:num)']['get'] = 'Lotteries/delete/$1';
$route['admin/business-funding']['get'] = 'Draw_Lotteries/business_view';
$route['admin/house-rent']['get'] = 'Draw_Lotteries/house_view';
$route['admin/school-fees']['get'] = 'Draw_Lotteries/school_view';
$route['admin/winners']['get'] = 'Admins/results';
$route['admin/testimonial']['get'] = 'Admins/testimonial';
$route['admin/transactions']['get'] = 'Admins/transactions';
$route['admin/user-payment-profiles']['get'] = 'Admins/user_payment_profiles';
$route['admin/users']['get'] = 'Admins/users';
$route['admin/withdrawal-requests']['get'] = 'Admins/withdrawal_requests';

 // ======================= Make Winner ====================

$route['admin/business-funding/win']['post'] = 'Draw_Lotteries/win';
$route['admin/house-rent/win']['post'] = 'Draw_Lotteries/win';
$route['admin/school-fees/win']['post'] = 'Draw_Lotteries/win';

// ======================= Make Loser ====================

$route['admin/business-funding/loss']['post'] = 'Draw_Lotteries/loss';
$route['admin/house-rent/loss']['post'] = 'Draw_Lotteries/loss';
$route['admin/school-fees/loss']['post'] = 'Draw_Lotteries/loss';
