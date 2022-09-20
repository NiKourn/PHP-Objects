<?php
// src/Product.php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class Product
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	private $id;
	/**
	 * @ORM\Column(type="string")
	 */
	private $name;
	
	// .. (other code)
	
	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @return mixed
	 */
	public function get_name() {
		return $this->name;
	}
	
	/**
	 * @param mixed $id
	 */
	public function set_id( $id ): void {
		$this->id = $id;
	}
	
	/**
	 * @param mixed $name
	 */
	public function setName( $name ): void {
		$this->name = $name;
	}
}