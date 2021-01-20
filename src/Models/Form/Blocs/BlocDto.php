<?php


namespace MpAssocies\Models\Form\Blocs;


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

    public function serialize(){
        return [
            'id' => $this->id,
            'type' => $this->type,
            'position' => $this->position,
            'metadata' => $this->metadata,
            'sheetId' => $this->sheetId
        ];
    }
}