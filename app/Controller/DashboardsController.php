<?php
App::uses('AppController', 'Controller');

/**
 * Member Controller
 *
 * @property Member $Member
 * @property Notification $Notification
 * @property Staff $Staff
 * @property Supplier $Supplier
 *
 */
class DashboardsController extends AppController
{

	public $uses = array('Product','Vendor','Order','Category');

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{
		$this->set('productsCount', $this->Product->find('count'));
		$this->set('categoriesCount', $this->Category->find('count'));
		$this->set('vendorsCount', $this->Vendor->find('count'));
		$this->set('ordersCount', $this->Order->find('count'));

		$this->set('products', $this->Product->find('all', array('limit'=>10)));
		$this->set('categories', $this->Category->find('all', array('limit'=>10)));
		$this->set('vendors', $this->Vendor->find('all', array('limit'=>10)));
		$this->set('orders', $this->Order->find('all', array('limit'=>10)));

	}

}
