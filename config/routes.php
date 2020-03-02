<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "page";
$route['404_override'] = 'httperrors/show_404';
$route['register'] = 'launch/register1';
$route['dashboard-referral'] = 'page/dashboardreferral';
$route['dashboard-testimonial'] = 'page/dashboardtestimonial';
$route['dashboard-payment'] = 'page/dashboardpayment';
$route['dashboard'] = 'page/dashboard';
$route['search'] = 'courses/search';
$route['testimonials'] = 'site/testimonial';
$route['index1'] = 'page/index1';
$route['index2'] = 'page/index2';
$route['page/(:any)'] = 'page/find/$1';
$route['course/(:num)/edit/lessons'] = 'courses/edit_lessons/$1';
$route['course/(:num)/edit'] = 'courses/edit/$1';
$route['course/(:num)/buy'] = 'buy/course/$1';
$route['course/(:any)'] = 'courses/view/$1';
$route['trial/all'] = 'launch/trial_pack_all_exams';
$route['trial/(:any)'] = 'courses/view/$1';
$route['category/engineering_entrance/iit_jee/2015'] = 'courses/iitjee2015';
$route['category/engineering_entrance/iit_jee/2016'] = 'courses/iitjee2016';
//! Start: l2 page
$route['category/engineering-entrance/iit-jee'] = 'connect/category/engineering_entrance/iit_jee';
$route['category/engineering-entrance/bitsat'] = 'connect/category/engineering_entrance/bitsat';
$route['category/medical-entrance/pmt'] = 'connect/category/medical_entrance/pmt';
$route['category/aptitude-tests/sat-i'] = 'connect/category/aptitude_tests/sat_i';
$route['category/aptitude-tests/gre'] = 'connect/category/aptitude_tests/gre';
$route['category/aptitude-tests/gmat'] = 'connect/category/aptitude_tests/gmat';
$route['category/aptitude-tests/cat'] = 'connect/category/aptitude_tests/cat';
$route['category/english-proficiency/toefl'] = 'connect/category/english_proficiency/toefl';
//! End: l2 page
$route['category/(:any)'] = 'courses/category/$1';
$route['faculty/(:any)'] = 'faculty/index/$1';
$route['faculty/(:any)/(:any)'] = 'faculty/index/$1/$2';
$route['faculty/(:any)/(:any)/(:any)'] = 'faculty/index/$1/$2/$3';
$route['faculty/(:num)/courses'] = 'faculty/courses/$1';
//$route['faculty/(:num)/send_message'] = "messages/send/$1";
$route['message/(:num)'] = 'messages/view/$1';
$route['tutor/math'] = 'site/tutor_subject/maths';
$route['tutor/physics'] = 'site/tutor_subject/physics';
$route['tutor/chemistry'] = 'site/tutor_subject/chemistry';
$route['tutor/quantitative-aptitude'] = 'site/tutor_subject/quantitative-aptitude';
$route['tutor/biology'] = 'site/tutor_subject/biology';
$route['tutor/search']  = 'site/tutor_filter';
$route['tutor/(:any)'] = 'tutor/index/$1';
$route['tutor/(:any)/(:any)'] = 'tutor/index/$1/$2';
$route['tutor/(:any)/(:any)/(:any)'] = 'tutor/index/$1/$2/$3';
$route['tutor/(:num)/courses'] = 'tutor/courses/$1';
$route['class/(:num)'] = "classes/live/$1";
$route['CAT_Prep_1_on_1_Trial_Class_with_IIM_Alumni'] = 'launch/cat_prep_1_on_1_trial_class_with_iim_alumni';
$route['CAT_Prep_Webinar_with_IIM_Alumni'] = 'launch/cat_prep_webinar_with_iim_alumni';
$route['CAT_2013_-_5_Best_Test_Taking_Strategies_for_Quant_DI'] = 'launch/cat_2013_5_best_test_taking_strategies_for_quant_di';
$route['cat2013_4_month_roadmap_to_crack_verbal_ability_by_IIMA_alum'] = 'launch/cat2013_4_month_roadmap_to_crack_verbal_ability_by_IIMA_alum';
$route['all-about-iit-jee-you-must-know'] = 'launch/allaboutiitjeeyoumustknow';
$route['gmat'] = 'courses/redirectpage/gmat';
$route['iit_jee'] = 'courses/redirectpage/iit_jee';
$route['gre'] = 'courses/redirectpage/gre';
$route['cat'] = 'courses/redirectpage/cat';
$route['results_mock_cat_7july'] = 'connect/results_mock_cat_7july';
$route['results_mock_cat_21july'] = 'connect/results_mock_cat_21july';
$route['results_mock_cat_15aug'] = 'connect/results_mock_cat_15aug';
$route['results_mock_cat_8sept'] = 'connect/results_mock_cat_8sept';
$route['results_mock_cat_2oct'] = 'connect/results_mock_cat_2oct';
$route['cat_test'] = 'connect/cattest';
$route['teacher_blog_invites'] = 'connect/teacher_blog_invites';
$route['gre_vocabulary'] = 'courses/newlandingpage';
$route['gre-vocabulary-thank-you'] = 'connect/grevocabularythankyou';
$route['gd-pi-wat-group-discussion-and-personal-interview'] = 'courses/gdpipage';
$route['gd-pi-wat-thank-you'] = 'connect/gdpiwatthankyou';
$route['iit-jee-2014-mains-and-advanced-crash-courses'] = 'courses/iitjee2014';
$route['iit-jee-forum'] = 'site/iitjeeforum';
$route['virtual-classroom-demo'] = 'launch/virtualclassroomdemo';
$route['virtual-classroom-demo-for-teacher'] = 'launch/virtualclassroomdemoforteacher';
$route['internet-speed-test'] = 'launch/internetspeedtest';
$route['geo/engineering-entrance/iit-jee-coaching-in-dubai'] = 'courses/engineering_entrance_iit_jee_coaching_in_dubai';
$route['geo/engineering_entrance/iit-jee-coaching-in-dubai'] = 'courses/engineering_entrance_iit_jee_coaching_in_dubai1';
//! Events
$route['events/iit-jee'] = 'events/iit_jee';
$route['iit-jee/make-your-own-course'] = 'launch/make_your_own_course';
$route['others/make-your-own-course'] = 'launch/make_your_own_course_others';
$route['iit-jee/application-for-trial'] = 'launch/application_for_trial_iit_jee';
$route['how-to-start'] = 'launch/howtostart';
$route['classroom/(:any)'] = 'launch/classroom/$1';
$route['specify-your-schedule'] = 'buy/specifyyourschedule';
$route['a'] = 'launch/vcd';
$route['t'] = 'launch/vcdt';
$route['t10'] = 'launch/vcdt10';
//! Gauri
$route['how-it-works'] = 'launch/howitworks';
$route['compare-online-tutoring-programs'] = 'launch/compareonlinetutoringprograms';
$route['tutor/how-it-works'] = 'launch/howitworkstutor';
$route['tutor/why-teach-at-spanedea'] = 'launch/whyteachatspanedea';
$route['faq/student'] = 'faqs/student';
$route['faq/tutor'] = 'faqs/tutor';
$route['faq'] = 'faqs/index';
$route['application-for-trial'] = 'launch/application_for_trial_new';
$route['application-for-trial-class'] = 'launch/applyfortrial';
$route['join/referrals/bring-friends-fifty'] = 'launch/referralpage';
$route['join/referrals/friend-gift/(:any)'] = 'launch/referee/$1';
$route['contact-us'] = 'page/contactus';
$route['tutor/customer-service'] = 'page/tutorscustomerservice';
$route['customer-service'] = 'page/studentscustomerservice';
$route['payment-response'] = 'buy/paymentresponse';
$route['payment-paypal-response'] = 'buy/paymentpaypalresponse';
$route['compare-online-tutoring-programs'] = 'launch/compareonlinetutoringprograms';
$route['partner-with-us'] = 'site/partners';
$route['get-started'] = 'connect/newhome1';
$route['join/referrals/bring-friends-GV200'] = 'site/referral_page_all';
$route['join/referrals/friend-gift-300115/(:any)'] = 'launch/referee_page/$1';
$route['iit-jee/(:any)/(:any)'] = 'courselessons/index/iit_jee/$1/$2';
$route['pmt/(:any)/(:any)'] = 'courselessons/index/pmt/$1/$2';
$route['bitsat/(:any)/(:any)'] = 'courselessons/index/bitsat/$1/$2';
$route['cat/(:any)/(:any)'] = 'courselessons/index/cat/$1/$2';
$route['sat-i/(:any)/(:any)'] = 'courselessons/index/sat_i/$1/$2';
$route['gre/(:any)/(:any)'] = 'courselessons/index/gre/$1/$2';
$route['gmat/(:any)/(:any)'] = 'courselessons/index/gmat/$1/$2';
$route['article'] = 'articlem/index';
$route['article/(:any)'] = 'articlem/index/$1';
$route['offer-special-199-gets-four-hours'] = 'site/offer_page';
$route['choose-topics-make-your-own-course'] = 'site/drag_drop_demo';
$route['notification/(:any)'] = 'notification_new/index/$1';
$route['notification'] = 'notification_new/notification_cover';
$route['iit-jee-2016'] = 'site/category_year_2016/iit_jee';
$route['iit-jee-2017'] = 'site/category_year_2017/iit_jee';
$route['iit-jee-2018'] = 'site/category_year_2018/iit_jee';
$route['iit-jee-2019'] = 'site/category_year_2019/iit_jee';
$route['dashboard-new'] = 'site/dashboard_new';
$route['al-tu-1'] = 'tutor/all1';
$route['become-an-affiliate'] = 'affiliates/affiliate_register';
//ASK QUESTIONS
$route['ask/Math'] = "home/math";
$route['ask/thanks-continue'] = "home/thanks_ask";
$route['ask/ask_question_form'] = "ask/ask_question_form";
$route['ask/(:any)'] = 'ask/index/$1';
$route['tutor-on-spanedea'] = 'site/tutoronspanedea';

$route['virtual-classroom-for-teacher'] = 'site/virtualclassroomforteacher';
$route['application-for-trial-aff400'] = 'site/applicationfortrialaff400';
$route['about-us'] = 'site/aboutusnew';
$route['privacy-policy'] = 'site/privacypolicy';
$route['terms-of-use'] = 'site/termsofuse';
$route['uploads/(:any)'] = 'launch/howitworkstutor';
$route['documents/(:any)'] = 'launch/howitworkstutor';
$route['application-for-trial-tutor-FC100'] = 'site/application_for_trial_tutor_page';

$route['dashboard-new-rahul'] = 'site/dashboard_new_rahul';
$route['sign-up-credits'] = 'site/sign_up_referral';
$route['more-1'] = 'home/home_page_more_1';
$route['more-2'] = 'home/home_page_more_2';
$route['application-for-trial-FC100'] = 'site/application_for_trial_random';

$route['testimonial/(:any)'] = 'common/writetestimonial/$1';
$route['join/referrals/bring-friends-SC5000'] = 'site/referral_page_sign_up';
$route['join/referrals/friend-gift-120615/(:any)'] = 'site/referee_page_sign_up/$1';

$route['help-students-join'] = 'site/referralpagetutor';
$route['join-spanedea-tutoring-service/(:any)'] = 'site/refereepagetutor/$1';
$route['launch/email-return/(:any)'] = 'launch/login_checkout/$1';
$route['testimonial-for-spanedea'] = "home/spanedea_testimonial";

$route['ask-1'] = "home/questionshow/0/100";
$route['ask-2'] = "home/questionshow/101/200";
$route['ask-3'] = "home/questionshow/201/300";
$route['ask-4'] = "home/questionshow/301/400"; 
$route['bring-friends-T10'] = 'site/referral_bring_friend_to10';

$route['application-for-trial-FC100-free'] = 'site/request_new_tutor';
$route['new-home/search'] = 'page/home_page_new';
$route['vc6379'] = 'site/classroom_audio';
//$route['tech-check'] = 'site/techcheck';
$route['tech-check'] = 'site/techcheck1';
$route['troubleshoot-procedure'] = 'site/classroom_tbls';
$route['online-classroom'] = 'wb/vcom1085';
$route['soc-vid1'] = 'wb/vcom1085_5801';
$route['soc-vid2'] = 'wb/vcom1085_58012';

$route['tutor/engineering_entrance/iit_jee/maths'] = 'tutor/iitjee_subject/maths';
$route['tutor/engineering_entrance/iit_jee/physics'] = 'tutor/iitjee_subject/physics';
$route['tutor/engineering_entrance/iit_jee/chemistry'] = 'tutor/iitjee_subject/chemistry';

$route['join/referrals/bring-friends-SC500ForR'] = 'referral_referee/referral_sc500';
$route['join/referrals/friend-gift-041215/(:any)'] = 'referral_referee/referee_sc500/$1';
$route['CAT-AFT'] = 'site/application_for_trial_cat';
$route['lp/jee/doubt-clearing-march-2016'] = 'ads/ads_template';
$route['lp/thank-you'] = 'ads/thank_you_ads';
$route['lp/jee/doubt-clearing-march-2016-2'] = 'ads/iitjee_lp';
$route['lp/jee/counselling-neepa-shah-april-2016'] = 'ads/iitjee_lp_counselling';
$route['lp/cat/coaching-courses-online'] = 'ads/cat_course_lp';
$route['webinar-cat-quant-alligations'] = 'ads/cat_webinar_lp';
$route['feedback-cat-webinar-alligation'] = 'ads/cat_webinar_feedback';
$route['lp/iitjee/coaching-courses-online'] = 'ads/iitjee_foundation_course';
$route['webinar/iitjee-physics-kinematics'] = 'ads/iitjee_webinar_lp_km';
$route['webinar/cat-verbal-subject-verb-agreement'] = 'ads/cat_webinar_lp_verbal';
$route['webinar/iitjee-thermodynamics'] = 'ads/iitjee_webinar_diff_cal';
$route['webinar/cat-quants-numbers-theory'] = 'ads/cat_webinar_lp_quants_second';
$route['webinar/cat-quants-time-speed-distance'] = 'ads/cat_webinar_lp_quants_third';
$route['webinar-registration'] = 'ads/entry_point_for_webinar';
$route['webinar/(:any)'] = 'webinar/webinar_template/$1';
$route['thank-you'] = 'ads/thank_you_cat';
$route['cat/doubt-clearing-sessions-2016'] = 'ads/cat_lp';
/* End of file routes.php */
/* Location: ./application/config/routes.php */
?>
