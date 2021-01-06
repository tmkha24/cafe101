<?php
App::uses('AppController', 'Controller');
/**
 * Notifications Controller
 *
 * @property Notification $Notification
 */
class NotificationsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('notifications', $this->Notification->find('all'));

	}


	public function staff() {
		$this->set('notifications', $this->Notification->find('all'));

	}


	public function member() {
		$this->set('notifications', $this->Notification->find('all'));
	}

	/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Notification->id = $id;
		if (!$this->Notification->exists()) {
			throw new NotFoundException(__('Invalid notification'));
		}
		$this->set('notification', $this->Notification->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Notification->create();
			if ($this->Notification->save($this->request->data)) {
				$this->Session->setFlash(__('The notification has been saved'), 'default', array("class" => "alert alert-success "));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notification could not be saved. Please, try again.'), 'default', array("class" => "alert alert-warning "));
			}
		}
		$trparams = $this->params['named'];
		foreach ($trparams as $model=>$id) {
		        $this->request->data['Notification'][$model . '_id'] = $id;
		}
		$trparams = $this->params['named'];
		foreach ($trparams as $model=>$id) {
			$this->request->data['Notification'][$model . '_id'] = $id;
		}
		$members = $this->Notification->Member->find('list');
		$staffs = $this->Notification->Staff->find('list');
		$this->set(compact('members','staffs'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null, $type = null) {
		$this->Notification->id = $id;
		if (!$this->Notification->exists()) {
			throw new NotFoundException(__('Invalid notification'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['Notification']['id']);
				$this->Notification->create();
			}
			if ($this->Notification->save($this->request->data)) {
				$this->Session->setFlash(__('The notification has been saved'), 'default', array("class" => "alert alert-success "));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The notification could not be saved. Please, try again.'), 'default', array("class" => "alert alert-warning "));
			}
		} else {
			$this->request->data = $this->Notification->read(null, $id);
		}
		$members = $this->Notification->Member->find('list');
		$staffs = $this->Notification->Staff->find('list');
		$this->set(compact('members','staffs'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Notification->id = $id;
		if (!$this->Notification->exists()) {
			throw new NotFoundException(__('Invalid notification'));
		}
		if ($this->Notification->delete()) {
			$this->Session->setFlash(__('Notification deleted'), 'default', array("class" => "alert alert-success "));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Notification was not deleted'), 'default', array("class" => "alert alert-warning "));
		$this->redirect(array('action' => 'index'));
	}

}
