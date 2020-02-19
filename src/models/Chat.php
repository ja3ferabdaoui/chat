<?php

/**
 * Class Chat
 * 
 */
class Chat
{
    private $id;
    private $fromId;
    private $toId;
	private $text;
    private $createdAt;

	public function  getId() {
		return $this->id;
	}

	public function  setId($id) {
		$this->id = $id;
	}

	public function  getFromId() {
		return $this->fromId;
	}

	public function  setFromId($fromId) {
		$this->fromId = $fromId;
	}

	public function  getToId() {
		return $this->toId;
	}

	public function  setToId($toId) {
		$this->toId = $toId;
	}

	public function  getText() {
		return $this->text;
	}

	public function  setText($text) {
		$this->text = $text;
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
            'from_id' => $this->getFromId(),
            'to_id' => $this->getToId(),
			'text' => $this->getText(),
            'created_at' => $this->getCreatedAt()
        ];  
    }

}