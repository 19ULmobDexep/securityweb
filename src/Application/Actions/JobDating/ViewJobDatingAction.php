<?php
declare(strict_types=1);

namespace App\Application\Actions\JobdDating;

use Psr\Http\Message\ResponseInterface as Response;

class ViewJobDatingAction extends JobDatingAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $jobdating = (int) $this->resolveArg('id');
        $jobdating = $this->jobdatingRepository->findUserOfId($jobdatingId);

        $this->logger->info("jobdating of id `${jobdatingId}` was viewed.");

        return $this->respondWithData($jobdating);
    }
}
