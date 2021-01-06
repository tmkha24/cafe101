<?php
App::uses('AppController', 'Controller');

/**
 * Contact Controller
 *
 * @property Contact $Contact
 */
class ContactsController extends AppController
{
	public $uses = array('WebConfig','Staff','Contact','Supplier','Notification');


	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{
		$this->set('contacts', $this->Contact->find('all'));
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null)
	{
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		$this->set('contact', $this->Contact->read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add()
	{
		if ($this->request->is('post')) {
			$this->Contact->create();
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The contact has been saved'), 'default', array("class" => "alert alert-success "));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.'), 'default', array("class" => "alert alert-danger"));
			}
		}
		$trparams = $this->params['named'];
		foreach ($trparams as $model=>$id) {
			$this->request->data['Contact'][$model . '_id'] = $id;
		}

	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null, $type = null)
	{
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['Contact']['id']);
				$this->Contact->create();
			}
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The contact has been saved'), 'default', array("class" => "alert alert-success "));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.'), 'default', array("class" => "alert alert-danger"));
			}
		} else {
			$this->request->data = $this->Contact->read(null, $id);
			$this->set('contact', $this->request->data);

		}


		$currentUser = $this->UserAuth->getUser();
		$currentUserId = $currentUser['User']['id'];
		$ownerId = $this->request->data['Contact']['id'];
		$isOwner = ($currentUserId == $ownerId);
		$isAdmin = ($currentUser['UserGroup']['id'] == 1);
		if (!($isOwner || $isAdmin)) {
			$this->Session->setFlash(__('You do not have the permissions to edit this Contact. Please ask the owner.'), 'default', array("class" => "alert alert-warning "));
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
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		if ($this->Contact->delete()) {
			$this->Session->setFlash(__('Contact deleted'), 'default', array("class" => "alert alert-success "));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contact was not deleted'), 'default', array("class" => "alert alert-warning "));
		$this->redirect(array('action' => 'index'));
	}

}
