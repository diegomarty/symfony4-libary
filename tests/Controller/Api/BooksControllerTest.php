<?php

namespace App\Test\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testCreateBookEmptyRequest(): void
    {

        $client = static::createClient();

        $client->request('POST', '/api/book');

        $this->assertEquals(404, $client->getResponse()->getStatusCode());

    }

    public function testCreateBookInvalidData(): void
    {

        $client = static::createClient();

        $client->request(
            'POST',
            '/api/books',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            '{"title":"", "base64Image":""}'
        );

        $this->assertEquals(400, $client->getResponse()->getStatusCode());

    }

    public function testCreateBookEmptyData(): void
    {

        $client = static::createClient();

        $client->request(
            'POST',
            '/api/books',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            '{""}'
        );

        $this->assertEquals(400, $client->getResponse()->getStatusCode());

    }

    public function testCreateBookSuccessData()
    {

        $client = static::createClient();

        $client->request(
            'POST',
            '/api/books',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            '{"title":"Libro from Test"}'
        );

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }
}
