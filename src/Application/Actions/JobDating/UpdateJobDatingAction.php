<?php
declare(strict_types=1);

namespace App\Application\Actions\JobDating;

use Psr\Http\Message\ResponseInterface as Response;

class UpdateJobDatingAction extends JobDatingAction

{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $jobdatingId = (int) $this->resolveArg('id');

        $datas= $this->getFormaData();

        /**
         * @var Jobdating
         */
        $jobdating = $this->jobdatingRepository->findUserOfId($jobdatingId);

        /**
         * @var bool
         */
        $response = $user->update($datas);

        $this->logger->info("Jobdating of id `${jobdatingId}` was viewed.");

        return $this->respondWithData(['status'=>$response, "jobdating"=>$jobdating]);
    }
}