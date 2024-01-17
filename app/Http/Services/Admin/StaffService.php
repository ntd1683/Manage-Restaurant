<?php

namespace App\Http\Services\Admin;

use App\Http\Repositories\Admin\StaffRepository;
use App\Http\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;

class StaffService
{
    protected StaffRepository $staffRepository;

    public function __construct()
    {
        $this->staffRepository = new StaffRepository();
    }

    public function getUsers(string $key = ""): ?Builder
    {
        return $this->staffRepository->getUsers($key);
    }

    public function deleteUser(string $id): int
    {
        return $this->staffRepository->deleteUser($id);
    }
}
