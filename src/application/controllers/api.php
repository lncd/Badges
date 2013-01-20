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

	/**
	* Assign obj to badge
	*
	* @return Nothing
	* @access Public
	*/
	public function add_badge_objective()
	{
		$return = new stdClass();
		
		if(($this->input->get('badge')) && ($this->input->get('objective')))
		{
			$badge_obj = new Badge_objective();
			$badge_obj->where('badge_id', (int) $this->input->get('badge'));
			$badge_obj->where('objective_id', (int) $this->input->get('objective'));
			$badge_obj->get();

			if($badge_obj->badge_id)
			{
				$return->code = 409;
				$return->error = "Combination already exists. Cannot save duplicate data.";
				$return->message = "The combination of badge and objective already exists in the database.";
				$return->data = NULL;
			}
			else
			{
				$badge_obj->badge_id = (int) $this->input->get('badge');
				$badge_obj->objective_id = (int) $this->input->get('objective');
				$badge_obj->save();

				$return->code = 201;
				$return->error = NULL;
				$return->message = "Objective added to badge.";
				$return->data = NULL;
			}
		}
		else
		{
			$return->code = 400;
			$return->error = "Not all required parameters have been declared";
			$return->message = "The following parameters are required: badge, objective.";
			$return->data = NULL;
		}

		echo json_encode($return);
	}

	/**
	* Mark objective as complete for a user.
	*
	* @access Public
	* @return Nothing
	*/
	public function mark_objective_complete()
	{
		$return = new stdClass();
		if(($this->input->get('user')) && ($this->input->get('objective')))
		{
			$obj_complete = new Objective_complete();
			$obj_complete->where('user_id', (int) $this->input->get('user'));
			$obj_complete->where('objective_id', (int) $this->input->get('objective'));
			$obj_complete->get();

			if($obj_complete->id)
			{
				$return->code = 409;
				$return->error = "Combination already exists. Cannot save duplicate data.";
				$return->message = "The combination of user and objective already exists in the database.";
				$return->data = NULL;
			}
			else
			{
				$obj_complete->user_id = (int) $this->input->get('user');
				$obj_complete->objective_id = (int) $this->input->get('objective');
				$obj_complete->save();

				$return->code = 201;
				$return->error = NULL;
				$return->message = "Objective marked as complete for specified user.";
				$return->data = NULL;
			}
		}
		else
		{
			$return->code = 400;
			$return->error = "Not all required parameters have been declared";
			$return->message = "The following parameters are required: user, objective.";
			$return->data = NULL;
		}

		echo json_encode($return);
	}
}
?>