<?php


namespace MpAssocies\Models\Form\Blocs;


use DateTimeImmutable;
use Exception;
use MpAssocies\Exception\DtoDeserializationException;
use MpAssocies\Models\Form\BlocType;

class BlocDto
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var BlocType
     */
    public $type;

    /**
     * @var array
     */
    public $metadata;

    /**
     * @var integer
     */
    public $sheetId;

    /**
     * @var integer
     */
    public $position;

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
            'position' => $this->position,
            'metadata' => $this->metadata,
            'sheetId' => $this->sheetId,
            'createdAt' => $this->createdAt->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updatedAt->format('Y-m-d H:i:s')
        ];
    }

    /**
     * @param array $array
     * @return BlocDto
     * @throws DtoDeserializationException
     * @throws Exception
     */
    public static function deserialize(array $array)
    {
        $type = $array['type'] ?? null;
        if(empty($type)){
            throw new DtoDeserializationException("bloc type doesn't exists");
        }
        switch ($type){
            case BlocType::TITLE:
                return TitleDto::deserializeBloc($array);
            case BlocType::BLOC_INPUT:
                return BlocInputDto::deserializeBloc($array);
            case BlocType::CALENDAR:
                return BlocCalendarDto::deserializeBloc($array);
            case BlocType::BLOC_MARITAL:
                return BlocMaritalDto::deserializeBloc($array);
            case BlocType::BLOC_ARRAY:
                return BlocArrayDto::deserializeBloc($array);
            case BlocType::BLOC_WORKDAYS:
                return BlocWorkdaysDto::deserializeBloc($array);
            case BlocType::CHECKBOX:
                return CheckboxDto::deserializeBloc($array);
        }

        throw new DtoDeserializationException("Unknown bloc type " . $type . ". Please check switch in bloc deserializer");
    }

    /**
     * @param $array
     * @throws Exception
     */
    public function fillGenericData($array){
        $this->id = $array['id'];
        $this->type = $array['type'];
        $this->position = $array['position'];
        $this->metadata = $array['metadata'];
        $this->sheetId = $array['sheetId'];
        $this->createdAt = new DateTimeImmutable($array['createdAt']);
        $this->updatedAt = new DateTimeImmutable($array['updatedAt']);
    }
}