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

    protected string $deleteUrl;

    public function render(): string
    {
        return view('components.partials.table', [
            'columns' => $this->columns(),
            'data' => $this->table()->paginate($this->perPage),
            'deleteUrl' => $this->deleteUrl,
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

    public function setPerPage(int $perPage): self
    {
        $this->perPage = $perPage;
        return $this;
    }
}
