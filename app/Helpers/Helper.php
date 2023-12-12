<?php

use App\Http\Services\Admin\SettingService;

if (!function_exists('option')) {
    function option($name, $default = '')
    {
        $settingService = new SettingService();
        $value = $settingService->getValueByKey($name);

        if ($value == null) {
            return $default;
        }

        return $value;
    }

    if (!function_exists('getNameRouteMain')) {
        function getNameRouteMain(): string
        {
            $arrRouteName = explode('.', request()->route()->getName());

            $result = $arrRouteName[0];
            if($arrRouteName[0] == 'admin') {
                $result = $arrRouteName[1];
            }

            return $result == "index" ? "" : $result;
        }
    }

    if (!function_exists('getSubtitle')) {
        function getSubtitle(): string
        {
            $result = getNameRouteMain();

            return $result == "" ? "" : ' - '. ucfirst($result);
        }
    }

    if (!function_exists('getImageFromStorage')) {
        function getImageFromStorage($value, $url): string
        {
            if ($value == '' || $value == null) {
                return asset($url);
            }

            return Storage::url($value);
        }
    }
}
