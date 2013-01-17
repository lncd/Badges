<?php
/**
* Home
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
* Home
*
* @category Badges
* @package  Badges
* @author   Jamie Mahoney <jmahoney@lincoln.ac.uk>
* @license  GNU Affero General Public License 3.0
* @link     coursedata.blogs.lincoln.ac.uk
*/
class Home extends CI_Controller {

	/**
	* Index function
	*
	* @return Nothing
	* @access Public
	*/
	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('home');
		$this->load->view('includes/footer');
	}
}
?>