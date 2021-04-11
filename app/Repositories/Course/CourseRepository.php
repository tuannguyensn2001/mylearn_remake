<?php

namespace App\Repositories\Course;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CourseRepository.
 *
 * @package namespace App\Repositories\Course;
 */
interface CourseRepository extends RepositoryInterface
{
    //
    public function get();

    public function courseActive();

}
