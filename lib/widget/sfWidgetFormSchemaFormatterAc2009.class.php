<?php

class sfWidgetFormSchemaFormatterAc2009 extends sfWidgetFormSchemaFormatter
{
    protected
        $rowFormat       = '<div class="form_row">
                        %label%  %error% <br/> %field%
                        %help% %hidden_fields%</div>',
        $errorRowFormat  = '<div>%errors%</div>' ,
        $helpFormat      = '<div class="form_help">%help%</div>',
        $decoratorFormat = '<div>  %content%</div>';

    public function formatRow($label, $field, $errors = array(), $help = '', $hiddenFields = null)
    {
        $row = parent::formatRow(
            $label,
            $field,
            $errors,
            $help,
            $hiddenFields
        );

        return strtr($row, array(
            '%row_class%' => (count($errors) > 0) ? ' form_row_error' : '',
        ));
    }
}
