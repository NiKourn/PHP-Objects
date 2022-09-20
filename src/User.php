<?php
// src/User.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 * @var int
	 */
	private $id;
	
	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	private $name;
	
	/**
	 * @ORM\OneToMany(targetEntity="Bug", mappedBy="reporter")
	 * @var Bug[] An ArrayCollection of Bug objects.
	 */
	private $reportedBugs;
	
	/**
	 * @ORM\OneToMany(targetEntity="Bug", mappedBy="engineer")
	 * @var Bug[] An ArrayCollection of Bug objects.
	 */
	private $assignedBugs;
	
	private $banned;
	private $username;
	private $passwordHash;
	private $bans;
	private $description;
	
	
	/**
	 * @ORM\ManyToMany(targetEntity="Product")
	 */
	private $products;
	
	public function __construct()
	{
		$this->reportedBugs = new ArrayCollection();
		$this->assignedBugs = new ArrayCollection();
	}
	
	public function getUsername(): string
	{
		return $this->username;
	}
	
	public function setUsername(string $username): void
	{
		$this->username = $username;
	}
	
	public function getPasswordHash(): string
	{
		return $this->passwordHash;
	}
	
	public function setPasswordHash(string $passwordHash): void
	{
		$this->passwordHash = $passwordHash;
	}
	
	public function getBans(): array
	{
		return $this->bans;
	}
	
	public function addBan(Ban $ban): void
	{
		$this->bans[] = $ban;
	}
	
	public function toNickname(): string
	{
		return $this->username;
	}
	
	public function authenticate(string $password, callable $checkHash): bool
	{
		return $checkHash($password, $this->passwordHash) && ! $this->hasActiveBans();
	}
	
	public function changePassword(string $password, callable $hash): void
	{
		$this->passwordHash = $hash($password);
	}
	
	public function ban(\DateInterval $duration): void
	{
		assert($duration->invert !== 1);
		
		$this->bans[] = new Ban($this);
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setName($name)
	{
		$this->name = $name;
	}
	
	public function assignToProduct(Product $product)
	{
		$this->products[] = $product;
	}
	
	public function getProducts()
	{
		return $this->products;
	}
	
	public function addReportedBug(Bug $bug)
	{
		$this->reportedBugs[] = $bug;
	}
	
	public function assignedToBug(Bug $bug)
	{
		$this->assignedBugs[] = $bug;
	}
}