<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Jobdating;

use App\Domain\Jobdating\Jobdating;
use App\Domain\Jobdating\JobdatingNotFoundException;
use App\Domain\Jobdating\JobDatingRepository;

class InMemoryJobDatingRepository implements JodDatingRepository
{
    /**
     * @var Jobdating[]
     */
    private $jobdating;

    /**
     * InMemoryJobDatingRepository constructor.
     *
     * @param array|null $jobdatings
     */
    public function __construct(array $jobdatings = null)
    {
        $this->jobdatings = $jobdatings ?? $this->load();
    }
    private function load(){
            return [
            1 => new Jobdating(1,'jobdating number one' ),
            2 => new Jobdating(2,),
            3 => new Jobdating(3,),
            4 => new Jobdating(4,),
            5 => new Jobdating(5,),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        // request on Database
        //return results
        return array_values($this->jobdatings);
    }

    /**
     * {@inheritdoc}
     */
    public function findJobdatingOfId(int $id): Jobdating
    {
        //request on database
        // if IDjobdating not found
        if (!isset($this->jobdatings[$id])) {
            // throw exception
            throw new JobdatingNotFoundException();
        }

        //return Jobdating
        return $this->jobdatings[$id];
    }
}
