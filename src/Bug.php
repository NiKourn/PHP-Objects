<?php
// src/Bug.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="bugs")
 */
class Bug {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 * @var int
	 */
	private $id;
	
	private $products;
	
	public function __construct()
	{
		$this->products = new ArrayCollection();
	}
	
	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	private $description;
	
	/**
	 * @ORM\Column(type="datetime")
	 * @var DateTime
	 */
	private $created;
	
	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	private $status;
	
	/**
	 * @var
	 */
	private $engineer;
	
	
	/**
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="reportedBugs")
	 */
	private $reporter;
	
	
	public function getId() {
		return $this->id;
	}
	
	public function getDescription() {
		return $this->description;
	}
	
	public function setDescription( $description ) {
		$this->description = $description;
	}
	
	public function setCreated( DateTime $created ) {
		$this->created = $created;
	}
	
	public function getCreated() {
		return $this->created;
	}
	
	public function setStatus( $status ) {
		$this->status = $status;
	}
	
	public function getStatus() {
		return $this->status;
	}
	
	public function assignToProduct( Product $product ) {
		$this->products[] = $product;
	}
	
	public function getProducts() {
		return $this->products;
	}
	
	public function setEngineer(User $engineer)
	{
		$engineer->assignedToBug($this);
		$this->engineer = $engineer;
	}
	
	public function setReporter(User $reporter)
	{
		$reporter->addReportedBug($this);
		$this->reporter = $reporter;
	}
	
	public function getEngineer()
	{
		return $this->engineer;
	}
	
	public function getReporter()
	{
		return $this->reporter;
	}
}