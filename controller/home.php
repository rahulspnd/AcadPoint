<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('spanedea_helper');

        $this->ci =& get_instance();
        $this->ci->load->library('session');
        $this->load->helper('cookie');
    }

    public function index()
    {
        redirect();
        die();
    } //  end index()


    public function home_page()
    {
        include_once 's3/sdk.class.php';
        include_once 's3/services/s3.class.php';
        $header['title'] = "Spanedea";
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

/*        if(strpos($_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$_SERVER['REQUEST_URI'],"spanedea.com.au") !== false) {
            $this->responsiveview_template('home/home_page_au', $header, $data);
        } else {*/
            $this->responsiveview_template('home/home_page', $header, $data);
 /*       }  */


       /* $user = $this->id_auth->get_current_user();

        $data['user'] = $header['user'] = $this->id_auth->get_current_user();
        $header['nav'] = "home";
        $header['title'] = "Home Page";
        $this->responsiveview_template('home/home_page', $header, $data); */
    }
     function tutor_view_new($teacher_id = FALSE){
          $user = $this->id_auth->get_current_user();
           // Display ALL the faculty!
            //$data['featured_teachers'] = FeaturedTeacher::all();
            $data['categories'] = Category::find_all_by_parent_category_id('0');

            $data['teachers'] = $teachers = User::all(array(
                'joins' => array('user_categories','profile','tutor_stats'),
                'conditions' => array("spnd_user_profiles.teacher_profile = 'yes' AND spnd_teacher_categories.category_id = '77'  AND spnd_users.id != '473' "),
                'order' => " spnd_tutor_stats.hours_thought DESC ",
                'group' => " spnd_tutor_stats.user_id ",
                'offset' => 0,
                'limit' => 10,
            ));

            $header['nav'] = 'tutor';
            $header['title'] = "All Tutor";
            $header['user'] = $data['user'] = $user;

            $this->responsiveview_template('tutor/view-new', $header, $data);

    }

    function qetu246wryi135(){
        $user = $this->id_auth->get_current_user();

        $data['user'] = $header['user'] = $this->id_auth->get_current_user();
        $header['nav'] = "";
        $header['title'] = "";

        $this->load->view('home/xy34', $header, $data);
     }

     public function home_page_more_1()
    {
       $user = $this->id_auth->get_current_user();

        $data['user'] = $header['user'] = $this->id_auth->get_current_user();
        $header['nav'] = "home";
        $header['title'] = "Home Page";

        $this->responsiveview_template('home/home_page_more_1', $header, $data);
    }

      public function home_page_more_2()
    {
       $user = $this->id_auth->get_current_user();

        $data['user'] = $header['user'] = $this->id_auth->get_current_user();
        $header['nav'] = "home";
        $header['title'] = "Home Page";

        $this->responsiveview_template('home/home_page_more_2', $header, $data);
    }

     public function spanedea_testimonial()
    {
       $user = $this->id_auth->get_current_user();

        $data['user'] = $header['user'] = $this->id_auth->get_current_user();
        $header['nav'] = "home";
        $header['title'] = "Home Page";
        $data['testimonials']  = TeacherTestimonial::find('all', array(
                                    "conditions" => " testimonial !='' and user_id = '473' and approval = 'yes' ",
                                    "order" => "created_at DESC"
                                  ));

        $this->responsiveview_template('home/spanedea_testimonial', $header, $data);
    }


    public function math(){
        redirect('ask/math');

    }

    function questionshow($offset=0,$limit=100) {
        $data['questions'] = DBQuestions::all(array(
            'select' => " question , slug, id ",
            'conditions' => array(" status = 'accept' AND id >= '$offset' AND id <= '$limit' ")
        ));

        $header['nav'] = 'tutor';
        $header['title'] = "All Questions";
        $header['user'] = $data['user'] = $user = $this->id_auth->get_current_user();

        $this->responsiveview('home/question100', $header, $data);

    }

    public function thanks_ask(){

        $data['user'] = $header['user'] = $this->id_auth->get_current_user();
        $header['nav'] = '';
        $header['title'] = 'Continue';
        $this->responsiveview_template('ask/thanks_continue', $header, $data);

    }

}
?>