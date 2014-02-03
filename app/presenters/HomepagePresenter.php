<?php

namespace App;

use Doctrine\ORM\Query\Expr\Join;
use Nette\Application\UI\Presenter;

class HomepagePresenter extends Presenter
{
	/**
	 * @inject
	 * @var \Doctrine\ORM\EntityManager
	 */
	public $entityManager;

	public function renderDefault()
	{
		$this->getTemplate()->articles = $this->entityManager
			->createQueryBuilder()
			->from('App\Model\Content\Article', 'a')
			->select('a')
			->innerJoin('a.category', 'c')
			->addSelect('c')
			->leftJoin('a.tags', 't', Join::WITH, 't.deleted = FALSE')
			->addSelect('t')
			->orderBy('a.id', 'DESC')
			->getQuery()
			->getResult();
	}
}
