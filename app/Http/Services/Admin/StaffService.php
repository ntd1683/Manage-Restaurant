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

    public function getUsers(string $key = ""): ?Builder
    {
        return $this->staffRepository->getUsers($key);
    }

    public function getUsersByLevel(int $level): ?Builder
    {
        return $this->staffRepository->getUsersByLevel($level);
    }

    public function deleteUser(string $id): int
    {
        return $this->staffRepository->deleteUser($id);
    }
}
