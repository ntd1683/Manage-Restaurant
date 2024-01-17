<?php

namespace App\Tables;

use Illuminate\Database\Eloquent\Builder;

class StaffTable extends Table
{
    protected Builder $query;

    public function __construct(Builder $builder)
    {
        $this->query = $builder;
        $this->deleteUrl = route("admin.staff.index") . "/delete";
    }

    protected function table(): Builder
    {
        return $this->query;
    }

    protected function columns(): array
    {
        return [
            "id" => "#",
            "name" => "Name",
            "phone" => "Phone",
            "created_at" => "Join At",
            "levelKey" => "Level",
            "delete" => "Delete",
        ];
    }
}
