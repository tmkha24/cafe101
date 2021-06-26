<?php
App::uses('AppModel', 'Model');
/**
 * Contact Model
 *
 */
class Member extends AppModel {
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	var $belongsTo = array('MemberGroup');
	var $hasOne = array('Invoice');
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	// public $hasAndBelongsToMany = array(
	// 	'Notification' => array(
	// 		'className' => 'Notification',
	// 		'joinTable' => 'member_notifications',
	// 		'foreignKey' => 'member_id',
	// 		'associationForeignKey' => 'notification_id',
	// 		'unique' => 'keepExisting',
	// 		'conditions' => '',
	// 		'fields' => '',
	// 		'order' => '',
	// 		'limit' => '',
	// 		'offset' => '',
	// 		'finderQuery' => '',
	// 		'deleteQuery' => '',
	// 		'insertQuery' => ''
	// 	)
	// );
}
