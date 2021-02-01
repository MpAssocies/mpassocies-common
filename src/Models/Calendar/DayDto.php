<?php


namespace MpAssocies\Models\Calendar;


use DateTimeImmutable;
use Exception;
use MpAssocies\Models\StringUtils;

class DayDto
{
    /**
     * @var boolean
     */
    public $currentMonth;

    /**
     * @var EventDto[]
     */
    public $events;

    /**
     * @var DateTimeImmutable
     */
    public $date;

    /**
     * @return array
     */
    public function serialize(){
        $eventsArray = [];
        foreach ($this->events as $event){
            $eventsArray[] = $event->serialize();
        }

        return [
            'date' => $this->date->format(StringUtils::DATE_FORMAT),
            'events' => $eventsArray,
            'currentMonth' => $this->currentMonth,
        ];
    }

    /**
     * @param array $array
     * @return DayDto
     * @throws Exception
     */
    public static function deserialize(array $array){
        $day = new DayDto();
        $day->date = new DateTimeImmutable($array['date']);
        $day->currentMonth = $array['currentMonth'];
        $day->events = [];
        foreach ($array['events'] as $item){
            $day->events[] = EventDto::deserialize($item);
        }

        return $day;
    }
}