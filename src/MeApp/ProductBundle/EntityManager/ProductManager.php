<?php

namespace MeApp\ProductBundle\EntityManager;

use Doctrine\ORM\EntityManager;

class ProductManager
{
	public $em;

	public $repository;

	public function __construct(EntityManager $em, $entity)
	{
		$this->em = $em;
		$this->repository = $em->getRepository($entity);
	}

	public function getRepository()
	{
		return $this->repository;
	}
}