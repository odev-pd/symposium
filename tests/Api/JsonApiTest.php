<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;

class JsonApiTest extends ApiTestCase
{
    use WithoutMiddleware;

    public function testUsesCorrectJsonApiHeader()
    {
        $response = $this->call('GET', '/api/user/1/talks');

        $this->assertEquals('application/vnd.api+json', $response->headers->get('Content-Type'));
    }
}
