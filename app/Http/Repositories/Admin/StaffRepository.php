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

    public function getUsers(string $key = ""): ?Builder
    {
        try {
            $users = $this->user::query();
                if ($key !== "") {
                    $users = $users->where('name','like', $key)
                        ->orWhere('email','like', $key)
                        ->orWhere('id_card','like', $key);
                }

                return $users;
        } catch (\Exception $e) {
            return null;
        }
    }

}
