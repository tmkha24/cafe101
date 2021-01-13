<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
class MemberGroupsController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->set('memberGroups', $this->MemberGroup->find('all'));

	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->MemberGroup->id = $id;
		if (!$this->MemberGroup->exists()) {
			throw new NotFoundException(__('Invalid notification'));
		}
		$this->set('memberGroup', $this->MemberGroup->read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MemberGroup->create();
			if ($this->MemberGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The notification has been saved'), 'default', array("class" => "alert alert-success "));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notification could not be saved. Please, try again.'), 'default', array("class" => "alert alert-warning "));
			}
		}
		$trparams = $this->params['named'];
		foreach ($trparams as $model=>$id) {
			$this->request->data['MemberGroup'][$model . '_id'] = $id;
		}
		$trparams = $this->params['named'];
		foreach ($trparams as $model=>$id) {
			$this->request->data['MemberGroup'][$model . '_id'] = $id;
		}
		$members = $this->MemberGroup->Member->find('list');
		$this->set(compact('members'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null, $type = null) {
		$this->MemberGroup->id = $id;
		if (!$this->MemberGroup->exists()) {
			throw new NotFoundException(__('Invalid notification'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['MemberGroup']['id']);
				$this->MemberGroup->create();
			}
			if ($this->MemberGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The notification has been saved'), 'default', array("class" => "alert alert-success "));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The notification could not be saved. Please, try again.'), 'default', array("class" => "alert alert-warning "));
			}
		} else {
			$this->request->data = $this->MemberGroup->read(null, $id);
		}
		$members = $this->MemberGroup->Member->find('list');
		$this->set(compact('members'));
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
		$this->MemberGroup->id = $id;
		if (!$this->MemberGroup->exists()) {
			throw new NotFoundException(__('Invalid notification'));
		}
		if ($this->MemberGroup->delete()) {
			$this->Session->setFlash(__('MemberGroup deleted'), 'default', array("class" => "alert alert-success "));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('MemberGroup was not deleted'), 'default', array("class" => "alert alert-warning "));
		$this->redirect(array('action' => 'index'));
	}
}
