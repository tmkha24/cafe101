<?php
App::uses('AppController', 'Controller');

/**
 * Member Controller
 *
 * @property Member $Member
 */
class MembersController extends AppController
{
	public $uses = array('WebConfig','Staff','Member','Supplier','Notification');


	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{
		$this->set('members', $this->Member->find('all'));
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null)
	{
		$this->Member->id = $id;
		if (!$this->Member->exists()) {
			throw new NotFoundException(__('Invalid member'));
		}
		$this->set('member', $this->Member->read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add()
	{
		if ($this->request->is('post')) {
			$this->Member->create();
			if ($this->Member->save($this->request->data)) {
				$this->Session->setFlash(__('The member has been saved'), 'default', array("class" => "alert alert-success "));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The member could not be saved. Please, try again.'), 'default', array("class" => "alert alert-danger"));
			}
		}
		$trparams = $this->params['named'];
		foreach ($trparams as $model=>$id) {
			$this->request->data['Member'][$model . '_id'] = $id;
		}
		$notifications = $this->Member->Notification->find('list');
		$this->set(compact( 'notifications'));

	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null, $type = null)
	{
		$this->Member->id = $id;
		if (!$this->Member->exists()) {
			throw new NotFoundException(__('Invalid member'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['Member']['id']);
				$this->Member->create();
			}
			if ($this->Member->save($this->request->data)) {
				$this->Session->setFlash(__('The member has been saved'), 'default', array("class" => "alert alert-success "));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The member could not be saved. Please, try again.'), 'default', array("class" => "alert alert-danger"));
			}
		} else {
			$this->request->data = $this->Member->read(null, $id);
			$this->set('member', $this->request->data);

		}
		$notifications = $this->Member->Notification->find('list');
		$this->set(compact( 'notifications'));

		$currentUser = $this->UserAuth->getUser();
		$currentUserId = $currentUser['User']['id'];
		$ownerId = $this->request->data['Member']['id'];
		$isOwner = ($currentUserId == $ownerId);
		$isAdmin = ($currentUser['UserGroup']['id'] == 1);
		if (!($isOwner || $isAdmin)) {
			$this->Session->setFlash(__('You do not have the permissions to edit this Member. Please ask the owner.'), 'default', array("class" => "alert alert-warning "));
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
		$this->Member->id = $id;
		if (!$this->Member->exists()) {
			throw new NotFoundException(__('Invalid member'));
		}
		if ($this->Member->delete()) {
			$this->Session->setFlash(__('Member deleted'), 'default', array("class" => "alert alert-success "));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Member was not deleted'), 'default', array("class" => "alert alert-warning "));
		$this->redirect(array('action' => 'index'));
	}

}
