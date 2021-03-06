<?php
declare(strict_types=1);

namespace App\Domain\jobdating;

use App\Domain\DomainException\DomainRecordNotFoundException;

class JobdatingNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The jobdating you requested does not exist.';
}
