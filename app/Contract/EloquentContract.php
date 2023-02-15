<?php


namespace App\Contract;


interface EloquentContract
{
    public function all($paginate = true, $page = 1, $relations = [], $whereConditions = [], string|null $sort = null);

    public function allByAuth(string $guard, $paginate = false, $page = 1);

    public function findById($id, $relations = []);

    public function findByIdAuth(string $guard, int $id);

    public function search(string $key, string|null $value = null);

    public function create(array $params, $image = null);

    public function update(int $id, array $params, $image = null);

    public function delete(int $id);
}
