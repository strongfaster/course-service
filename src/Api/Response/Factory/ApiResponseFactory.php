<?php declare(strict_types=1);

namespace App\Api\Response\Factory;

use Symfony\Component\HttpFoundation\JsonResponse;

final class ApiResponseFactory
{
    public function createSuccess(?array $data = null): JsonResponse
    {
        return new JsonResponse(['status' => 'success', 'data' => $data]);
    }
}
