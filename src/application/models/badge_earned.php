<?php
/**
* Badge_earned
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
* Badge_objective
*
* @category Badges
* @package  Badges
* @author   Jamie Mahoney <jmahoney@lincoln.ac.uk>
* @license  GNU Affero General Public License 3.0
* @link     coursedata.blogs.lincoln.ac.uk
*/
class Badge_earned extends DataMapper {

	/**
	* Name of the table that the model uses.
	*
	* @var string
	*/
	var $table = 'badges_earned';

	/**
	* Array containing related elements.
	*
	* @var array
	*/
	var $has_one = array(
		'badge' => array(),
		'user' => array()	
	);
}

// End of file badge_earned.php
// Location: ./models/badged_earned.php
