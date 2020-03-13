<?php
declare(strict_types=1);

namespace App\Domain\Jobdating;

use JsonSerializable;
use phpDocumentor\Reflection\Types\Boolean;

class Jobdating implements JsonSerializable {

       /**
     * @var int|null
     */
    private $id;

        /**
     * @var string
     */
    private $jobdatingname;

       /**
     * @param int|null  $id
     * @param string    $jobdatingname
     */

    public function __construct(?int $id, string $username, string $firstName, string $lastName)
    {
        $this->id = $id;
        $this->jobdatingname = ucfirst($jobdatingname);
    }

     /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getJobdatingname(): string
    {
        return $this->jobdatingname;
    }

    /**
     * @param array $datas
     * @return bool
     */
    public function update(object $datas): bool {
        $response = false ;
        foreach($datas as $k => $v) {
            if(!empty($this->{$k}) && $this->{$k} !== $v) {
                $this->{$k} = $v ;
                $response = true ;
            }
        }
        return $response ;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'jobdatingname' => $this->jobdatingname,
        ];
    }
}