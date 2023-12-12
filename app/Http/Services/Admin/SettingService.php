<?php

namespace App\Http\Services\Admin;

use App\Http\Repositories\Admin\SettingRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SettingService {
    protected SettingRepository $settingRepository;

    public function __construct()
    {
        $this->settingRepository = new SettingRepository();
    }

    public function getValueByKey(string $key): ?string
    {
        try {
            $option = $this->settingRepository->getSetting($key);

            $value = $option->value;
        } catch (\Exception $e) {
            $value = null;
        }

        return $value;
    }

    public function save(array $data): bool
    {
        try {
            foreach ($data as $key => $value) {
                if(str_contains($key, 'logo')) {
                    if (option($key) != null) {
                        Storage::disk('public')->delete(option('site_logo'));
                    }

                    $fileLogo = $value;
                    $nameFileLogo = $key . '_' . Str::random(10) . '.' . $fileLogo->extension();
                    $filePathLogo = $fileLogo->storeAs('images', $nameFileLogo, 'public');

                    $value = $filePathLogo;
                }
                $this->settingRepository->save($key, $value);
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
