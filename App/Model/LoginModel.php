<?php 

class LoginModel {
	private $User;
	private $password;

	public function setUsername($User) {
		$this->User = $User;
	}

	public function getUsername() {
		return $this->User;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function getPassword() {
		return $this->password;
	}


	public function authenticate() {
		$dao = new LoginDAO();
		return $dao->authenticate($this->User, $this->password);
	}
}







?>