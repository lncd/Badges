<?php
/**
* Badge_model
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
* Badge_model
*
* @category Badges
* @package  Badges
* @author   Jamie Mahoney <jmahoney@lincoln.ac.uk>
* @license  GNU Affero General Public License 3.0
* @link     coursedata.blogs.lincoln.ac.uk
*/
class Badge_model extends CI_Model
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
	* Get badge by id
	*
	* @param int $id ID of the badge.
	*
	* @access Public
	* @return Object rep badge.
	*/
	function get_by_id($id)
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

		//Check if badge has been earned by the current user, if so append.
		$badge_earned = new Badge_earned();
		$badge_earned->where('user_id', $this->session->userdata('user_id'));
		$badge_earned->where('badge_id', $id);
		$badge_earned->get();

		if($badge_earned->id)
		{
			$temp->badge_earned = $badge_earned->stored;
		}
		return $temp;


	}

	/**
	* Returns a speciic badge instance
	*
	* @param int $user_id  ID of the user.
	* @param int $badge_id ID of the badge.
	*
	* @access Public
	* @return Nothing
	*/
	function get_instance($user_id, $badge_id)
	{
		$badge_earned = new Badge_earned();
		$badge_earned->where('user_id', $user_id);
		$badge_earned->where('badge_id', $badge_id);
		$badge_earned->get();

		return $badge_earned->stored;
	}

	/**
	* Get badge details by earned id
	*
	* @param int $earned_id The ID of the badge earned record
	*
	* @access Public
	* @return Object representing badge info
	*/
	public function get_earned_badge($earned_id)
	{
		$returning = new stdClass();

		$badge_earned = new Badge_earned();
		$badge_earned->where('id', (int) $earned_id)->get();
		$returning->instance = $badge_earned->stored;

		//Get general badge info
		$badge = new Badge();
		$badge->where('id', (int) $badge_earned->badge_id)->get();
		$returning->badge = $badge->stored;

		//Get all objectives
		$badge_objectives = new Badge_objective();
		$badge_objectives->where('badge_id', (int) $badge->id)->get();

		foreach($badge_objectives as $badge_obj)
		{
			$objective = new Objective();
			$objective->where('id', (int) $badge_obj->objective_id)->get();

			$returning->objectives[] = $objective->stored;
		}

		return $returning;
	}
}

// End of file badge_model.php
// Location: ./models/badge_model.php