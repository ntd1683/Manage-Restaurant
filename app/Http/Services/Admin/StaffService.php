<?php

namespace App\Http\Services\Admin;

use App\Http\Repositories\Admin\StaffRepository;
use Illuminate\Database\Eloquent\Builder;

class StaffService
{
    protected StaffRepository $staffRepository;

    public function __construct()
    {
        $this->staffRepository = new StaffRepository();
    }

    public function getUsers(string $search = "", string $date = "", int $level = -1): ?Builder
    {
        return $this->staffRepository->getUsers($search, $date, $level);
    }

    public function deleteUser(string $id): int
    {
        return $this->staffRepository->deleteUser($id);
    }
}
