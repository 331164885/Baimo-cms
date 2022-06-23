<?php

namespace Baimo\Cms\Services;

use Baimo\Cms\Repositories\Interfaces\FriendlinkRepositoryInterface;
use Baimo\Cms\Services\Interfaces\FriendlinkServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FriendlinkService implements FriendlinkServiceInterface
{
    protected $friendlinkRepository;

    public function __construct(FriendlinkRepositoryInterface $friendlinkRepository)
    {
        $this->friendlinkRepository = $friendlinkRepository;
    }

    public function serviceIndex(Request $requestParams): array
    {
        return $this->friendlinkRepository->repositoryIndex(function (){}, (int)$requestParams['size']);
    }

    public function serviceStore(Request $requestParams): bool
    {
        return $this->friendlinkRepository->repositoryStore($requestParams);
    }

    public function serviceUpdate(Request $requestParams): int
    {
        return $this->friendlinkRepository->repositoryUpdate($requestParams, ['id'=>$requestParams['id']]);
    }

    public function serviceDestroy($deleteWhere): int
    {
        return $this->friendlinkRepository->repositoryDestroy($deleteWhere);
    }

    public function serviceCreate(Request $requestParams): bool
    {
        // TODO: Implement serviceCreate() method.
    }

    public function serviceEdit(Request $requestParams): int
    {
        // TODO: Implement serviceEdit() method.
    }

    public function serviceShow(Request $requestParams): array
    {
        // TODO: Implement serviceShow() method.
    }

}