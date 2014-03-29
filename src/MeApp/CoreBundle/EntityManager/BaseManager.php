<?php

namespace MeApp\CoreBundle\EntityManager;

use Doctrine\ORM\EntityManager;

class BaseManager
{
	protected $em;

	protected $repository;

	public function __construct(EntityManager $em, $entityName)
	{
		$this->em = $em;

		$this->repository = $this->em->getRepository($entityName);
	}

	public function getRepository()
	{
		return $this->repository;
	}
}