<?php


namespace app\components;

use yii\i18n\Formatter;

class PhoneFormatter extends Formatter
{
    public $phoneMask;

    public function init() {
        parent::init();

        if ($this->phoneMask === null) {
            $this->phoneMask = '# (###) ###-##-##';
        }
    }

    public function asPhone($value, $mask = null)
    {
        if ($value === null) {
            return $this->nullDisplay;
        }

        if ($mask === null) {
            $mask = $this->phoneMask;
        }

        $pattern = '/^' . str_repeat('(\d)?', substr_count($mask, '#')) . '$/';
        $replacement = preg_replace_callback(
            '/([#])/',
            function () use (&$counter){
                return '${' . (++$counter) . '}';
            },
            $mask
        );
        return preg_replace($pattern, $replacement, $value);
    }
}