<?php

namespace MeApp\ProductBundle\Controller;

use MeApp\CoreBundle\Controller\FormController;
use MeApp\ProductBundle\Form\ProductType;

class ProductFormController extends FormController
{
	protected $bundleName = 'MeAppProductBundle';

	public function newAction()
	{
		$product = $this
			->get('app.db.product')
			->create();

		$product->setUser($this->getUser());

		return $this->handleForm($product, new ProductType(), $this->getRequest());
	}

	public function editAction($productId)
	{
		$product = $this
			->get('app.db.product')
			->getRepository()
			->find($productId);

		return $this->handleForm($product, new ProductType(), $this->getRequest());
	}
}