<?php

namespace MeApp\CoreBundle\EntityManager;

use Doctrine\ORM\EntityManager;

class BaseManager
{
	protected $em;

	protected $repository;

	protected $class;

	public function __construct(EntityManager $em, $entityName)
	{
		$this->em = $em;

		$this->repository = $this->em->getRepository($entityName);

		$this->class = $this->em->getClassMetadata($entityName)->getName();
	}

	public function getRepository()
	{
		return $this->repository;
	}

	public function create()
	{
		return new $this->class;
	}
}