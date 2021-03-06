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
	* @param int $earned_id ID of the badge earned
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

	/**
	* Completes the claim process
	*
	* @param int $instance_id ID of the badge instance to mark as claimed.
	*
	* @return Nothing
	* @access Public
	*/
	public function complete($instance_id)
	{
		$this->load->model('badge_model');
		if($this->badge_model->complete_claim_process($instance_id))
		{
			$this->session->set_flashdata('success', 'Badge claimed successfully.');
		}
		else
		{
			$this->session->set_flashdata('failure', 'Something went wrong!');
		}
		redirect(site_url() . 'home', 'location');
	}

}

// End of file claim.php
// Location: ./controllers/claim.php