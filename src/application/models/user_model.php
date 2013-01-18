<?php
class User_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_by_id($id)
    {
    	$user = new User();
    	$user->where('id', $id)->get();

    	return $user->stored;
    }

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
?>