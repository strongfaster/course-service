<?php declare(strict_types=1);

namespace App\Api\Controller;

use App\Api\Response\Factory\ApiResponseFactory;
use App\Repository\TagRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
#[Route(path: '/tag', name: 'get_tags_list', methods: ['GET'])]
final class GetTagListController
{
    public function __construct(
        private readonly ApiResponseFactory $apiResponseFactory,
        private readonly TagRepository $tagRepository
    )
    {}

    public function __invoke(): JsonResponse
    {
        return $this->apiResponseFactory->createSuccess(['tags' => $this->tagRepository->findAll()]);
    }
}
