<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('spanedea_helper');
        $this->load->helper('tutorstamp_dashboard_helper');
        $this->load->helper('tsdb_helper');

        $this->ci =& get_instance();
        $this->ci->load->library('session');
        $this->load->helper('cookie');
    }

    //! index page ( Home Page )
    function index() {
        include_once 's3/sdk.class.php';
        include_once 's3/services/s3.class.php';
        $header['title'] = "Acadpoint";
        $user = $this->id_auth->get_current_user();
        $data['user'] = $header['user'] = $user;
        $header['nav'] = 'home';
        $aft_type = get_cookie('aft_type',true);
        if($aft_type == '') {
            $random_num = rand(0,999999);
            $type = $random_num % 2;
            if($type == 0) {
                $aft_type = 2;
            } else {
                $aft_type = 1;
            }
            set_cookie('aft_type', $aft_type, time() + 86400,'','/');
        }

        $data['aft_type'] = $aft_type;
        $this->load->helper('contents_helper');
        $data['contents'] = read_content_json();

        if(strpos($_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$_SERVER['REQUEST_URI'],"spanedea.com.au") !== false) {
            $this->responsiveview_template('home/home_page_au', $header, $data);
        } else {
            //$this->responsiveview_template('home/home_page_new', $header, $data);
            $this->responsiveview_template('home/home_page_new1', $header, $data);
        }
    }

    function dashboardreferral () {
        redirect("dashboard?select_tab=Referral&select_sub_tab=referralform");
    }

    function dashboardtestimonial () {
        redirect("dashboard?select_tab=spanedea_profile&select_sub_tab=mytestimonials");
    }

    function dashboardpayment () {
        redirect("dashboard?select_tab=Payments&select_sub_tab=payment_make_payment");
    }

    //! Dashboard
    function dashboard() {
        set_time_limit(120);
        require_once('gtm/gtm.php');

        $this->ci->load->library('Mobile_Detect');
        $this->load->helper('profile_helper');

        if (!$this->id_auth->is_logged_in()) {
            $this->session->set_flashdata('login',array(
                'type' => 'error',
                'message' => 'Please login to continue',
            ));
            if(isset($_REQUEST['select_sub_tab'])) {
                if($_REQUEST['select_sub_tab'] == 'referralform' ) {
                    redirect('launch/login?rd=dashboard-referral');
                    die();
                }
            }

            if(isset($_REQUEST['select_sub_tab'])) {
                if($_REQUEST['select_sub_tab'] == 'mytestimonials' ) {
                    redirect('launch/login?rd=dashboard-testimonial');
                    die();
                }
            }

            if(isset($_REQUEST['select_sub_tab'])) {
                if($_REQUEST['select_sub_tab'] == 'payment_make_payment' ) {
                    redirect('launch/login?rd=dashboard-payment');
                    die();
                }
            }
            
            if(isset($_REQUEST['select_sub_tab'])) {
                if($_REQUEST['select_sub_tab'] == 'inbox' ) {
                    redirect('launch/login?rd=dashboard-inbox');
                    die();
                }
            }

            redirect('launch/login?rd=dashboard');
            die();
        } else {
            $data['user'] = $header['user'] = $this->id_auth->get_current_user();
            $login_check = 0;
            if(@$this->ci->session->userdata('user_flag') == 1) {
                $login_check = 1;
            } else if($data['user']->profile->tutor_bureau_profile == 'yes' || $data['user']->profile->tutor_bureau_profile == 'pending') {
                $login_check = 1;
            } else if($data['user']->profile->affiliate_flag == 'yes') {
                $login_check = 1;
            } else if (@$_REQUEST['select_tab'] == 'Payments' && @$_REQUEST['select_sub_tab'] == 'payment_view_signup_credit' ) {
                $this->ci->session->set_userdata(array(
                                'user_flag'     =>  '1'
                            ));
                $login_check = 1;
            } else {
                $this->session->set_flashdata('login',array(
                    'type' => 'error',
                    'message' => 'Please login to continue',
                ));
                redirect('launch/login?rd=dashboard');
                die();
            }
        }

        if ($this->session->flashdata('quizadded') != '') {
            $data['msg'] = $this->session->flashdata('quizadded') ;
        }
        if ($this->session->flashdata('msg') != '') {
            $data['msg'] = $this->session->flashdata('quizadded') ;
        }        

        $header['nav'] = 'dashboard';
        $header['title'] = 'Dashboard';

        //check whether the user has access to CRM & TRM access

        $config1 = array('user_id'=>$data['user']->id );
        // TODO: avoid passing config two times
        $this->load->library('SACL',$config1);
        $sacl1 = new SACL($config1);
        $data['access'] = 0;
        $u_id = $data['user']->id;
        $crm_users = array(2,22918,18773);
        if(($sacl1->has_permission('trm_access') || $sacl1->has_permission('crm_access')) && (in_array($u_id, $crm_users))){
            $data['access'] = 1;
        }

        if($data['user']->profile->tutor_bureau_profile == 'yes' || $data['user']->profile->tutor_bureau_profile == 'pending') {
            $this->responsiveview('dashboard/partner_dashboard', $header, $data);
        } else if($data['user']->profile->teacher_profile == 'yes') {
            //$this->responsiveview('dashboard/teacher_dashboard', $header, $data);

            $detect = new Mobile_Detect;

            if($detect->isMobile() || $detect->isTablet()) {
                if(@$_REQUEST['desktop_version'] == 'true' ) {
                    $this->responsiveview_template('dashboard/teacher_dashboard', $header, $data);
                } else {
                    $this->new_responsiveview('dashboard/tutor_mobile_dashboard', $header, $data);
                }
            } else {				
				$this->responsiveview_template('dashboard/teacher_dashboard', $header, $data);				
            }
            //echo $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

        } else if($data['user']->profile->ambassador_status == 'yes') {
            $this->template('dashboard/intern_dashboard', $header, $data);
        } else if($data['user']->profile->affiliate_flag == 'yes') {
            $this->responsiveview('dashboard/affiliate_dashboard', $header, $data);
        } else {
            $detect = new Mobile_Detect;

            if($detect->isMobile() || $detect->isTablet()) {
                if(@$_REQUEST['desktop_version'] == 'true' ) {
                    $this->responsiveview_template('dashboard/index', $header, $data);
                } else {
                    $this->new_responsiveview('dashboard/mobile_dashboard', $header, $data);
                }
            } else {
                $this->responsiveview_template('dashboard/index', $header, $data);
            }
            //echo $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

        }
    }

    function find($slug) {
        if ($this->uri->segment(3) != '') {
            // 'tis a subpage
            $page = $this->uri->segment(3);
        } else {
            $page = $slug;
        }

        //! Temp Redirection
        if($page == 'team') {
            $page = $slug = 'about';
        }

        if($page == 'faq' ) {
            redirect("faq/student");
            die();
        }

        if($page == 'teacher' ) {
            redirect("tutor/how-it-works");
            die();
        }

        if($page == 'student' ) {
            redirect("how-it-works");
            die();
        }

        if($page == 'contact' ) {
            redirect("contact-us");
            die();
        }

        if (@file_exists(APPPATH."views/page/pages/{$page}.php")) {
            $data['user'] = $header['user'] = $this->id_auth->get_current_user();
            $header['nav'] = $slug;
            $header['title'] = ucwords($page);

            /*if($page == "team") {
                $this->template('page/pages/'.$page.'.php', $header, $data);
            } else {
                $this->responsiveview_template('page/pages/'.$page.'.php', $header, $data);
            }*/

            if($page == "about") {
                redirect("about-us");
                die();
            } else if($page == "terms") {
                redirect("terms-of-use");
                die();
            } if($page == "privacy") {
                redirect("privacy-policy");
                die();
            } else {
                redirect('');
                die();
            }

        } else {
	        // show_404();
	        redirect('');
            die();
        }
    }

    function contactus() {
        $data['user'] = $header['user'] = $this->id_auth->get_current_user();
        $header['nav'] = '';
        $header['title'] = "Contact us";

        $this->responsiveview_template('page/contactus', $header, $data);
    }


    function tutorscustomerservice() {
        $data['user'] = $header['user'] = $this->id_auth->get_current_user();
        $header['nav'] = '';
        $header['title'] = "Tutors Customer Service";

        $this->responsiveview_template('page/tutorscustomerservice', $header, $data);
    }

    function studentscustomerservice() {
        $data['user'] = $header['user'] = $this->id_auth->get_current_user();
        $header['nav'] = '';
        $header['title'] = "Students Customer Service";

        $this->responsiveview_template('page/studentscustomerservice', $header, $data);
    }

}
?>
