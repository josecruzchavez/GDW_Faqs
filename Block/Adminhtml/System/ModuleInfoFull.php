<?php
namespace GDW\Faqs\Block\Adminhtml\System;

use GDW\Core\Block\Adminhtml\System\Core\ModuleInfoFull as Fieldset;

class ModuleInfoFull extends Fieldset
{
    const GDW_MODULE_CODE = 'GDW_Faqs';
    const GDW_MODULE_LINK = '';
    const GDW_MODULE_LINK_SECC = '';
    
    public function getDescFull()
    {
        $html =
<<<HTML
    <p>Permite Agregar preguntas frecuentes de productos o cualquier tema</p>
    <p>Se puede habilitar una tab en cada producto o se puede agregar mediante un widget en cualquier lugar</p>
HTML;
        return $html;
    }
}