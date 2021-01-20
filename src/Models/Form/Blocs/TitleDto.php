<?php


namespace MpAssocies\Models\Form\Blocs;


use MpAssocies\Models\Form\TitleLevel;

class TitleDto extends BlocDto
{
    /**
     * @var TitleLevel
     */
    public $level;

    /**
     * @var string
     */
    public $content;

    public function serialize()
    {
        return array_merge(parent::serialize(), [
            'level' => $this->level,
            'content' => $this->content,
        ]);
    }


    /**
     * @param array $array
     * @return TitleDto
     */
    public static function deserializeBloc(array $array)
    {
        $title = new TitleDto();
        $title->fillGenericData($array);
        $title->level = $array['level'];
        $title->content = $array['content'];
        return $title;
    }
}