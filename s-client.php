<?php 

class wp_api{
	
	private $auth;
	public  $base_url;
	
	public $points = [ 
		'index' => '/',
		'posts' => '/posts',
		'post' => '/posts/%d',
		'media' => '/media',
		'media_single' => '/media/%d',
		'users' => '/users',
		'user' => '/users/%d',
		'user_current' => '/users/me',
		'categories' => '/categories',
		'category' => '/categories/%d',
		'pages' => '/pages',
		'page' => '/pages/%d',
		'tags' => '/tags',
		'tag' => '/tags/%d',
		'comments' => '/comments',
		'comment' => '/comments/%d',
	];
	
	public function __construct($url, $login, $pass){
		$this->base_url = $url;
		$this->auth = base64_encode($login.':'.$pass);
	}
	
	public function getIndex(){
		$result = $this->request('GET', array(), $this->points['index']);
		return $result;
	}
	
	public function getPost($id = 0){
		if(!$id){
			throw new Exception('post id not found');
		}
		$point = sprintf($this->points['post'], $id);
		$result = $this->request('GET', array(), $point);
		return $result;
	}
	
	/*
	$type = update || delete
	$param['id'] => post id
	*/
	public function posts($type = '', $param = array()){
		if($param && $type == 'add'){
			
			$result = $this->request('POST', $param, $this->points['posts']);
			
		}elseif($param && $type == 'update'){
			
			if(empty($param) || !isset($param['id'])){
				throw new Exception('post id not found');
			}
			$point = sprintf($this->points['post'], $param['id']);
			$result = $this->request('POST', $param, $point);
			
		}elseif($param && $type == 'delete'){
			
			if(empty($param) || !isset($param['id'])){
				throw new Exception('post id not found');
			}
			
			$point = sprintf($this->points['post'], $param['id']);
			$result = $this->request('DELETE', $param, $point);
			
		}else{
			//get all 
			$result = $this->request('GET', array(), $this->points['posts']);
		}
		
		return $result;
	}
	
	public function categories($type = '', $param = array()){
		if($param && $type == 'add'){
			
			$result = $this->request('POST', $param, $this->points['categories']);
			
		}elseif($param && $type == 'update'){
			
			if(empty($param) || !isset($param['id'])){
				throw new Exception('category id not found');
			}
			$point = sprintf($this->points['category'], $param['id']);
			$result = $this->request('POST', $param, $point);
			
		}elseif($param && $type == 'delete'){
			
			if(empty($param) || !isset($param['id'])){
				throw new Exception('Category id not found');
			}
			
			$point = sprintf($this->points['category'], $param['id']);
			$result = $this->request('DELETE', $param, $point);
			
		}else{
			//get all 
			$result = $this->request('GET', array(), $this->points['categories']);
		}
		
		return $result;
	}
	
	public function getCategory($id = 0){
		if(!$id){
			throw new Exception('post id not found');
		}
		$point = sprintf($this->points['category'], $id);
		$result = $this->request('GET', array(), $point);
		return $result;
	}
	
	public function getPage($id = 0){
		if(!$id){
			throw new Exception('post id not found');
		}
		$point = sprintf($this->points['page'], $id);
		$result = $this->request('GET', array(), $point);
		return $result;
	}
	
	public function pages($type = '', $param = array()){
		if($param && $type == 'add'){
			
			$result = $this->request('POST', $param, $this->points['pages']);
			
		}elseif($param && $type == 'update'){
			
			if(empty($param) || !isset($param['id'])){
				throw new Exception('page id not found');
			}
			$point = sprintf($this->points['page'], $param['id']);
			$result = $this->request('POST', $param, $point);
			
		}elseif($param && $type == 'delete'){
			
			if(empty($param) || !isset($param['id'])){
				throw new Exception('page id not found');
			}
			
			$point = sprintf($this->points['page'], $param['id']);
			$result = $this->request('DELETE', $param, $point);
			
		}else{
			//get all 
			$result = $this->request('GET', array(), $this->points['pages']);
		}
		
		return $result;
	}
	
	public function getUser($user_id = 0){
		if(!$id){
			throw new Exception('post id not found');
		}
		$point = sprintf($this->points['user'], $id);
		$result = $this->request('GET', array(), $point);
		return $result;
	}
	
	public function users($type = '', $param = array()){
		if($param && $type == 'add'){
			
			$result = $this->request('POST', $param, $this->points['users']);
			
		}elseif($param && $type == 'update'){
			
			if(empty($param) || !isset($param['id'])){
				throw new Exception('page id not found');
			}
			$point = sprintf($this->points['user'], $param['id']);
			$result = $this->request('POST', $param, $point);
			
		}elseif($param && $type == 'delete'){
			
			if(empty($param) || !isset($param['id'])){
				throw new Exception('page id not found');
			}
			
			$point = sprintf($this->points['user'], $param['id']);
			$result = $this->request('DELETE', $param, $point);
			
		}else{
			//get all 
			$result = $this->request('GET', array(), $this->points['users']);
		}
		
		return $result;
	}
	
	public function getTag($tag_id = 0){
		if(!$id){
			throw new Exception('post id not found');
		}
		$point = sprintf($this->points['tag'], $tag_id);
		$result = $this->request('GET', array(), $point);
		return $result;
	}
	
	public function tags($type = '', $param = array()){
		if($param && $type == 'add'){
			
			$result = $this->request('POST', $param, $this->points['tags']);
			
		}elseif($param && $type == 'update'){
			
			if(empty($param) || !isset($param['id'])){
				throw new Exception('tag id not found');
			}
			$point = sprintf($this->points['tag'], $param['id']);
			$result = $this->request('POST', $param, $point);
			
		}elseif($param && $type == 'delete'){
			
			if(empty($param) || !isset($param['id'])){
				throw new Exception('tag id not found');
			}
			
			$point = sprintf($this->points['tag'], $param['id']);
			$result = $this->request('DELETE', $param, $point);
			
		}else{
			//get all 
			$result = $this->request('GET', array(), $this->points['tags']);
		}
		
		return $result;
	}
	
	public function comments($type = '', $param = array()){
		if($param && $type == 'add'){
			
			$result = $this->request('POST', $param, $this->points['comments']);
			
		}elseif($param && $type == 'update'){
			
			if(empty($param) || !isset($param['id'])){
				throw new Exception('tag id not found');
			}
			$point = sprintf($this->points['comment'], $param['id']);
			$result = $this->request('POST', $param, $point);
			
		}elseif($param && $type == 'delete'){
			
			if(empty($param) || !isset($param['id'])){
				throw new Exception('tag id not found');
			}
			
			$point = sprintf($this->points['comment'], $param['id']);
			$result = $this->request('DELETE', $param, $point);
			
		}else{
			//get all 
			$result = $this->request('GET', array(), $this->points['comments']);
		}
		
		return $result;
	}
	
	
	public function request($type, $data, $point){
		
		
		if(!$type){
			$type = 'GET';
		}
		
		$curl = curl_init($this->base_url.$point);

		if($data){
			$data = json_encode($data);
		}else{
			$data = array();
		}

		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		if($type == 'POST'){
			curl_setopt($curl, CURLOPT_POST, 1);
		}
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $type);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			"Authorization: Basic ".$this->auth,		
			"Content-Type: application/json", 
			"Cache-control: no-cache", 
			(($data) ? "Content-Length: " . strlen($data) : "")
			)                                                                       
		);

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		
		if ($err) {
			throw new Exception('Curl error. # '.$err);
		} else {
			return json_decode($response, true);
		}
		
	}
	
	public function getMedia($id = 0){
		
		if($id){
			$point = sprintf($this->points['media_single'], $id);
			$result = $this->request('GET', array(), $point);
		}else{
			$result = $this->request('GET', array(), $this->points['media']);
		}
		
		return $result;
	}
	
	public function uploadMedia($file_path = ''){
		
		if(empty($file_path)){
			throw new Exception('File not found');
		}
		
			$curl = curl_init();
			$data = file_get_contents($file_path);

			curl_setopt_array($curl, array(
			  CURLOPT_URL => $this->base_url."/media",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_HTTPHEADER => array(
				"authorization: Basic ".$this->auth,
				"cache-control: no-cache",
				"content-disposition: attachment; filename=".basename($file_path),
				"content-type: ".mime_content_type($file_path),
			  ),
			  CURLOPT_POSTFIELDS => $data,
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				throw new Exception('Curl error. # '.$err);
			} else {
				return json_decode($response, true);
			}
	}
	
}
