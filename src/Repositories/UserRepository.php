<?php

namespace WGT\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Presenter\ModelFractalPresenter;
use Prettus\Repository\Traits\CacheableRepository;
use WGT\Models\User;

class UserRepository extends BaseRepository implements CacheableInterface
{
    use CacheableRepository;

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }

    /**
     * @return string
     */
    public function presenter(): string
    {
        return ModelFractalPresenter::class;
    }
}