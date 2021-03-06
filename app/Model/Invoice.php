<?php
App::uses('AppModel', 'Model');
/**
 * Contact Model
 *
 */
class Invoice extends AppModel {
	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank')
			),
		),
		'number' => array(
			'notBlank' => array(
				'rule' => array('notBlank')
			),
		),
		'currency' => array(
			'notBlank' => array(
				'rule' => array('notBlank')
			),
		)
	);
	
	public $hasMany = array(
		'InvoiceItem' => array(
			'className' => 'InvoiceItem'
		)
	);

	public $belongsTo = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id'
		),
		'Member' => array(
			'className' => 'Member',
			'foreignKey' => 'member_id'
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

}
