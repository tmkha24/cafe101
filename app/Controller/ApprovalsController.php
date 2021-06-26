<?php
App::uses('AppController', 'Controller');

/**
 * Approval Controller
 *
 * @property Invoice $Invoice
 */
class ApprovalsController extends AppController
{
	public $uses = array('WebConfig','Invoice','InvoiceItem','Member','Product');

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{
        $invoices = $this->Invoice->find('all', array(
			'conditions' => 'Invoice.status = 0'
		));
		$this->set('invoices', $invoices);
	}

	public function view($id = null)
	{
		$this->Invoice->id = $id;
		if (!$this->Invoice->exists()) {
			throw new NotFoundException(__('Invalid invoice'));
		}
		$invoice = $this->Invoice->read(null, $id);
		$invoiceItems = $this->InvoiceItem->find('all',array(
			'conditions'=>array('invoice_id =' => $id))
		);
		$members = $this->Member->find('all',array(
			'conditions'=>array('member_id =' => $invoice['Invoice']['member_id']))
		);
		$this->set(compact('invoice','invoiceItems','members'));
	}

	public function approve($id = null)
	{
		$this->Invoice->id = $id;
		if (!$this->Invoice->exists()) {
			throw new NotFoundException(__('Invalid invoice'));
		}
		$invoice = $this->Invoice->read(null, $id);
		$invoice['Invoice']['status'] = 1;

		if($this->Invoice->save($invoice)){
			$this->Session->setFlash(__('The invoice has been approved'), 'default', array("class" => "alert alert-success "));
			$this->redirect(array('action' => 'index'));
		}
		else
		{
			$this->Session->setFlash(__('The invoice cannot be approved, please try again later'), 'default', array("class" => "alert alert-success "));
			$this->redirect(array('action' => 'view', $id));
		}
	}
}
