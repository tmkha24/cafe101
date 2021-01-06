<?php
App::uses('AppController', 'Controller');

/**
 * Product Controller
 *
 * @property Product $Product
 */
class ProductsController extends AppController
{
	public $components = array (
		'Paginator',
		'Common'
	);

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{
		$this->set('products', $this->Product->find('all'));
		$categories = $this->Product->Category->find('list');
		$this->set(compact( 'categories'));
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null)
	{
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->set('product', $this->Product->read(null, $id));

	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add()
	{
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$this->Product->create();
			$this->Product->save(array('name'=>'sample'));

			foreach ($data['Product'] as $key=>$item){
				if (is_array($item) && ! empty ( $item['name'] )){
					$file = $item;
					//upload logo
					if (! empty ( $file['name'] )) {
						$fileType = $this->Common->findexts( $file ['name'] );
						$checkImage = $this->Common->checkUploadImage ( $file );
						if ($checkImage == 'true') { // check out image file
							$path = $this->Common->productInfoImagePath .$this->Product->id . $key . "." . $fileType;
							if ($this->Common->uploadImage ( $file, $path )) { // save image to server
							} else {
								$this->Session->setFlash ( __ ( $this->Common->itemIsAddedWithNoImage ), 'default', array("class" => "alert alert-warning ") );
							}
							$data['Product'][$key] = $this->Product->id .$key. "." . $fileType;
						} else {
							$this->Session->setFlash ( $checkImage, 'default', array("class" => "alert alert-warning") );
						}
					}
				}elseif(
					is_array($item) &&  empty ( $item['name'] )
				){
					$data['Product'][$key] = null;
				}
			}

			if ($this->Product->save($data)) {



				$this->Session->setFlash(__('The product has been saved'), 'default', array("class" => "alert alert-success "));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'default', array("class" => "alert alert-danger"));
			}
		}

		$categories = $this->Product->Category->find('list');
		$this->set(compact( 'categories'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null, $type = null)
	{
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}

		$getData = $this->Product->find('first',  array(
			'conditions' => array('id' => $id)));

		if ($this->request->is('post') || $this->request->is('put')) {
			$data = $this->request->data;
			foreach ($data['Product'] as $key=>$item){
				if (is_array($item) && ! empty ( $item['name'] )){
					$file = $item;
					//upload logo
					if (! empty ( $file['name'] )) {
						$fileType = $this->Common->findexts( $file ['name'] );
						$checkImage = $this->Common->checkUploadImage ( $file );
						if ($checkImage == 'true') { // check out image file
							$path = $this->Common->productInfoImagePath .$this->Product->id . $key . "." . $fileType;
							if ($this->Common->uploadImage ( $file, $path )) { // save image to server
							} else {
								$this->Session->setFlash ( __ ( $this->Common->itemIsAddedWithNoImage ), 'default', array("class" => "alert alert-warning ") );
							}
							$data['Product'][$key] = $this->Product->id .$key. "." . $fileType;
						} else {
							$this->Session->setFlash ( $checkImage, 'default', array("class" => "alert alert-warning") );
						}
					}
				}elseif(
					is_array($item) &&

					((isset($data['Product'][$key.'_delete']) && ($data['Product'][$key.'_delete']))
						||empty($getData['Product'][$key]))

				){
					$data['Product'][$key] = null;
				}elseif(is_array($item) && empty($item['name']) ){
					$data['Product'][$key]= $getData['Product'][$key];
				}

			}

//			if ($type === 'copy') {
//				unset($this->request->data['Product']['id']);
//				$this->Product->create();
//			}
			if ($this->Product->save($data)) {
				$this->Session->setFlash(__('The product has been saved'), 'default', array("class" => "alert alert-success "));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'default', array("class" => "alert alert-danger"));
			}
		} else {
			$this->request->data = $this->Product->read(null, $id);
			$this->set('product', $this->request->data);
		}
		$currentUser = $this->UserAuth->getUser();
		$currentUserId = $currentUser['User']['id'];
		$ownerId = $this->request->data['Product']['id'];
		$isOwner = ($currentUserId == $ownerId);
		$isAdmin = ($currentUser['UserGroup']['id'] == 1);
		if (!($isOwner || $isAdmin)) {
			$this->Session->setFlash(__('You do not have the permissions to edit this Product. Please ask the owner.'), 'default', array("class" => "alert alert-warning "));
			$this->redirect(array('action' => 'index'));
		}
		$categories = $this->Product->Category->find('list');
		$this->set(compact( 'categories'));
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
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('Product deleted'), 'default', array("class" => "alert alert-success "));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Product was not deleted'), 'default', array("class" => "alert alert-warning "));
		$this->redirect(array('action' => 'index'));
	}

}
