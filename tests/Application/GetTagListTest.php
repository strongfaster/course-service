<?php declare(strict_types=1);

namespace App\Tests\Application;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class GetTagListTest extends WebTestCase
{
    public function testGetTagListSuccess()
    {
        $client = self::createClient();
        $client->request('GET', '/api/v1/tag');
        $this->assertResponseStatusCodeSame(200);
        $this->assertResponseHeaderSame('content-type', 'application/json');
    }
}
