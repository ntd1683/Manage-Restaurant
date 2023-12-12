<?php

namespace App\Http\Repositories\Admin;


use App\Models\User;
use function Laravel\Prompts\password;

class ProfileRepository
{
    protected User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function save(array $data): bool
    {
        try {
            $user = $this->user::query()
                ->updateOrCreate([
                    "email" => auth()->user()->email,
                ], $data);

            $user->save();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
