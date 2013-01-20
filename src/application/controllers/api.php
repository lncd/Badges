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
		if(($this->input->get('title')) && ($this->input->get('desc')) && ($this->input->get('img')) && ($this->input->get('source')))
		{
			$badge = new Badge();
			$badge->badge_name = $this->input->get('title');
			$badge->description = $this->input->get('desc');
			$badge->badge_source = (int) $this->input->get('source');
			$badge->badge_image = $this->input->get('img');

			$badge->save();

			$returning_id = $badge->id;

			$return->code = 201;
			$return->error = NULL;
			$return->message = 'Badge created successfully.';
			$return->data->object_id = $returning_id;
		}
		else
		{
			$return->code = 400;
			$return->error = "Not all required parameters have been declared";
			$return->message = "The following parameters are required: title, desc, img and source.";
			$return->data = NULL;
		}

		echo json_encode($return);
	}

	/**
	* Create an objective
	*
	* @return Nothing
	* @access Public
	*/
	public function create_objective()
	{
		$return = new stdClass();
		if(($this->input->get('text')) && ($this->input->get('type')))
		{
			
			$objective = new Objective();
			$objective->objective_text = $this->input->get('text');
			$objective->objective_type_id = (int) $this->input->get('type');
			$objective->save();

			$return->code = 201;
			$return->error = NULL;
			$return->message = 'Objective created successfully.';
			$return->data->object_id = $objective->id;
		}
		else
		{
			$return->code = 400;
			$return->error = "Not all required parameters have been declared";
			$return->message = "The following parameters are required: text, type.";
			$return->data = NULL;
		}

		echo json_encode($return);
	}

	/**
	* Create an objective type
	*
	* @return Nothing
	* @access Public
	*/
	public function create_objective_type()
	{
		$return = new stdClass();
		if($this->input->get('text'))
		{
			$obj_type = new Objective_type();
			$obj_type->objective_type = $this->input->get('text');
			$obj_type->save();

			$return->code = 201;
			$return->error = NULL;
			$return->message = "Objective type added successfully.";
			$return->data->object_id = $obj_type->id;	
		}
		else
		{
			$return->code = 400;
			$return->error = "Not all required parameters have been declared.";
			$return->message = "The following parameters are required: text.";
			$return->data = NULL;
		}

		echo json_encode($return);
	}
}
?>