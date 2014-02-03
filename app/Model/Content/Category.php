<?php

namespace App\Model\Content;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Nette\Object;

/**
 * @ORM\Entity
 * @ORM\Table(name="article_category")
 * @author Michael Moravec
 */
class Category extends Object
{
	use TIdentifiedEntity;

	/**
	 * @ORM\Column
	 * @var string
	 */
	protected $name;

	/**
	 * @ORM\OneToMany(targetEntity="Article", mappedBy="category", fetch="EXTRA_LAZY")
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
	 * @return Category
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return Collection|Article[]
	 */
	public function getArticles()
	{
		return $this->articles;
	}

	/**
	 * @param Article $article
	 * @return Category
	 */
	public function addArticle(Article $article)
	{
		$this->articles->add($article);
		$article->setCategory($this);
		return $this;
	}

	/**
	 * @param Article $article
	 * @return Category
	 */
	public function removeArticle(Article $article)
	{
		$this->articles->removeElement($article);
		return $this;
	}
}
