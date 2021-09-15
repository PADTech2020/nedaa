<?php

namespace Botble\Base\Enums;

use Botble\Base\Supports\Enum;
use Html;

/**
 * @method static BaseStatusEnum DRAFT()
 * @method static BaseStatusEnum PUBLISHED()
 * @method static BaseStatusEnum PENDING()
 */
class SliderStatusEnum extends Enum
{
    public const ISSLIDER = 1;
    public const NOTSLIDER = 0;

    /**
     * @var string
     */
    public static $langPath = 'core/base::enums.statuses';

    /**
     * @return string
     */
    public function toHtml()
    {
        switch ($this->value) {
            case self::ISSLIDER:
                return Html::tag('span', self::ISSLIDER()->label(), ['class' => 'label-info status-label'])
                    ->toHtml();
            case self::NOTSLIDER:
                return Html::tag('span', self::NOTSLIDER()->label(), ['class' => 'label-warning status-label'])
                    ->toHtml();
            default:
                return parent::toHtml();
        }
    }
}
