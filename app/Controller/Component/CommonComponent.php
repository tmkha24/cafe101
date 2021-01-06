<?php
class CommonComponent extends Object {
	var $sizeUploadImageFile = 4097152;
	var $sizeUploadVideoFile = 1024288000;
	// called before Controller::beforeFilter()
	function initialize(&$controller, $settings = array()) {
		// saving the controller reference for later use
		$this->controller = & $controller;
	}
	// called after Controller::beforeFilter()
	function startup(&$controller) {
	}
	// called after Controller::beforeRender()
	function beforeRender(&$controller) {
	}
	// called after Controller::render()
	function shutdown(&$controller) {
	}
	// called before Controller::redirect()
	function beforeRedirect(&$controller, $url, $status = null, $exit = true) {
	}
	function redirectSomewhere($value) {
		// utilizing a controller method
	}
	var $email = "nihogocenter@gmail.com";
	var $password="nihon1234";
	// Message
	var $saveDataSuccess = "Save data successfull!.";
	var $saveDataError = "Save data unsuccessfull, please try again!.";
	var $deleteAllDataSuccess = "Deleted all data successfull!.";
	var $deleteDataSuccess = "Deleted data successfull!.";
	var $deleteDataError = "Deleted data unsuccessfull, please try again!.";
	var $changeStatusSuccess = "Changed status successfull!.";
	var $changeStatusError = "Changed status unsuccessfull, please try again!.";
	var $pleaseSelectItem = "Please select at least 1 item!.";
	var $errorOccur = "Error occur, please try again!.";
	var $itemNotExist = "Item doesn't exist!.";
	var $itemIsAdded = "Save data successfull, item is added!.";
	var $itemIsAddedWithNoImage = "Item is added, but upload image unsuccessfull, please try again!.";
	var $itemIsAddedWithNoVideo = "Item is added, but upload video unsuccessfull, please try again!.";
	var $fileNotExist = "File isn't exist!.";
	
	// file path
	var $recruitImagePath = "img/recruits/";
	var $newImagePath = "img/news/";
	var $bannerImagePath = "img/logo/";
	var $adminUserImagePath = "img/adminUsers/";
	var $videoImagePath = "img/videos/";
	var $placeImagePath = "img/places/";
	var $videoPath = "files/videos/";
	var $couponImagePath = "img/coupons/";
	var $productInfoImagePath = "img/product/";

	/**
	 * create random code to check reset password
	 *
	 * @param number $length        	
	 * @return string
	 */
	function generateRandomString($length = 0) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen ( $characters );
		$randomString = '';
		for($i = 0; $i < $length; $i ++) {
			$randomString .= $characters [rand ( 0, $charactersLength - 1 )];
		}
		return $randomString;
	}
	
	/**
	 * create password using md5
	 *
	 * @param unknown $password        	
	 * @return string|boolean
	 */
	public function createPassWord($password) {
		if (! empty ( $password )) {
			$passwordHasher = new SimplePasswordHasher ( array (
					'hashType' => 'md5' 
			) );
			return $passwordHasher->hash ( $password );
		} else
			return false;
	}
	
	/**
	 *
	 * @param unknown $filename        	
	 * @return unknown
	 */
	public function findexts($filename) {
		$filename = strtolower ( $filename );
		$exts = split ( "[/\\.]", $filename );
		$n = count ( $exts ) - 1;
		$exts = $exts [$n];
		return $exts;
	}
	
	/**
	 *
	 * @param string $file        	
	 * @return boolean
	 */
	public function checkFileSize($file = null) {
		return $file ['size'] <= $this->sizeUploadImageFile;
	}
	public function checkFileVideoSize($file = null) {
		return $file ['size'] <= $this->sizeUploadVideoFile;
	}
	/**
	 *
	 * @param string $file        	
	 * @return Ambigous <boolean, string>
	 */
	public function CheckUploadImage($file = null) {
		$result = false;
		$ext = substr ( strtolower ( strrchr ( $file ['name'], '.' ) ), 1 ); // get the extension
		$arr_ext = array (
				'jpg',
				'jpeg',
				'gif',
				'png' 
		); // set allowed extensions
		   // only process if the extension is valid
		$fileType = $this->findexts ( $file ['name'] );
		if ($this->checkFileSize ( $file )) {
			if (in_array ( $ext, $arr_ext )) {
				$result = 'true';
			} else {
				$result = __ ( 'File type not allow!.' );
			}
		} else {
			$result = __ ( 'File image size allow < ' ) . ($this->sizeUploadImageFile / (1024 * 1024)) . " MB!.";
		}
		return $result;
	}
	
	/**
	 *
	 * @param string $file        	
	 * @return Ambigous <boolean, string>
	 */
	public function CheckUploadVideo($file = null) {
		$result = false;
		$ext = substr ( strtolower ( strrchr ( $file ['name'], '.' ) ), 1 ); // get the extension
		$arr_ext = array (
				'mp4'
		); // set allowed extensions
		   // only process if the extension is valid
		$fileType = $this->findexts ( $file ['name'] );
		if ($this->checkFileVideoSize ( $file )) {
			if (in_array ( $ext, $arr_ext )) {
				$result = 'true';
			} else {
				$result = __ ( 'File type not allow!.' );
			}
		} else {
			$result = __ ( 'File video size allow < ' ) . ($this->sizeUploadVideoFile / (1024 * 1024)) . " MB!";
		}
		return $result;
	}
	
	/**
	 *
	 * @param string $file        	
	 * @param string $path        	
	 * @return Ambigous <boolean, string, mixed>
	 */
	public function uploadImage($file = null, $path = null) {
		$result = false;
		if (move_uploaded_file ( $file ['tmp_name'], WWW_ROOT . $path )) {
			$result = 'true';
		} else {
			$result = __ ( 'File upload fail!.' );
		}
		return $result;
	}
	
	/**
	 *
	 * @param string $file        	
	 * @param string $path        	
	 * @return Ambigous <boolean, string, mixed>
	 */
	public function uploadFile($file = null, $path = null) {
		$result = false;
		if (move_uploaded_file ( $file ['tmp_name'], WWW_ROOT . $path )) {
			$result = 'true';
		} else {
			$result = __ ( 'File upload fail!.' );
		}
		return $result;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getCurrentDateTime() {
		return date ( 'Y-m-d H:i:s' );
	}
	
	/**
	 *
	 * @return string
	 */
	public function getCurrentDate() {
		return date ( 'Y-m-d' );
	}
	
	function createRedirect($page,$limit,$key,$countData){
		// Get param to redirect exactly where you clicked delete
		$redirect = array (
				'action' => 'index'
		);
		if ($page) {
			$redirect ['page'] = $page; // Page component use param like this: key:value
		}
		// Limit and key are params which was created by form, so they look like this: ?key=value
		if ($limit) {
			$redirect ['?'] ['limit'] = $limit;
		}
		if ($key) {
			$redirect ['?'] ['key'] = $key;
		}
		if($page!=1&&!empty($limit)){
			if($countData/$page<$limit && ($countData%$limit)==0){
				$redirect ['page']=$page-1;
			}
		}
		return $redirect;
	}
}
?>
