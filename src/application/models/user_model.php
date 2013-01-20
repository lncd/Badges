<?php
/**
* User_model
*
* PHP Version 5
* 
* @category  Badges
* @package   Badges
* @author    Jamie Mahoney <jmahoney@lincoln.ac.uk>
* @copyright 2012 University of Lincoln
* @license   GNU Affero General Public License 3.0
* @link      coursedata.blogs.lincoln.ac.uk
*/

/**
* User_model
*
* @category Badges
* @package  Badges
* @author   Jamie Mahoney <jmahoney@lincoln.ac.uk>
* @license  GNU Affero General Public License 3.0
* @link     coursedata.blogs.lincoln.ac.uk
*/
class User_model extends CI_Model
{
	/**
	* Constructor.
	*
	* @access Public
	* @return Nothing
	*/
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	/**
	* Get user by id.
	*
	* @param int $id ID of the user to return.
	*
	* @access Public
	* @return Object representing the user.
	*/
	function get_by_id($id)
	{
		$user = new User();
		$user->where('id', $id)->get();

		return $user->stored;
	}

	/**
	* Get badges that have been awarded to a user.
	*
	* @param int $id ID of the user to return.
	*
	* @access Public
	* @return Array of objects representing badges.
	*/
	function get_user_awarded_badges($id)
	{
		$badges = new Badge_earned();
		$badges->where('user_id', 1);
		$badges->where('awarded', 1);
		$badges->get();

		$returning = array();


		foreach($badges as $badge)
		{
			$temp = new stdClass();
			$temp->awarded = $badge->stored;

			$actual_badge = new Badge();
			$actual_badge->where('id', $badge->badge_id)->get();
			$temp->badge = $actual_badge->stored;
			$returning[] = $temp;
		}

		return $returning;
	}

	/**
	* Get a user's unawarded badges.
	*
	* @param int $id ID of the user to return.
	*
	* @access Public
	* @return Array of badges.
	*/
	function get_user_unawarded_badges($id)
	{
		$badges = new Badge_earned();
		$badges->where('user_id', 1);
		$badges->where('awarded', 0);
		$badges->get();

		$returning = array();


		foreach($badges as $badge)
		{
			$returning[] = $this->get_badge_data($badge->id);
		}

		return $returning;
	}

	/**
	* Get a user's partial badges.
	*
	* @param int $id ID of the user to return.
	*
	* @access Public
	* @return Array of badges partially earned.
	*/
	function get_user_partial_badges($id)
	{
		//Get all objectives completed by the user
		$objs_com = new Objective_complete();
		$objs_com->where('user_id', $id)->get();

		$obj_id_array = array();

		//Get array of objective ids
		foreach($objs_com as $obj_com)
		{
			$obj_id_array[] = $obj_com->objective_id;
		}

		if(count($obj_id_array) > 0)
		{
			//Get all badges that are associated with these objective ids
			$query = $this->db
							->select()
							->where_in('badge_objectives.objective_id', $obj_id_array)
							->join('badge_objectives', 'badges.id = badge_objectives.badge_id')
							->group_by('badges.id')
							->get('badges');

			$associated_badges = array();


			foreach($query->result() as $result)
			{
				$badges_earned = new Badge_earned();
				$badges_earned->where('user_id', $id);
				$badges_earned->where('badge_id', $result->badge_id);

				$count = $badges_earned->count();

				if($count === 0)
				{
					$associated_badges[] = $this->get_badge_data($result->id);
				}
				unset($badges_earned);
			}
			return $associated_badges;
		}
		else
		{
			return array();
		}
	}

	/**
	* Get badge by id.
	*
	* @param int $id ID of the badge to return.
	*
	* @access Public
	* @return Object representing badge.
	*/
	function get_badge_data($id)
	{
		$badge = new Badge();
		$badge->where('id', $id)->get();

		$temp = new stdClass();
		$temp->badge = $badge->stored;

		//Get objectives for this badge
		$badge_objectives = new Badge_objective();
		$badge_objectives->where('badge_id', $id)->get();

		foreach($badge_objectives as $badge_obj)
		{
			$objective = new Objective();
			$objective->where('id', $badge_obj->objective_id)->get();
			$temp->objectives[] = $objective->stored;
			unset($objective);
		}
		return $temp;
	}
}

// End of file user_model.php
// Location: ./models/user_model.php