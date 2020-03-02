<?php

class FacebookLogin {
	//const AUTHORIZE_URL = 'https://graph.facebook.com/oauth/authorize';
	const AUTHORIZE_URL = 'https://www.facebook.com/dialog/oauth';
    const TOKEN_URL = 'https://graph.facebook.com/oauth/access_token';
	const PROFILE_URL = 'https://graph.facebook.com/me';
	const GENERAL_URL = 'https://graph.facebook.com';

	private $client_id;
	private $client_secret;
	private $my_url;
	private $user_data;

	/**
	 * Create an instance of the FacebookLogin class
	 */
	public function __construct($client_id, $client_secret,$url = '')
	{
	    if($url == '') {
            $url = site_url("spndfacebook");
	    }
		$this->client_id = $client_id;
		$this->client_secret = $client_secret;
		$this->my_url = $url;//'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
	}

	/**
	 * Do a Facebook login - either redirects to Facebook or reads the returned result
	 */
	public function doLogin()
	{
		// Are we not returning from Facebook (ie. starting the login)?
		return !isset($_GET['code']) ? $this->startLogin() : $this->verifyLogin();
	}

    public function doLogin1()
	{
		// Are we not returning from Facebook (ie. starting the login)?
		return !isset($_GET['code']) ? $this->startLogin1() : $this->verifyLogin();
	}

	/**
	 * Start a login with Facebook - Redirect to their authentication URL
	 */
	private function startLogin()
	{
		$data = array(
			'client_id' => $this->client_id,
			'redirect_uri' => $this->my_url,
			'state' => md5(date("Y-m-d H:i:s")),
            'scope' => 'email'
		);

		header('Location: ' . self::AUTHORIZE_URL . '?' . http_build_query($data));
		die();
	}

    /**
	 * Start a login with Facebook - Redirect to their authentication URL
	 */
	private function startLogin1()
	{
		$data = array(
			'client_id' => $this->client_id,
			'redirect_uri' => $this->my_url,
			'state' => md5(date("Y-m-d H:i:s")),
            'scope' => 'ads_management'
		);

		header('Location: ' . self::AUTHORIZE_URL . '?' . http_build_query($data));
		die();
	}

	/**
	 * Verify the token we receive from Facebook is valid, and get the user's details
	 */
	private function verifyLogin()
	{
		$data = array(
			'client_id' => $this->client_id,
			'redirect_uri' => $this->my_url,
			'client_secret' => $this->client_secret,
			'code' => $_GET['code'],
		);

		// Get an access token
		$result = @file_get_contents(self::TOKEN_URL . '?' . http_build_query($data));
		parse_str($result, $result_array);

		// Make sure we actually have a token
		if (empty($result_array['access_token']))
			throw new Exception('Invalid response received from Facebook. Response = "' . $result . '"');

		// Grab the user's data
		$this->access_token = $result_array['access_token'];
		$this->user_data = json_decode(file_get_contents(self::PROFILE_URL . '?access_token=' . $this->access_token));
		//$this->user_data[] = json_decode(file_get_contents('https://graph.facebook.com/me/friends?access_token=' . $this->access_token));
		return $this->user_data;
	}

	/**
	 * Helper function to get the user's Facebook info
	 */
	public function getUser()
	{
		return $this->user_data;
	}

    /**
	 * Helper function to get the user's Facebook info
	 */
	public function getAccessToken()
	{
		return $this->access_token;
	}


    public function postfeed($message = '',$picture_url = '',$link = '',$name = '',$caption = '',$description = '') {
		$data = array(
			'message' => $message,
			'picture' => $picture_url,
			'link' => $link,
			'name' => $name,
			'caption' => $caption,
			'description' => $description,
			'access_token' => $this->access_token,
		);

        //source, place, tags
        // /PROFILE_ID/feed
		// Get an access token
		//$result = @file_get_contents(self::GENERAL_URL . '/'.$this->user_data->id.'/feed?' . http_build_query($data));
        //echo $result;
		//parse_str($result, $result_array);
        //print_r($result_array);

        $ch = curl_init();

	    //set the url, number of POST vars, POST data
	    curl_setopt($ch,CURLOPT_URL,self::GENERAL_URL . '/'.$this->user_data->id.'/feed');
	    curl_setopt($ch,CURLOPT_POST,count($data));
	    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data));

	    //execute post
	    $result = curl_exec($ch);
        echo $result;
	    //close connection
	    curl_close($ch);

	}

    public function adsstats() {
		$data = array(
			//'message' => $message,
			//'picture' => $picture_url,
			//'link' => $link,
			//'name' => $name,
			//'caption' => $caption,
			//'description' => $description,
			'access_token' => $this->access_token,
		);

        //source, place, tags
        // /PROFILE_ID/feed
		// Get an access token
		//$result = @file_get_contents(self::GENERAL_URL . '/'.$this->user_data->id.'/feed?' . http_build_query($data));
        //echo $result;
		//parse_str($result, $result_array);
        //print_r($result_array);

        $ch = curl_init();

	    //set the url, number of POST vars, POST data
	    //curl_setopt($ch,CURLOPT_URL,self::GENERAL_URL . '/'.$this->user_data->id.'/adcampaignstats');
        echo self::GENERAL_URL . '/act_'.$this->user_data->id.'/stats?access_token=' . $this->access_token;
	    curl_setopt($ch,CURLOPT_URL,self::GENERAL_URL . '/act_'.$this->user_data->id.'/stats?access_token=' . $this->access_token);
	    //curl_setopt($ch,CURLOPT_POST,count($data));
	    //curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data));

	    //execute post
	    $result = curl_exec($ch);
        echo $result;
	    //close connection
	    curl_close($ch);

	}

    function saveAccesstoken($access_token) {
        $this->access_token = $access_token;
    }
}

?>