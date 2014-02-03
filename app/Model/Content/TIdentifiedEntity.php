<?php

namespace App\Model\Content;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Michael Moravec
 */
trait TIdentifiedEntity
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 * @var int
	 */
	protected $id;

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}
}
