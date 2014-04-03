<?php

namespace MeApp\CoreBundle\Controller;

class FormController extends BaseController
{
	protected $form;

	protected function handleForm($formEntity, $formType, $request)
	{
		// 创建 form
		$this->form = $form = $this
			->createForm($formType, $formEntity)
			->handleRequest($request);

		// 验证 form
		if ($form->isValid()) {
		    $this->onFinshed($formEntity);
		    $this->onRedirect();
		}

		// 输出 view
		return $this->onRender($form);
	}

	protected function onFinshed($formEntity)
	{
		// 写入数据库
		$em = $this
			->getDoctrine()
			->getManager();
		$em->persist($formEntity);
		$em->flush();
	}

	protected function onRedirect()
	{
		return $this->redirect(
			$this->generateUrl('product_index')
		);
	}

	protected function onRender($form)
	{
		return $this->render(
			$this->buildTemplate('Product:new'),
			array('form' => $form->createView())
		);
	}
}