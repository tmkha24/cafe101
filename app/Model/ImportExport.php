<?php
App::uses('AppModel', 'Model');
/**
 * Contact Model
 *
 */
class ImportExport extends AppModel {
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
		'ImportExportItem' => array(
			'className' => 'ImportExportItem'
		)
	);
}
