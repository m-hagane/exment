<?php
namespace Exceedone\Exment\Services\ViewFilter\Items\DayOn;

use Exceedone\Exment\Services\ViewFilter;
use Exceedone\Exment\Enums\FilterOption;

class DayTomorrow extends ViewFilter\DayOnBase
{
    public static function getFilterOption(){
        return FilterOption::DAY_TOMORROW;
    }

    protected function getTargetDay($query_value)
    {
        return \Carbon\Carbon::tomorrow();
    }
}
