<?php
/**
* Objectives_complete
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
* Objectives_complete
*
* @category Badges
* @package  Badges
* @author   Jamie Mahoney <jmahoney@lincoln.ac.uk>
* @license  GNU Affero General Public License 3.0
* @link     coursedata.blogs.lincoln.ac.uk
*/
class Objective_complete extends DataMapper {

	/**
	* Name of the table that the model uses.
	*
	* @var string
	*/
	var $table = 'objectives_complete';

	/**
	* Array containing related elements.
	*
	* @var array
	*/
	var $has_one = array(
		'objective' => array(),
		'user' => array()	
	);
}

// End of file criterion_reference_grid.php
// Location: ./models/objective_complete.php
