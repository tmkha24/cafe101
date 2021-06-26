<?php
App::uses('AppModel', 'Model');
/**
 * ContactsTag Model
 *
 * @property Contact $Contact
 * @property Tag $Tag
 */

class ImportExportItem extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'ImportExport' => array(
			'className' => 'ImportExport',
			'foreignKey' => 'import_export_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
