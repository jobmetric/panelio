<?php

namespace JobMetric\Panelio\Enums;

use JobMetric\PackageCore\Enums\EnumToArray;

/**
 * @method static JSON()
 * @method static XML()
 * @method static EXCEL()
 * @method static WORD()
 * @method static CSV()
 * @method static PDF()
 */
enum ImportExportTypeEnum: string
{
    use EnumToArray;

    case JSON = "json";
    case XML = "xml";
    case EXCEL = "excel";
    case WORD = "word";
    case CSV = "csv";
    case PDF = "pdf";
}
