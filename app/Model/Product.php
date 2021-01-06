<?php
App::uses('AppModel', 'Model');
/**
 * Vendor Model
 *
 */
class Product extends AppModel {
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $hasAndBelongsToMany = array(
		'Category' => array(
			'className' => 'Category',
			'joinTable' => 'product_categories',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'category_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);


	public function getAllProductOrdered(){
		$db = $this->getDataSource();
		return $db->fetchAll(
			'select  Product.*, sum(items.qty) as ordered from quote_items as items
				left join products as Product on items.product_id = Product.id
  				group by product_id order by ordered desc '
		);

	}
}
