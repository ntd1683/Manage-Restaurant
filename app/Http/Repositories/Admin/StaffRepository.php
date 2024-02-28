<?php

namespace App\Http\Repositories\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class StaffRepository {
    protected User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function getUsers(string $search = "", string $date = "", int $level = -1): ?Builder
    {
        try {
            $users = $this->user::query();
            if(!empty($search)) {
                $users = $users->where('name','like', "%" . $search . "%");
//                    ->orWhere('email','like', "%" . $search . "%")
//                    ->orWhere('id_card','like', "%" . $search . "%");
            }

            if (!empty($date)) {
                $users = $users->whereDate('created_at', $date);
            }

            if ($level != -1) {
                $users = $users->where('level', $level);
            }

            return $users;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function deleteUser(string $id): int
    {
        return $this->user::destroy($id);
    }
}
