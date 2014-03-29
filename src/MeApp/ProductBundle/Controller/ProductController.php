<?php

namespace MeApp\ProductBundle\Controller;

use MeApp\CoreBundle\Controller\BaseController;

class ProductController extends BaseController
{
    protected $bundleName = 'MeAppProductBundle';

    public function indexAction()
    {
        $qb = $this
            ->get('app.db.product')
            ->getRepository()
            ->createQueryBuilder('Product');

        $products = $this
            ->get('knp_paginator')->paginate(
                $qb,
                $this->getRequest()->get('page', 1),
                10
            );

        return $this->render(
                $this->buildTemplate('Product:index'),
                array(
                    'products' => $products
                    )
            );
    }

    public function showAction($productId)
    {
        $product = $this
            ->get('app.db.product')
            ->getRepository()
            ->find($productId);

    	return $this->render(
                $this->buildTemplate('Product:show'),
                array(
                    'product' => $product
                    )
            );
    }

}
