<?php

namespace App\Tables;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;

abstract class Table implements Htmlable, Renderable
{
    protected int $perPage = 15;

    abstract protected function table(): Builder;

    abstract protected function columns(): array;

    public function render(): string
    {
        dd($this->table()->paginate($this->perPage));
        return view('components.partials.table', [
            'columns' => $this->columns(),
            'data' => $this->table()->paginate($this->perPage),
        ])->render();
    }

    public function toHtml(): HtmlString
    {
        return new HtmlString($this->render());
    }

    public function sort(string $sort , string $column): LengthAwarePaginator
    {
        return $this->table()->orderBy($column, $sort)->paginate($this->perPage);
    }
}
