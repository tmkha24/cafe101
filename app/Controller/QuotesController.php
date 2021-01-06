<?php
App::uses('AppController', 'Controller');

/**
 * Quote Controller
 *
 * @property Quote $Quote
 */
class QuotesController extends AppController
{
	public $uses = array('WebConfig','Staff','Quote','Supplier','Product','QuoteItem');


	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{
		$this->set('quotes', $this->Quote->find('all'));
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null)
	{
		$this->Quote->id = $id;
		if (!$this->Quote->exists()) {
			throw new NotFoundException(__('Invalid quote'));
		}
		$this->set('quote', $this->Quote->read(null, $id));
		$quoteItems = $this->QuoteItem->find('all',array(
			'conditions'=>array('quote_id =' => $id)));
		$this->set(compact( 'quoteItems'));

	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add()
	{
		if ($this->request->is('post')) {

			$quotes = $this->request->data['Quote'];
			$quoteItems =null;
			if(isset($this->request->data['Quote']['items'])){
				$quoteItems =  $this->request->data['Quote']['items'];
			}
			$this->Quote->create();


			if ($this->Quote->save($quotes)) {

				if($quoteItems){
					foreach ($quoteItems as $key => $item){
						$this->QuoteItem->create();
						$item['quote_id'] =$this->Quote->id;
						$item['product_id'] = $key;
						$this->QuoteItem->save($item);
					}
				}
				$this->Session->setFlash(__('The quote has been saved'), 'default', array("class" => "alert alert-success "));
				$this->redirect(array('action' => 'index'));

			} else {
				$this->Session->setFlash(__('The quote could not be saved. Please, try again.'), 'default', array("class" => "alert alert-danger"));
			}
		}
		$trparams = $this->params['named'];
		foreach ($trparams as $model=>$id) {
			$this->request->data['Quote'][$model . '_id'] = $id;
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

		$this->Quote->id = $id;
		if (!$this->Quote->exists()) {
			throw new NotFoundException(__('Invalid quote'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['Quote']['id']);
				$this->Quote->create();
			}
			$quoteItems =null;
			if(isset($this->request->data['Quote']['items'])){
				$quoteItems =  $this->request->data['Quote']['items'];
			}
			$quotes = $this->request->data['Quote'];

			if (isset($quotes['same_as_billing_address']) ){
				$quotes['shipping_contact_name'] = $quotes['billing_contact_name'];
				$quotes['shipping_contact_phone'] = $quotes['billing_contact_phone'];
				$quotes['shipping_contact_email'] = $quotes['billing_contact_email'];
				$quotes['shipping_address1'] = $quotes['billing_address1'];
				$quotes['shipping_address2'] = $quotes['billing_address2'];
				$quotes['shipping_country'] = $quotes['billing_country'];
				$quotes['shipping_region'] = $quotes['billing_region'];
				$quotes['shipping_city'] = $quotes['billing_city'];
				$quotes['shipping_ward'] = $quotes['billing_ward'];
			}



			if ($this->Quote->save($quotes)) {
				if($quoteItems){
					$this->QuoteItem->deleteAll(array('quote_id' => $id), false);
					foreach ($quoteItems as $key => $item){
						$this->QuoteItem->create();
						$item['quote_id'] =$this->Quote->id;
						$item['product_id'] = $key;
						$this->QuoteItem->save($item);
					}
				}
				$this->Session->setFlash(__('The quote has been saved'), 'default', array("class" => "alert alert-success "));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The quote could not be saved. Please, try again.'), 'default', array("class" => "alert alert-danger"));
			}
		} else {
			$this->request->data = $this->Quote->read(null, $id);
			$this->set('quote', $this->request->data);

		}
		$products = $this->Product->find('all');
		$this->set(compact( 'products'));
		$quoteItems = $this->QuoteItem->find('all',array(
			'conditions'=>array('quote_id =' => $id)));
		$this->set(compact( 'quoteItems'));

		$currentUser = $this->UserAuth->getUser();
		$currentUserId = $currentUser['User']['id'];
		$ownerId = $this->request->data['Quote']['id'];
		$isOwner = ($currentUserId == $ownerId);
		$isAdmin = ($currentUser['UserGroup']['id'] == 1);
		if (!($isOwner || $isAdmin)) {
			$this->Session->setFlash(__('You do not have the permissions to edit this Quote. Please ask the owner.'), 'default', array("class" => "alert alert-warning "));
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
		$this->Quote->id = $id;
		if (!$this->Quote->exists()) {
			throw new NotFoundException(__('Invalid quote'));
		}
		if ($this->Quote->delete()) {
			$this->Session->setFlash(__('Quote deleted'), 'default', array("class" => "alert alert-success "));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Quote was not deleted'), 'default', array("class" => "alert alert-warning "));
		$this->redirect(array('action' => 'index'));
	}

}
