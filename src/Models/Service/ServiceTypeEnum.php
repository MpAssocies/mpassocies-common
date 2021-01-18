<?php


namespace MpAssocies\Models\Service;


use MyCLabs\Enum\Enum;

class ServiceTypeEnum extends Enum
{
    const FRENCH_TAX_DEPARTURE_MEETING = 'FRENCH_TAX_DEPARTURE_MEETING';
    const FRENCH_TAX_ENTRY_MEETING = 'FRENCH_TAX_ENTRY_MEETING';
    const TAX_ANALYSIS_LTA = 'TAX_ANALYSIS_LTA';
    const TAX_ANALYSIS_LTA_TNC = 'TAX_ANALYSIS_LTA_TNC';
    const TAX_ANALYSIS_STA = 'TAX_ANALYSIS_STA';
    const TAX_ANALYSIS_STA_TNC = 'TAX_ANALYSIS_STA_TNC';
}