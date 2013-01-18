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

    function get_user_completed_badges($id)
    {
    	$badges = new Badge_earned();
    	$badges->where('user_id', $id)->get();

    	$returning = array();

    	foreach($badges as $badge)
    	{
    		$returning[] = $badge->stored;
    	}

    	return $returning;
    }
}
?>