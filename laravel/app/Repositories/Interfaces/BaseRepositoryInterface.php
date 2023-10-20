<?php

namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

/**
 * @method onlyTrashed(string $string)
 * @method latest(string $string)
 */
interface BaseRepositoryInterface
{
    /**
     * @return Collection
     */
    public function get(): Collection;

    /**
     * @param int $perPage
     * @param array $columns
     * @param string $pageName
     * @param int|null $page
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate(int $perPage = 15, array $columns = ['*'], string $pageName = 'page', ?int $page = null): LengthAwarePaginator;

    /**
     * @param mixed $value
     * @param string|null $column
     * @return JsonResource
     */
    public function first(mixed $value, ?string $column = 'id'): JsonResource;

    /**
     * @param array $fillable
     * @param string $orderField
     * @param string $orderType
     * @return Collection
     */
    public function where(array $fillable, string $orderField = 'id', string $orderType = 'desc'): Collection;

    /**
     * @param array $data
     * @return void
     */
    public function create(array $data): void;

    /**
     * @param int $id
     * @param array $data
     * @return void
     */
    public function updateById(int $id, array $data): void;

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void;

    /**
     * @param int $id
     * @return void
     */
    public function restoreById(int $id): void;
}
