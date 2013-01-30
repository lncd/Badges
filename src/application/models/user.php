<?php
/**
* User
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
* User
*
* @category Badges
* @package  Badges
* @author   Jamie Mahoney <jmahoney@lincoln.ac.uk>
* @license  GNU Affero General Public License 3.0
* @link     coursedata.blogs.lincoln.ac.uk
*/
class User extends DataMapper {

	/**
	* Name of the table that the model uses.
	*
	* @var string
	*/
	var $table = 'users';

	/**
	* Array containing related elements.
	*
	* @var array
	*/
	var $has_many = array(
		'badge_earned' => array(),
		'objective_complete' => array()		
	);
}

// End of file user.php
// Location: ./models/user.php
