<?php 

Class Settings
{

	public function get_settings($id)
	{
		$DB = new Database();
		$id = esc($id);
		$sql = "select * from users where userid = '$id' limit 1";
		$row = $DB->read($sql);

		if(is_array($row)){

			return $row[0];
		}
	}

	public function save_settings($data,$id){

		$DB = new Database();

		$password = isset($data['password']) ? $data['password'] : "";

		if(strlen($password) < 30 && isset($data['password2'])){

			if($data['password'] == $data['password2']){
				$data['password'] = password_hash($password, PASSWORD_DEFAULT);
			}else{

				unset($data['password']);
			}
		}

		unset($data['password2']);

		// demo account keeps its login details so every visitor can sign in
		if(is_demo_account($id)){
			unset($data['email'], $data['password']);
		}

		$allowed = array("first_name","last_name","gender","email","password","about","group_type");

		$sql = "update users set ";
		foreach ($data as $key => $value) {

			if(!in_array($key, $allowed, true)){
				continue;
			}

			if($key == "group_type"){
				$value = strtolower($value);
			}

			$sql .= $key . "='" . esc($value) . "',";
		}

		if($sql == "update users set "){
			return;
		}

		$sql = trim($sql,",");
		$sql .= " where userid = '" . esc($id) . "' limit 1";
		$DB->save($sql);
	}
}