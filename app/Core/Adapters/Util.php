<?php

namespace App\Core\Adapters;


/**
 * Adapter class to make the magentix core lib compatible with the Laravel functions
 *
 * Class Util
 *
 * @package App\Core\Adapters
 */
class Util extends \App\Core\Util
{
    /**
     * Print the value if the condition met
     *
     * @param $cond
     * @param $value
     * @param  string  $alt
     *
     * @return false|string
     */
    public static function putIf($cond, $value, $alt = '')
    {
        ob_start();

        // Call the function from core Util
        echo self::getIf($cond, $value, $alt);

        return ob_get_clean();
    }

    /**
     * Print the notice
     *
     * @param $text
     * @param  string  $state
     * @param  string  $icon
     */
    public static function notice($text, $state = 'danger', $icon = 'icons/duotune/art/art006.svg') {
        $html = '';

        $html .= '<!--begin::Notice-->';
        $html .= '<div class="d-flex align-items-center rounded py-5 px-4 bg-light-' . $state . ' ">';
        $html .= '  <!--begin::Icon-->';
        $html .= '  <div class="d-flex h-80px w-80px flex-shrink-0 flex-center position-relative ms-3 me-6">';
        $html .= '      ' . Theme::getSvgIcon("icons/duotune/abstract/abs051.svg", "svg-icon-" . $state . " position-absolute opacity-10", "w-80px h-80px");
        $html .= '	    ' . Theme::getSvgIcon($icon, "svg-icon-3x svg-icon-" . $state . "  position-absolute");
        $html .= '  </div>';
        $html .= '  <!--end::Icon-->';

        $html .= '  <!--begin::Description-->';
        $html .= '      <div class="text-gray-700 fw-bold fs-6 lh-lg">';
        $html .=            $text;
        $html .= '      </div>';
        $html .= '  <!--end::Description-->';
        $html .= '</div>';
        $html .= '<!--end::Notice-->';

        echo $html;
    }

    public static function putHtmlAttributes($attributes)
    {
        return self::getHtmlAttributes($attributes);
    }
}
