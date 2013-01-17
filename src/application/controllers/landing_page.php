<?php
/**
* Landing Page
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
* Landing Page
*
* @category Badges
* @package  Badges
* @author   Jamie Mahoney <jmahoney@lincoln.ac.uk>
* @license  GNU Affero General Public License 3.0
* @link     coursedata.blogs.lincoln.ac.uk
*/
class Landing_page extends CI_Controller {

	/**
	* Index function
	*
	* @return Nothing
	* @access Public
	*/
	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('landing_page');
		$this->load->view('includes/footer');
	}

	/**
	* Sign_in function
	*
	* @return Nothing
	* @access Public
	*/
	public function sign_in()
	{
		$this->session->set_userdata('user_id', 1);
		redirect(site_url(), 'home');
	}
}
?>