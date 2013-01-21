<?php
/**
* Signin
*
* PHP Version 5
* 
* @category  Badges
* @package   Badges
* @author    Jamie Mahoney <jmahoney@lincoln.ac.uk>
* @copyright 2013 University of Lincoln
* @license   GNU Affero General Public License 3.0
* @link      coursedata.blogs.lincoln.ac.uk
*/

/**
* Signin
*
* @category Badges
* @package  Badges
* @author   Jamie Mahoney <jmahoney@lincoln.ac.uk>
* @license  GNU Affero General Public License 3.0
* @link     coursedata.blogs.lincoln.ac.uk
*/
class Signin extends CI_Controller {

	/**
	* Index function
	*
	* @return Nothing
	* @access Public
	*/
	public function index()
	{
		$oauth_token = $this->input->get('code');
		$this->load->library('curl');
		$the_url = 'https://sso.lincoln.ac.uk/oauth/access_token';
		$post_params['grant_type'] = 'authorization_code';
		$post_params['client_id'] = $_SERVER['SSO_CLIENT_ID'];
		$post_params['client_secret'] = $_SERVER['SSO_CLIENT_SECRET'];
		$post_params['redirect_uri'] = $_SERVER['SSO_REDIRECT'];
		$post_params['code'] = $this->input->get('code');
		$query_response = $this->curl->simple_post($the_url, $post_params, array(CURLOPT_SSL_VERIFYPEER => FALSE, CURLOPT_SSL_VERIFYHOST => FALSE));
	
		$response = json_decode($query_response);

		echo '<pre>';
		print_r($response);
		echo '</pre>';
	}

	/**
	* Sign out
	*
	* @return Nothing
	* @access Public
	*/
	public function signout()
	{
		$this->session->unset_userdata('user_id');
		redirect(site_url(), 'location');
	}
}

// End of file signin.php
// Location: ./controllers/signin.php