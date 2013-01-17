<?php
/**
* Objective
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
* Objective
*
* @category Badges
* @package  Badges
* @author   Jamie Mahoney <jmahoney@lincoln.ac.uk>
* @license  GNU Affero General Public License 3.0
* @link     coursedata.blogs.lincoln.ac.uk
*/
class Objective extends DataMapper {

	/**
	* Name of the table that the model uses.
	*
	* @var string
	*/
	var $table = 'objectives';

	/**
	* Array containing related elements.
	*
	* @var array
	*/
	var $has_many = array(
		'objective_complete' => array(),
		'badge_objective' => array()	
	);
}

// End of file criterion_reference_grid.php
// Location: ./models/objective.php
