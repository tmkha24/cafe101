<?php
App::uses('AppModel', 'Model');
/**
 * Contact Model
 *
 */
class Order extends AppModel {
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
//		'date_expired' => array(
//			'notBlank' => array(
//				'rule' => array('notBlank'),
//
//			),
//		),
		'number' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),

			),
		),
		'currency' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),

			),
		)
	);
	public $hasMany = array(
		'OrderItem' => array(
			'className' => 'OrderItem',
			'foreignKey' => 'order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed


}
