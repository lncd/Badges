<?php
/**
* Badge
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
* Badge
*
* @category Badges
* @package  Badges
* @author   Jamie Mahoney <jmahoney@lincoln.ac.uk>
* @license  GNU Affero General Public License 3.0
* @link     coursedata.blogs.lincoln.ac.uk
*/
class Badge extends CI_Controller {

	/**
	* Index function
	*
	* @return Nothing
	* @access Public
	*/
	public function index()
	{
	}

	/**
	* Claim a badge
	*
	* @return Nothing
	* @access Public
	*/
	public function claim($id)
	{
		$this->load->model('core/badges_model', 'badges_model', TRUE);
		
		$data['assertion'] = $this->badges_model->get_badge_instance($this->session->userdata('person_id'), $this->input->get('badge'));
		
		$data['assertion'] = $data['assertion']['assertion'];
		if($data['assertion'] !== 0)
		{
			$data['badge_id'] = $this->input->get('badge');
			$badge_return = $this->badges_model->get_badge($data['badge_id']);

			$data['badge_details'] = $badge_return[0];
			$data['badge_data'] = $this->badges_model->get_badge_instance($this->session->userdata('person_id'), $this->input->get('badge'));

			$output  = $this->load->view('header_view', '', TRUE);
			$output .= $this->load->view('nav_view', '', TRUE);
			$output .= $this->load->view('claim_view', $data, TRUE);
			$output .= $this->load->view('footer_view', '', TRUE);

			$this->output->set_output($output);
		}
		else
		{
			echo 'No badge.';
		}
	}
}
?>