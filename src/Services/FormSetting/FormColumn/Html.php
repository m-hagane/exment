<?php
namespace Exceedone\Exment\Services\FormSetting\FormColumn;

use Exceedone\Exment\Services\FormSetting\FormBlock\BlockBase;
use Encore\Admin\Widgets\Form as WidgetForm;

/**
 */
class Html extends OtherBase
{
    /**
     * Get setting modal form 
     *
     * @return WidgetForm
     */
    public function getSettingModalForm(BlockBase $block_item, array $parameters) : WidgetForm
    {
        $form = new WidgetForm($parameters);

        $form->textarea('html', exmtrans('custom_form.html'))
            ->help(exmtrans('custom_form.help.html'))
            ->rows(15);

        return $form;
    }


    /**
     * prepare saving option.
     *
     * @return array|string
     */
    public function prepareSavingOptions(array $options) : array
    {
        return array_filter($options, function($option, $key){
            return in_array($key, [
                'html',
            ]);
        }, ARRAY_FILTER_USE_BOTH);
    }
}
