<?php
namespace MpAssocies\Models\Calendar;

use Exception;

class MeetingDto extends EventDto
{
    /**
     * @var integer
     */
    public $serviceId;

    /**
     * @var integer
     */
    public $userId;

    /**
     * @param array $array
     * @return MeetingDto
     * @throws Exception
     */
    public static function deserialize(array $array){
        $meeting = new MeetingDto();
        $meeting->fillGenericEventDto($array);
        $meeting->serviceId = $array['serviceId'];
        $meeting->userId = $array['userId'];
        return $meeting;
    }

    /**
     * @return array
     */
    public function serialize()
    {
        return array_merge(parent::serialize(), [
            'serviceId' => $this->serviceId,
            'userId' => $this->userId,
        ]);
    }
}