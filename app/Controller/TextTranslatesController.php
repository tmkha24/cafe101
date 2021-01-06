<?php
App::uses('AppController', 'Controller');

/**
 * TextTranslate Controller
 *
 * @property TextTranslate $TextTranslate
 */
class TextTranslatesController extends AppController
{
	public $uses = array('WebConfig','Staff', 'TextTranslate','Supplier','Notification');


	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{
		$this->set('texts', $this->TextTranslate->find('all'));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add()
	{
		if ($this->request->is('post')) {
			$this->TextTranslate->create();
			if ($this->TextTranslate->save($this->request->data)) {
				$this->Session->setFlash(__('The text has been saved'), 'default', array("class" => "alert alert-success "));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The text could not be saved. Please, try again.'), 'default', array("class" => "alert alert-danger"));
			}
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
		$this->TextTranslate->id = $id;
		if (!$this->TextTranslate->exists()) {
			throw new NotFoundException(__('Invalid text'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($type === 'copy') {
				unset($this->request->data['TextTranslate']['id']);
				$this->TextTranslate->create();
			}
			if ($this->TextTranslate->save($this->request->data)) {
				$this->Session->setFlash(__('The text has been saved'), 'default', array("class" => "alert alert-success "));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The text could not be saved. Please, try again.'), 'default', array("class" => "alert alert-danger"));
			}
		} else {
			$this->request->data = $this->TextTranslate->read(null, $id);
			$this->set('TextTranslate', $this->request->data);

		}
		$currentUser = $this->UserAuth->getUser();
		$currentUserId = $currentUser['User']['id'];
		$ownerId = $this->request->data['TextTranslate']['id'];
		$isOwner = ($currentUserId == $ownerId);
		$isAdmin = ($currentUser['UserGroup']['id'] == 1);
		if (!($isOwner || $isAdmin)) {
			$this->Session->setFlash(__('You do not have the permissions to edit this text. Please ask the owner.'), 'default', array("class" => "alert alert-warning "));
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
		$this->TextTranslate->id = $id;
		if (!$this->TextTranslate->exists()) {
			throw new NotFoundException(__('Invalid text'));
		}
		if ($this->TextTranslate->delete()) {
			$this->Session->setFlash(__('Text deleted'), 'default', array("class" => "alert alert-success "));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Text was not deleted'), 'default', array("class" => "alert alert-warning "));
		$this->redirect(array('action' => 'index'));
	}


	public function generateFile(){
		$string =
			"msgid \"Add Supplier\"".PHP_EOL.
			"msgstr \"a222222a\"".PHP_EOL
		;

		$data = $this->TextTranslate->find('all');
		$string = '';
		foreach ($data as $item){
			$item =$item['TextTranslate'];
			if (empty($item['msgstr'])){
				continue;
			}
			$string .= "msgid \"".$item['msgid']."\"".PHP_EOL;
			$string .= "msgstr \"".$item['msgstr']."\"".PHP_EOL;
		}

		$dir = App::path('Locale');
		file_put_contents($dir[0].DS . 'eng' . DS . 'LC_MESSAGES'.DS.'default.po', $string);
		$this->redirect(array('action' => 'index'));
	}

}
