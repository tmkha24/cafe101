<?php
App::uses('AppController', 'Controller');

/**
 * Invoice Controller
 *
 * @property Invoice $Invoice
 */
class InvoicesController extends AppController
{
	public $uses = array('WebConfig','Staff','Invoice','Order','Product','InvoiceItem');


	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{
		$this->set('invoices', $this->Invoice->find('all'));
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null)
	{
		$this->Invoice->id = $id;
		if (!$this->Invoice->exists()) {
			throw new NotFoundException(__('Invalid invoice'));
		}
		$this->set('invoice', $this->Invoice->read(null, $id));
		$invoiceItems = $this->InvoiceItem->find('all',array(
			'conditions'=>array('invoice_id =' => $id)));
		$this->set(compact( 'invoiceItems'));
	}

	/**
	 * view invoice method
	 *
	 * @param string $id
	 * @return void
	 */
	public function viewinvoice($id = null)
	{
		$this->Invoice->id = $id;
		if (!$this->Invoice->exists()) {
			throw new NotFoundException(__('Invalid invoice'));
		}
		$this->set('invoice', $this->Invoice->read(null, $id));
		$invoiceItems = $this->InvoiceItem->find('all', array(
			'conditions'=>array('invoice_id'=>$id),
			'order'=> array('InvoiceItem.product_id')
		));
		$this->set(compact( 'invoiceItems'));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add()
	{
		if ($this->request->is('post')) {

			$invoices = $this->request->data['Invoice'];
			$invoiceItems =null;
			if(isset($this->request->data['Invoice']['items'])){
				$invoiceItems =  $this->request->data['Invoice']['items'];
			}
			
			$this->Invoice->create();

			// if (($invoices['same_as_billing_address']) ){
			// 	$invoices['shipping_company_name'] = $invoices['billing_company_name'];
			// 	$invoices['shipping_contact_name'] = $invoices['billing_contact_name'];
			// 	$invoices['shipping_contact_phone'] = $invoices['billing_contact_phone'];
			// 	$invoices['shipping_contact_email'] = $invoices['billing_contact_email'];
			// 	$invoices['shipping_address1'] = $invoices['billing_address1'];
			// 	$invoices['shipping_address2'] = $invoices['billing_address2'];
			// }


			if ($this->Invoice->save($invoices)) {

				if($invoiceItems){
					foreach ($invoiceItems as $key => $item){
						$this->InvoiceItem->create();
						$item['invoice_id'] =$this->Invoice->id;
						$this->InvoiceItem->save($item);
					}
				}
				$this->Session->setFlash(__('The invoice has been saved'), 'default', array("class" => "alert alert-success "));
				$this->redirect(array('action' => 'index'));

			} else {
				$this->Session->setFlash(__('The invoice could not be saved. Please, try again.'), 'default', array("class" => "alert alert-danger"));
			}
		}
		$trparams = $this->params['named'];
		foreach ($trparams as $model=>$id) {
			$this->request->data['Invoice'][$model . '_id'] = $id;
		}
		$products = $this->Product->find('all');
		$orders = $this->Order->find('all');
		$members = $this->Member->find('all');
		$this->set(compact( 'orders', 'products', 'members'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null, $type = null)
	{

		$this->Invoice->id = $id;
		if (!$this->Invoice->exists()) {
			throw new NotFoundException(__('Invalid invoice'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['Invoice']['id']);
				$this->Invoice->create();
			}
			$invoiceItems =null;
			if(isset($this->request->data['Invoice']['items'])){
				$invoiceItems =  $this->request->data['Invoice']['items'];
			}
			$invoices = $this->request->data['Invoice'];

			// if (($invoices['same_as_billing_address']) ){
			// 	$invoices['shipping_contact_name'] = $invoices['billing_contact_name'];
			// 	$invoices['shipping_contact_phone'] = $invoices['billing_contact_phone'];
			// 	$invoices['shipping_contact_fax'] = $invoices['billing_contact_fax'];
			// 	$invoices['shipping_contact_email'] = $invoices['billing_contact_email'];
			// 	$invoices['shipping_address1'] = $invoices['billing_address1'];
			// 	$invoices['shipping_address2'] = $invoices['billing_address2'];
			// }


			if ($this->Invoice->save($invoices)) {
				if($invoiceItems){
					$this->InvoiceItem->deleteAll(array('invoice_id' => $id), false);
					foreach ($invoiceItems as $key => $item){
						$this->InvoiceItem->create();
						$item['invoice_id'] =$this->Invoice->id;
						// $item['product_id'] = $key;
						$this->InvoiceItem->save($item);
					}
				}
				$this->Session->setFlash(__('The invoice has been saved'), 'default', array("class" => "alert alert-success "));
				$this->redirect(array('action' => 'viewinvoice', $id));
			} else {
				$this->Session->setFlash(__('The invoice could not be saved. Please, try again.'), 'default', array("class" => "alert alert-danger"));
			}
		} else {
			$this->request->data = $this->Invoice->read(null, $id);
			$this->set('invoice', $this->request->data);

		}
		$products = $this->Product->find('all');
		$this->set(compact( 'products'));
		$invoiceItems = $this->InvoiceItem->find('all',array(
			'conditions'=>array('invoice_id =' => $id),
			'order'=>array('InvoiceItem.product_id')
		));
		$this->set(compact( 'invoiceItems'));
		$orders = $this->Order->find('all');
		$this->set(compact( 'orders'));
		$members = $this->Member->find('all');
		$this->set(compact('members'));


		$currentUser = $this->UserAuth->getUser();
		$currentUserId = $currentUser['User']['id'];
		$ownerId = $this->request->data['Invoice']['id'];
		$isOwner = ($currentUserId == $ownerId);
		$isAdmin = ($currentUser['UserGroup']['id'] == 1);
		if (!($isOwner || $isAdmin)) {
			$this->Session->setFlash(__('You do not have the permissions to edit this Invoice. Please ask the owner.'), 'default', array("class" => "alert alert-warning "));
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
		$this->Invoice->id = $id;
		if (!$this->Invoice->exists()) {
			throw new NotFoundException(__('Invalid invoice'));
		}
		if ($this->Invoice->delete()) {
			$this->Session->setFlash(__('Invoice deleted'), 'default', array("class" => "alert alert-success "));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Invoice was not deleted'), 'default', array("class" => "alert alert-warning "));
		$this->redirect(array('action' => 'index'));
	}

}
