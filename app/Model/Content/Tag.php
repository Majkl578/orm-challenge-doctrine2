<?php

namespace App\Model\Content;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Nette\Object;

/**
 * @ORM\Entity
 * @ORM\Table(name="tag")
 * @author Michael Moravec
 */
class Tag extends Object
{
	use TIdentifiedEntity;

	/**
	 * @ORM\Column
	 * @var string
	 */
	protected $name;

	/**
	 * @ORM\Column
	 * @var bool
	 */
	protected $deleted;

	/**
	 * @ORM\ManyToMany(targetEntity="Article", mappedBy="tags")
	 * @var Collection|Article[]
	 */
	protected $articles;

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return Tag
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isDeleted()
	{
		return $this->deleted;
	}

	/**
	 * @param bool $deleted
	 * @return Tag
	 */
	public function setDeleted($deleted)
	{
		$this->deleted = (bool) $deleted;
		return $this;
	}

	/**
	 * @return Collection|Article[]
	 */
	public function getArticles()
	{
		return $this->articles;
	}
}
