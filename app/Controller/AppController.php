<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
App::uses('FullCalendarAppController', 'FullCalendar.Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
		public $uses = array('WebConfig','Staff','Member','Supplier','Notification');

		var $helpers = array('Form', 'Html', 'Session', 'Js', 'Usermgmt.UserAuth', 'Time');
		public $components = array('Session','RequestHandler', 'Usermgmt.UserAuth', );

		function beforeFilter(){
			$this->UserAuth->beforeFilter($this);
			$this->set('authUser', $this->UserAuth->getUser());
			$this->set('Tr', Configure::read('Tr'));

			$configData = array();
			$data = $this->WebConfig->find('all');
			foreach ($data as $key => $item){
				$configData['WebConfig'][$item['WebConfig']['path']]=$item['WebConfig']['value'];
			}
			$this->set('configData',$configData['WebConfig']);

			if ($this->Session->check ( 'Config.language' )) {
				Configure::write ( 'Config.language', $this->Session->read ( 'Config.language' ) );
			}
		}
}
