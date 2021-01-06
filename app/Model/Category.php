<?php
App::uses('AppModel', 'Model');
/**
 * Contact Model
 *
 */
class Category extends AppModel {
	var $name = 'Category';

	var $displayField = 'name';

	var $actsAs = array('Tree'); // Thiet lap quan he
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	var $belongsTo = array(
		'ParentCat' => array(
			'className' => 'Category',
			'foreignKey' => 'parent_id'
		)
	);
}
