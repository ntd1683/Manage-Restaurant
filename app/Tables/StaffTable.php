<?php

namespace App\Tables;

use Illuminate\Database\Eloquent\Builder;

class StaffTable extends Table
{
    protected Builder $query;

    public function __Construct(Builder $builder)
    {
        $this->query = $builder;
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
