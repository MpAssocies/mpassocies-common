<?php


namespace MpAssocies\Models\Calendar;


use DateTimeImmutable;
use Exception;
use MpAssocies\Models\StringUtils;

class CalendarDto
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $userId;

    /**
     * @var DateTimeImmutable
     */
    public $createdAt;

    /**
     * @var DateTimeImmutable
     */
    public $updatedAt;

    /**
     * @var EventDto[]
     */
    public $events;

    /**
     * @return array
     */
    public function serialize()
    {
        $eventsArray = [];
        foreach ($this->events as $event){
            $eventsArray[] = $event->serialize();
        }

        return [
            'id' => $this->id,
            'userId' => $this->userId,
            'events' => $eventsArray,
            'createdAt' => $this->createdAt->format(StringUtils::DATE_FORMAT),
            'updatedAt' => $this->updatedAt->format(StringUtils::DATE_FORMAT),
        ];
    }

    /**
     * @param array $array
     * @return CalendarDto
     * @throws Exception
     */
    public static function deserialize(array $array)
    {
        $calendar = new CalendarDto();
        $calendar->id = $array['id'];
        $calendar->userId = $array['userId'];
        $calendar->createdAt = new DateTimeImmutable($array['createdAt']);
        $calendar->updatedAt = new DateTimeImmutable($array['updatedAt']);
        $calendar->events = [];
        foreach ($array['events'] as $item){
            $calendar->events[] = EventDto::deserialize($item);
        }

        return $calendar;
    }
}