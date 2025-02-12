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


	// Quando authenticate() é chamado, ele usa $this->User e $this->password, que contêm os valores definidos pelos setters.
	public function authenticate() {
		$dao = new LoginDAO();
		return $dao->authenticate($this->User, $this->password);
	}
}







?>