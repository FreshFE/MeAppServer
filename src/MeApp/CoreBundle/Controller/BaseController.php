<?php

namespace MeApp\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
	protected $bundleName;

	protected $templateSuffix = 'html.twig';

	protected function buildTemplate($name)
	{
	    return $this->bundleName . ':' . $name . '.' . $this->templateSuffix;
	}
}