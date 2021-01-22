<?php
namespace MpAssocies\Models\Calendar;

use DateTimeImmutable;
use Exception;
use MpAssocies\Models\StringUtils;

class EventDto
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var EventType
     */
    public $type;

    /**
     * @var DateTimeImmutable
     */
    public $start;

    /**
     * @var DateTimeImmutable
     */
    public $end;

    /**
     * @var array
     */
    public $metadata;

    /**
     * @var DateTimeImmutable
     */
    public $createdAt;

    /**
     * @var DateTimeImmutable
     */
    public $updatedAt;

    /**
     * @return array
     */
    public function serialize()
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'start' => $this->start->format(StringUtils::DATE_FORMAT),
            'end' => $this->end->format(StringUtils::DATE_FORMAT),
            'metadata' => $this->metadata,
            'createdAt' => $this->createdAt->format(StringUtils::DATE_FORMAT),
            'updatedAt' => $this->updatedAt->format(StringUtils::DATE_FORMAT),
        ];
    }

    /**
     * @param array $array
     * @return EventDto
     * @throws Exception
     */
    public static function deserialize(array $array){
        switch ($array['type'] ?? 'UNKNOWN'){
            case EventType::MEETING:
                return MeetingDto::deserialize($array);
                break;
            case EventType::DISPONIBILITY:
                return DisponibilityDto::deserialize($array);
                break;
        }

        $event = new EventDto();
        $event->fillGenericEventDto($array);
        return $event;
    }

    /**
     * @param array $array
     * @throws Exception
     */
    public function fillGenericEventDto(array $array){
        $this->id = $array['id'];
        $this->type = $array['type'];
        $this->start = new DateTimeImmutable($array['start']);
        $this->end = new DateTimeImmutable($array['end']);
        $this->metadata = $array['metadata'];
        $this->createdAt = new DateTimeImmutable($array['createdAt']);
        $this->updatedAt = new DateTimeImmutable($array['updatedAt']);
    }
}