<?php

namespace MeApp\ProductBundle\Controller;

use MeApp\CoreBundle\Controller\BaseController;
use MeApp\ProductBundle\Form\ProductType;

class ProductFormController extends BaseController
{
	protected $bundleName = 'MeAppProductBundle';

	public function newAction()
	{
		$product = $this
			->get('app.db.product')
			->create();

		$product->setUser($this->getUser());

		return $this->handleForm($product);
	}

	protected function handleForm($entity)
	{
		$form = $this
			->createForm(new ProductType(), $entity)
			->handleRequest($this->getRequest());

		if ($form->isValid()) {

		    // 写入数据库
		    $em = $this
		    	->getDoctrine()
		    	->getManager();
		    $em->persist($entity);
		    $em->flush();

		    return $this->redirect(
		    		$this->generateUrl('product_index')
		    	);
		}

		return $this->render(
				$this->buildTemplate('Product:new'),
				array(
					'form' => $form->createView()
					)
			);
	}
}