<?php

namespace MeApp\ProductBundle\Controller;

use MeApp\CoreBundle\Controller\BaseController;

class ProductController extends BaseController
{
    protected $bundleName = 'MeAppProductBundle';

    public function indexAction()
    {
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
