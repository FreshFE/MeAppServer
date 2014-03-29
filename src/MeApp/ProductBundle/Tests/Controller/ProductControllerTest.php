<?php

namespace MeApp\ProductBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/apps');
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/app/{productId}');
    }

}
