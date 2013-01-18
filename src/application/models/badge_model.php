<?php
class Badge_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
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
    	return $temp;
    }
}
?>