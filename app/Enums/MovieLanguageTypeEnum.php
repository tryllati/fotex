<?php

declare(strict_types=1);

namespace App\Enums;

enum MovieLanguageTypeEnum: string
{
    case HUNGARIAN  = 'magyar';
    case ENGLISH    = 'angol';
    case GERMAN     = 'német';
    case FRENCH     = 'francia';
    case SPANISH    = 'spanyol';
    case ITALIAN    = 'olasz';
    case DUTCH      = 'holland';
    case PORTUGUESE = 'portugál';
    case POLISH     = 'lengyel';
    case ROMANIAN   = 'román';
    case CZECH      = 'cseh';
    case SWEDISH    = 'svéd';
    case GREEK      = 'görög';
}
