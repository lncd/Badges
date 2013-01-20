<?php
/**
* API
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
* API
*
* @category Badges
* @package  Badges
* @author   Jamie Mahoney <jmahoney@lincoln.ac.uk>
* @license  GNU Affero General Public License 3.0
* @link     coursedata.blogs.lincoln.ac.uk
*/
class Api extends CI_Controller {

	/**
	* Index function
	*
	* @return Nothing
	* @access Public
	*/
	public function index()
	{
		$return = new stdClass();
		$return->code = 204;
		$return->error = "No method declared.";
		$return->message = "Please specify a method.";
		$return->data = NULL;

		echo json_encode($return);
	}

	/**
	* Create a badge.
	*
	* @return Nothing
	* @access Public
	*/
	public function create_badge()
	{
		$return = new stdClass();
		if(($this->input->get('title')) && ($this->input->get('desc')) && ($this->input->get('img')))
		{

		}
		else
		{
			$return->code = 400;
			$return->error = "Not all required parameters have been declared";
			$return->message = "The following parameters are required: title, desc and img.";
			$return->data = NULL;
		}

		echo json_encode($return);
	}
}
?>