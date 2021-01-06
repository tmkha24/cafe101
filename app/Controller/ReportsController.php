<?php
App::uses('AppController', 'Controller');
App::uses('AppHelper', 'View/Helper');

/**
 * WebConfigs Controller
 *
 * @property WebConfig $WebConfig
 *
 */
class ReportsController extends AppController
{

	public $uses = array('Product','OrderItem','Vendor','Order','Invoice');
	public $components = array (
		'Paginator',
		'Common'
	);

	public function productordered()
	{
		$this->set('products', $this->Product->getAllProductOrdered());
		$categories = $this->Product->Category->find('list');
		$this->set(compact( 'categories'));
	}

	public function allproduct()
	{
		$this->set('products', $this->Product->find('all'));
		$categories = $this->Product->Category->find('list');
		$this->set(compact( 'categories'));
	}
	public function productActive()
	{
		$this->set('products', $this->Product->find('all',array('conditions' => array('active ='=>'1'))));
		$categories = $this->Product->Category->find('list');
		$this->set(compact( 'categories'));
	}
	public function productInactive()
	{
		$this->set('products', $this->Product->find('all',array('conditions' => array('active ='=>'0'))));
		$categories = $this->Product->Category->find('list');
		$this->set(compact( 'categories'));
	}


	public function allVendor()
	{
		$this->set('vendors', $this->Vendor->find('all'));
	}

	public function vendorActive()
	{
		$this->set('vendors', $this->Vendor->find('all',array('conditions' => array('active ='=>'1'))));
	}
	public function vendorInActive()
	{
		$this->set('vendors', $this->Vendor->find('all',array('conditions' => array('active ='=>'0'))));
	}


	public function allOrder()
	{
		$this->set('orders', $this->Order->find('all'));
	}

	public function orderpending()
	{
		$this->set('orders', $this->Order->find('all',array('conditions' => array('Order.status ='=>'0'))));
	}
	public function orderProcessing()
	{
		$this->set('orders', $this->Order->find('all',array('conditions' => array('Order.status ='=>'1'))));
	}
	public function orderShipping()
	{
		$this->set('orders', $this->Order->find('all',array('conditions' => array('Order.status ='=>'2'))));
	}
	public function orderCompleted()
	{
		$this->set('orders', $this->Order->find('all',array('conditions' => array('Order.status ='=>'3'))));
	}
	public function orderHold()
	{
		$this->set('orders', $this->Order->find('all',array('conditions' => array('Order.status ='=>'4'))));
	}
	public function orderCancel()
	{
		$this->set('orders', $this->Order->find('all',array('conditions' => array('Order.status ='=>'5'))));
	}


	public function accounting()
	{
		$this->set('orders', $this->Order->find('all',array('conditions' => array('Order.status ='=>'5'))));
	}

	public function accountingInvoice()
	{
		$this->set('invoices', $this->Invoice->find('all'));
		$this->set('invoicesTotal',
			$this->Invoice->query('Select 
sum(Invoices.amount) as amount,
sum(Invoices.discount_amount) as discount_amount,
sum(Invoices.shipping_cost) as shipping_cost,
sum(Invoices.grant_total) as grant_total
  from invoices as Invoices where status =1'));

		$this->set('invoicesTotalUnPaid',
			$this->Invoice->query('Select 
sum(Invoices.amount) as amount,
sum(Invoices.discount_amount) as discount_amount,
sum(Invoices.shipping_cost) as shipping_cost,
sum(Invoices.grant_total) as grant_total
  from invoices as Invoices where status =0'));
	}

	public function accountingInvoiceUnpaid()
	{


		$this->set('invoices', $this->Invoice->find('all',array('conditions' => array('Invoice.status ='=>'0'))));

		$this->set('invoicesTotal',
			$this->Invoice->query('Select 
sum(Invoices.amount) as amount,
sum(Invoices.discount_amount) as discount_amount,
sum(Invoices.shipping_cost) as shipping_cost,
sum(Invoices.grant_total) as grant_total
  from invoices as Invoices where status =0'));


	}
	public function accountingInvoicePaid()
	{
		$this->set('invoicesTotal',
			$this->Invoice->query('Select 
sum(Invoices.amount) as amount,
sum(Invoices.discount_amount) as discount_amount,
sum(Invoices.shipping_cost) as shipping_cost,
sum(Invoices.grant_total) as grant_total
  from invoices as Invoices where status =1'));
		$this->set('invoices', $this->Invoice->find('all',array('conditions' => array('Invoice.status ='=>'1'))));
	}
	public function warehousetransfer()
	{
		$this->set('orders', $this->Order->find('all',array('conditions' => array('Order.status ='=>'5'))));
	}
}
