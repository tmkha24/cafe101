<?php
App::uses('AppController', 'Controller');
App::uses('AppHelper', 'View/Helper');

/**
 * WebConfigs Controller
 *
 * @property WebConfig $WebConfig
 *
 */
class DistributorsController extends AppController
{

	public $uses = array('WebConfig','Staff','Member','Supplier','Notification');
	public $components = array (
		'Paginator',
		'Common'
	);

	public function memberregister()
	{

	}

	public function memberlogin()
	{
	}

}
