<?php

namespace App\Http\Services\Admin;

use App\Http\Repositories\Admin\ProfileRepository;
use Illuminate\Support\Facades\Hash;

class ProfileService {
    protected ProfileRepository $profileRepository;

    public function __construct()
    {
        $this->profileRepository = new ProfileRepository();
    }

    public function save(array $data): bool
    {
        try {
            if (isset($data['old_password']) && isset($data['new_password']))
            {
                if(! Hash::check($data['old_password'], auth()->user()->password))
                {
                    session()->flash('errors', ['Old password is incorrect']);

                    return false;
                }

                $data["password"] = Hash::make($data['new_password']);
            }

            $this->profileRepository->save($data);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
