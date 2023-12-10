<?php

namespace App\Http\Repositories\Admin;

use App\Models\Option;
use Illuminate\Database\Eloquent\Builder;

class SettingRepository
{
    protected Option $option;

    public function __construct()
    {
        $this->option = new Option();
    }

    /**
     * @param string $key
     * @return Builder|Option
     */
    public function getSetting(string $key): Builder|Option
    {
        return $this->option::query()
            ->where('name', $key)->firstOrFail();
    }

    public function save(string $key, string $value = null): bool
    {
        try {
            $option = $this->option::query()
                ->updateOrCreate([
                    "name" => $key
                ], [
                    "value" => $value
                ]);

            $option->save();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
