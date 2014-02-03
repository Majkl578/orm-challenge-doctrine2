<?php

namespace App\Model\Content;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Nette\Object;

/**
 * @ORM\Entity
 * @ORM\Table(name="article")
 * @author Michael Moravec
 */
class Article extends Object
{
	use TIdentifiedEntity;

	/**
	 * @ORM\Column
	 * @var string
	 */
	protected $title;

	/**
	 * @ORM\Column(name="content_html", type="text")
	 * @var string
	 */
	protected $contentHtml;

	/**
	 * @ORM\ManyToOne(targetEntity="Category", inversedBy="articles")
	 * @ORM\JoinColumn(name="article_category_id")
	 * @var Category
	 */
	protected $category;

	/**
	 * @ORM\ManyToMany(targetEntity="Tag", inversedBy="articles")
	 * @ORM\JoinTable(name="article_2_tag")
	 * @var Collection|Tag[]
	 */
	protected $tags;

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return Article
	 */
	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getContentHtml()
	{
		return $this->contentHtml;
	}

	/**
	 * @param string $contentHtml
	 * @return Article
	 */
	public function setContentHtml($contentHtml)
	{
		$this->contentHtml = $contentHtml;
		return $this;
	}

	/**
	 * @return Category
	 */
	public function getCategory()
	{
		return $this->category;
	}

	/**
	 * @param Category $category
	 * @return Article
	 */
	public function setCategory(Category $category)
	{
		$this->category = $category;
		return $this;
	}

	/**
	 * @return Collection|Tag[]
	 */
	public function getTags()
	{
		return $this->tags;
	}

	/**
	 * @param mixed $tags
	 * @return Article
	 */
	public function addTag(Tag $tag)
	{
		$this->tags->add($tag);
		return $this;
	}

	/**
	 * @param mixed $tags
	 * @return Article
	 */
	public function removeTag(Tag $tag)
	{
		$this->tags->removeElement($tag);
		return $this;
	}
}
