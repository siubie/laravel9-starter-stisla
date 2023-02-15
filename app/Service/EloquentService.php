<?php


namespace App\Service;


use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EloquentService
{

    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function build(): Model
    {
        return $this->model;
    }

    public function all($paginate = false, $page = 1, $relations = [], $whereConditions = [], string|null $sort = null)
    {
        try {
            $model = $this->model::query()
                ->where($whereConditions)
                ->with($relations);

            if ($sort) {
                $order = 'ASC';

                if (strncmp($sort, '-', 1) === 0) {
                    $sort = substr($sort, 1);
                    $order = 'DESC';
                }

                $model = $model->orderBy($sort, $order);
            } else {
                $model = $model->orderBy('id', 'DESC');
            }

            if ($paginate) {
                $model = $model->paginate(10, ["*"], "page", $page);

                return [
                    'data' => $model->items(),
                    'prev_page' => (int)mb_substr($model->previousPageUrl(), -1) ?: null,
                    'current_page' => $model->currentPage(),
                    'next_page' => (int)mb_substr($model->nextPageUrl(), -1) ?: null
                ];
            } else {
                return $this->model->all();
            }
        } catch (Exception $exception) {
            return $exception;
        }
    }

    public function allByAuth(string $guard, $paginate = false, $page = 1)
    {
        try {
            $modelId = Auth::guard($guard)->id();
            if ($paginate) {
                $model = $this->model::query()
                    ->orderBy('id', 'desc')
                    ->where($guard . '_id', $modelId)
                    ->paginate(10, ["*"], "page", $page);

                return [
                    'data' => $model->items(),
                    'prev_page' => (int)mb_substr($model->previousPageUrl(), -1) ?: null,
                    'current_page' => $model->currentPage(),
                    'next_page' => (int)mb_substr($model->nextPageUrl(), -1) ?: null
                ];
            } else {
                return $this->model->where($guard . '_id', $modelId)->get();
            }
        } catch (Exception $exception) {
            return $exception;
        }
    }

    public function findById($id, $relations = [])
    {
        try {
            if (!$model = $this->model::query()->where("id", "=", $id)->with($relations)->first()) {
                return new Exception(sprintf('Data with Id %s Not Found', $id));
            }

            return $model;
        } catch (Exception $exception) {
            return $exception;
        }
    }

    public function findByIdAuth(string $guard, int $id)
    {
        try {
            $modelId = Auth::guard($guard)->id();

            if (!$model = $this->model->where($guard . '_id', $modelId)->find($id)) {
                return new Exception(sprintf('Data with Id %s Not Found', $id));
            }

            return $model;
        } catch (Exception $exception) {
            return $exception;
        }
    }

    public function search(string $key, string|null $value = null)
    {
        try {
            if (is_null($value)) {
                return null;
            }

            return $this->model::query()
                ->where($key, 'like', '%' . $value . '%')
                ->get(['id', $key]);
        } catch (Exception $exception) {
            return $exception;
        }
    }

    public function create(array $params, $image = null)
    {
        try {
            DB::beginTransaction();

            $model = $this->model->create($params);

            if (!is_null($image)) {
                foreach ($image as $key => $value) {
                    $model->addMultipleMediaFromRequest([$key])->each(function ($image) use ($key) {
                        $image->toMediaCollection($key);
                    });
                }
            }

            DB::commit();
            return $model->fresh();
        } catch (Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }

    public function update(int $id, array $params, $image = null)
    {
        try {
            DB::beginTransaction();

            if (!$model = $this->model::query()->where('id', '=', $id)->first()) {
                return new Exception(sprintf('Data with Id %s Not Found', $id));
            }

            $model->update($params);

            if (!is_null($image)) {
                foreach ($image as $key => $value) {
                    $model->clearMediaCollection();
                    $model->addMultipleMediaFromRequest([$key])->each(function ($image) use ($key) {
                        $image->toMediaCollection($key);
                    });
                }
            }

            DB::commit();
            return $model;
        } catch (Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }

    public function delete(int $id)
    {
        try {
            DB::beginTransaction();

            if (!$model = $this->model->where('id', $id)->first()) {
                return new Exception(sprintf('Data with Id %s Not Found', $id));
            }

            $model->delete();

            DB::commit();
            return true;
        } catch (Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }


}
