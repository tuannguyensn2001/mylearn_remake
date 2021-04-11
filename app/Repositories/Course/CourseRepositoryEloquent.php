<?php

namespace App\Repositories\Course;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Course\CourseRepository;
use App\Models\Course;
use App\Validators\Course\CourseValidator;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class CourseRepositoryEloquent.
 *
 * @package namespace App\Repositories\Course;
 */
class CourseRepositoryEloquent extends BaseRepository implements CourseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Course::class;
    }


    /**
     * Boot up the repository, pushing criteria
     * @throws RepositoryException
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    public function courseActive()
    {
        // TODO: Implement courseActive() method.

    }
}
