<?php
App::uses('AppController', 'Controller');
App::uses('AppHelper', 'View/Helper');

/**
 * WebConfigs Controller
 *
 * @property WebConfig $WebConfig
 *
 */
class WebConfigsController extends AppController
{

	public $uses = array('WebConfig','Staff','Member','Supplier','Notification');
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
		if ($this->request->is('post') || $this->request->is('put')) {
			$data = $this->request->data['WebConfig'];
			foreach ($data as $key=>$value){
				if($key == Configure::read('companyLogo')){
					$file = $value;
					if(is_array($value)){
						$value = $value['name'];
					}
					//upload logo
					if (! empty ( $file['name'] )) {
						$fileType = $this->Common->findexts ( $file ['name'] );
						$checkImage = $this->Common->checkUploadImage ( $file );
						if ($checkImage == 'true') { // check out image file
								$path = $this->Common->bannerImagePath . 'logo' . "." . $fileType;
								if ($this->Common->uploadImage ( $file, $path )) { // save image to server
								} else {
									$this->Session->setFlash ( __ ( $this->Common->itemIsAddedWithNoImage ), 'default', array("class" => "alert alert-warning ") );
								}
								$this->request->data = NULL;
								$value = 'logo' . "." . $fileType;
						} else {
							$this->Session->setFlash ( $checkImage, 'default', array("class" => "alert alert-warning") );
						}
					}

				}

				if(strpos($key,'_default')){
					$value = '';
					unset($data[$key]);
					$key = str_replace('_default','',$key);
				}
				$oldData= $this->WebConfig->find ( 'first', array ('conditions' => array ('path' => $key), 'recursive' => - 1) );

				if (!empty($oldData) && $oldData['WebConfig']['value'] != $value  ){
					if($key == Configure::read('companyLogo') && empty($value)){
						continue;
					}
					//update old data value
					$oldData['WebConfig']['value'] = $value;
					$this->WebConfig->save($oldData);


				}elseif(empty($oldData)){
                    if($value =='on' ){
                    	continue;
					}
					// create
					$createData['WebConfig']['path']=$key;
					$createData['WebConfig']['value']=$value;

					$this->WebConfig->create($createData);
					$this->WebConfig->save();
				}
			}
			$this->Session->setFlash(__('The Config has been saved'), 'default', array("class" => "alert alert-success "));

			$this->generatedCss();
			$this->redirect(array('action' => 'index'));

		}

		$data = $this->WebConfig->find('all');
		$requestData= array();
		foreach ($data as $key => $item){
			$requestData['WebConfig'][$item['WebConfig']['path']]=$item['WebConfig']['value'];
		}
		$this->request->data =$requestData;

	}

	public function generatedCss(){
		$fileName = CSS.'custom.css';

		$cssString = "@charset \"utf-8\";".PHP_EOL;

		$data =$this->WebConfig->find('all');

		foreach ($data as $item){
			$item =$item['WebConfig'];
			if (empty($item['value'])){
				continue;
			}
			switch ($item['path']){
				case Configure::read('companyTextColor'):
					$cssString.="[class*=sidebar-dark] .brand-link{color: ".$item['value']."}".PHP_EOL;
					break;
				case Configure::read('companyBackgroundColor'):
					$cssString.=".navbar-color{background-color: ".$item['value']."}".PHP_EOL;
					break;
				case Configure::read('companyBorderBottomColor'):
					$cssString.=".navbar-color{border-bottom: 1px solid".$item['value']."!important}".PHP_EOL;
					break;
				case Configure::read('linkColor'):
					$cssString.="a{color: ".$item['value']."}".PHP_EOL;
					break;
				case Configure::read('linkHoverColor'):
					$cssString.="a:hover{color: ".$item['value']."}".PHP_EOL;
					break;
				case Configure::read('buttonColor'):
					$cssString.=".btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle{background-color: ".$item['value'].";border-color: ".$item['value']."}".PHP_EOL;
					$cssString.=".btn-primary{background-color: ".$item['value'].";border-color: ".$item['value']."}".PHP_EOL;
					$cssString.=".btn-primary:hover{background-color: ".$item['value'].";border-color: ".$item['value']."}".PHP_EOL;
					break;
				case Configure::read('buttonTextColor'):
					$cssString.=".btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle{color: ".$item['value']."}".PHP_EOL;
					$cssString.=".btn-primary{color: ".$item['value']."}".PHP_EOL;
					$cssString.=".btn-primary:hover{color: ".$item['value']."}".PHP_EOL;
					break;

				case Configure::read('sidebarTextColor'):
					$cssString.="[class*=sidebar-dark-] .nav-sidebar>.nav-item.menu-open>.nav-link, [class*=sidebar-dark-] .nav-sidebar>.nav-item:hover>.nav-link, [class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-link:focus{color: ".$item['value']."}".PHP_EOL;
					$cssString.=".nav-pills .nav-link{color: ".$item['value']."!important}".PHP_EOL;
					$cssString.=".nav-sidebar .nav-header{color: ".$item['value']."!important}".PHP_EOL;
					break;
				case Configure::read('sidebarBackgroundColor'):
					$cssString.="[class*=sidebar-dark-]{background-color: ".$item['value']."}".PHP_EOL;
					break;

				case Configure::read('navTextColor'):
					$cssString.=".navbar-light .navbar-nav .nav-link{color: ".$item['value']."}".PHP_EOL;
					break;
				case Configure::read('navTextHoverColor'):
					$cssString.=".navbar-light .navbar-nav .nav-link:hover{color: ".$item['value']."}".PHP_EOL;
					break;
				case Configure::read('navBackgroundColor'):
					$cssString.=".navbar-white{background-color: ".$item['value']."}".PHP_EOL;
					break;
				case Configure::read('navBorderBottomColor'):
					$cssString.=".main-header{border-bottom: 1px solid".$item['value']."!important}".PHP_EOL;
					break;


				case Configure::read('contentTextColor'):
					$cssString.=".content-wrapper{color: ".$item['value']."}".PHP_EOL;
					$cssString.=".breadcrumb-item.active{color: ".$item['value']."}".PHP_EOL;
					break;
				case Configure::read('contentBackgroundColor'):
					$cssString.=".content-wrapper{background-color: ".$item['value']."}".PHP_EOL;
					break;

				case Configure::read('cardTextColor'):
					$cssString.=".card{color: ".$item['value']."}".PHP_EOL;
					break;
				case Configure::read('cardBackgroundColor'):
					$cssString.=".card{background-color: ".$item['value']."}".PHP_EOL;
					break;

				case Configure::read('gridBorderColor'):
					$cssString.=".table thead th{border-bottom: 2px solid ".$item['value']."}".PHP_EOL;
					$cssString.=".table-bordered td, .table-bordered th{border: 1px solid ".$item['value']."}".PHP_EOL;
					$cssString.=".table-bordered{border: 1px solid ".$item['value']."}".PHP_EOL;
					$cssString.=".nav-tabs.flex-column .nav-link:focus, .nav-tabs.flex-column .nav-link:hover{border-color:".$item['value']."}".PHP_EOL;
					$cssString.=".nav-tabs.flex-column{border-right:".$item['value']."}".PHP_EOL;
					$cssString.=".card-header{border-bottom:1px solid ".$item['value']."}".PHP_EOL;
					break;
				case Configure::read('footerTextColor'):
					$cssString.=".main-footer{color: ".$item['value']."}".PHP_EOL;
					break;
				case Configure::read('footerBackgroundColor'):
					$cssString.=".main-footer{background: ".$item['value']."}".PHP_EOL;
					break;
				case Configure::read('footerBorderColor'):
					$cssString.=".main-footer{border-top: 1px solid".$item['value']."!important}".PHP_EOL;
					break;
			}

		}
		if ( file_put_contents($fileName, $cssString)) {
			$this->Session->setFlash(__('Apply New Config Successfully'), 'default', array("class" => "alert alert-success "));
		} else {
			$this->Session->setFlash(__('Please, try again.'), 'default', array("class" => "alert alert-danger"));
		}

//		$this->redirect(array('action' => 'index'));
	}

}
