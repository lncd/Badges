<?php
/**
* Claim
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
* Claim
*
* @category Badges
* @package  Badges
* @author   Jamie Mahoney <jmahoney@lincoln.ac.uk>
* @license  GNU Affero General Public License 3.0
* @link     coursedata.blogs.lincoln.ac.uk
*/
class Claim extends CI_Controller {

	/**
	* Index function
	*
	* @return Nothing
	* @access Public
	*/
	public function index($earned_id)
	{
		$this->load->model('badge_model');
		$data['badge'] = $this->badge_model->get_earned_badge($earned_id);
		$this->load->view('includes/header');
		$this->load->view('claim', $data);
		$this->load->view('includes/footer');
		
	}
}

// End of file claim.php
// Location: ./controllers/claim.php