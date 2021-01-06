<?php
App::uses('AppController', 'Controller');

/**
 * Order Controller
 *
 * @property Order $Order
 */
class OrdersController extends AppController
{
	public $uses = array('WebConfig','Staff','Order','Supplier','Product','OrderItem');


	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{
		$this->set('orders', $this->Order->find('all'));
	}
	public function orderstatus()
	{
		$this->set('orders', $this->Order->find('all'));
	}
	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null)
	{
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->set('order', $this->Order->read(null, $id));
		$orderItems = $this->OrderItem->find('all',array(
			'conditions'=>array('order_id =' => $id)));
		$this->set(compact( 'orderItems'));

	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add()
	{
		if ($this->request->is('post')) {

			$orders = $this->request->data['Order'];
			$orderItems =null;
			if(isset($this->request->data['Order']['items'])){
				$orderItems =  $this->request->data['Order']['items'];
			}
			$this->Order->create();

			if (($orders['same_as_billing_address']) ){
				$orders['shipping_company_name'] = $orders['billing_company_name'];
				$orders['shipping_contact_name'] = $orders['billing_contact_name'];
				$orders['shipping_contact_phone'] = $orders['billing_contact_phone'];
				$orders['shipping_contact_email'] = $orders['billing_contact_email'];
				$orders['shipping_address1'] = $orders['billing_address1'];
				$orders['shipping_address2'] = $orders['billing_address2'];
			}


			if ($this->Order->save($orders)) {

				if($orderItems){
					foreach ($orderItems as $key => $item){
						$this->OrderItem->create();
						$item['order_id'] =$this->Order->id;
						$item['product_id'] = $key;
						$this->OrderItem->save($item);
					}
				}
				$this->Session->setFlash(__('The order has been saved'), 'default', array("class" => "alert alert-success "));
				$this->redirect(array('action' => 'index'));

			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'), 'default', array("class" => "alert alert-danger"));
			}
		}
		$trparams = $this->params['named'];
		foreach ($trparams as $model=>$id) {
			$this->request->data['Order'][$model . '_id'] = $id;
		}
		$products = $this->Product->find('all');
		$this->set(compact( 'products'));

	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null, $type = null)
	{

		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['Order']['id']);
				$this->Order->create();
			}
			$orderItems =null;
			if(isset($this->request->data['Order']['items'])){
				$orderItems =  $this->request->data['Order']['items'];
			}
			$orders = $this->request->data['Order'];

			if (($orders['same_as_billing_address']) ){
				$orders['shipping_contact_name'] = $orders['billing_contact_name'];
				$orders['shipping_contact_phone'] = $orders['billing_contact_phone'];
				$orders['shipping_contact_email'] = $orders['billing_contact_email'];
				$orders['shipping_address1'] = $orders['billing_address1'];
				$orders['shipping_address2'] = $orders['billing_address2'];
			}



			if ($this->Order->save($orders)) {
				if($orderItems){
					$this->OrderItem->deleteAll(array('order_id' => $id), false);
					foreach ($orderItems as $key => $item){
						$this->OrderItem->create();
						$item['order_id'] =$this->Order->id;
						$item['product_id'] = $key;
						$this->OrderItem->save($item);
					}
				}
				$this->Session->setFlash(__('The order has been saved'), 'default', array("class" => "alert alert-success "));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'), 'default', array("class" => "alert alert-danger"));
			}
		} else {
			$this->request->data = $this->Order->read(null, $id);
			$this->set('order', $this->request->data);

		}
		$products = $this->Product->find('all');
		$this->set(compact( 'products'));
		$orderItems = $this->OrderItem->find('all',array(
			'conditions'=>array('order_id =' => $id)));
		$this->set(compact( 'orderItems'));

		$currentUser = $this->UserAuth->getUser();
		$currentUserId = $currentUser['User']['id'];
		$ownerId = $this->request->data['Order']['id'];
		$isOwner = ($currentUserId == $ownerId);
		$isAdmin = ($currentUser['UserGroup']['id'] == 1);
		if (!($isOwner || $isAdmin)) {
			$this->Session->setFlash(__('You do not have the permissions to edit this Order. Please ask the owner.'), 'default', array("class" => "alert alert-warning "));
			$this->redirect(array('action' => 'index'));
		}
	}

	/**
	 * delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null)
	{
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->Order->delete()) {
			$this->Session->setFlash(__('Order deleted'), 'default', array("class" => "alert alert-success "));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Order was not deleted'), 'default', array("class" => "alert alert-warning "));
		$this->redirect(array('action' => 'index'));
	}

}
