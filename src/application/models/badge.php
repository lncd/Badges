<<?php
/**
* Badge
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
* Badge
*
* @category Badges
* @package  Badges
* @author   Jamie Mahoney <jmahoney@lincoln.ac.uk>
* @license  GNU Affero General Public License 3.0
* @link     coursedata.blogs.lincoln.ac.uk
*/
class Badge extends DataMapper {

	/**
	* Name of the table that the model uses.
	*
	* @var string
	*/
	var $table = 'badges';

	/**
	* Array containing related elements.
	*
	* @var array
	*/
	var $has_one = array(
		'source' => array(),
		'issuer' => array()	
	);

	/**
	* Array containing related elements.
	*
	* @var array
	*/
	var $has_many = array(
		'badge_objective' => array(),
		'badge_earned' => array()	
	);
}

// End of file badge.php
// Location: ./models/badge.php
