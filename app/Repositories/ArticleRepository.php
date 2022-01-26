<?php

namespace App\Repositories;


use App\Models\Article;
use Illuminate\Support\Collection;

class ArticleRepository
{
    private $model;

    public function __construct(Article $article)
    {
        $this->model = $article;
    }

    public function getList(array $select = [], array $filter = []): Collection
    {
        $query = $this->model::query();

        if (!empty($select)) {
            $query->select($select);
        }

        return !empty($filter['paginate'])
            ? $query->paginate($filter['paginate'])
            : $query->get();
    }

    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }
}
