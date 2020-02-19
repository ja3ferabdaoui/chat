<?php

/**
 * Class User
 * 
 */
class User 
{
    private $id;
    private $userName;
    private $email;
    private $status;
    private $createdAt;

	public function  getId() {
		return $this->id;
	}

	public function  setId($id) {
		$this->id = $id;
	}

	public function  getUserName() {
		return $this->userName;
	}

	public function  setUserName($userName) {
		$this->userName = $userName;
	}

	public function  getEmail() {
		return $this->email;
	}

	public function  setEmail($email) {
		$this->email = $email;
	}
    
    public function  getStatus() {
		return $this->status;
	}

	public function  setStatus($status) {
		$this->status = $status;
	}

	public function  getCreatedAt() {
		return $this->createdAt;
	}

	public function  setCreatedAt($createdAt) {
		$this->createdAt = $createdAt;
	}
    
     public function jsonSerialize()
    {
        return 
        [
            'id'   => $this->getId(),
            'user_name' => $this->getUserName(),
            'email' => $this->getEmail(),
            'status' => $this->getStatus(),
            'created_at' => $this->getCreatedAt()
        ];  
    }

}