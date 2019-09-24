<?php
namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ReportControllerTest extends WebTestCase {
    public function testShowReport() {
        $client = static::createClient();

        $client->request('GET', '/api/report?group_by=country');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}