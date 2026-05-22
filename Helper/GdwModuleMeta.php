<?php
declare(strict_types=1);

namespace GDW\Faqs\Helper;

final class GdwModuleMeta
{
    /** @return array{desc:string, config_path:string, config_anchor:string, repo_url:string, docs_url:string} */
    public static function getMeta(): array
    {
        return [
            'desc' => 'Permite agregar preguntas frecuentes en productos o cualquier tema mediante widget.',
            'config_path' => 'adminhtml/system_config/edit/section/gdwcatalog',
            'config_anchor' => '#gdwcatalog_faqs-link',
            'repo_url' => 'https://github.com/josecruzchavez/GDW_Faqs',
            'docs_url' => 'https://docs.gdw.mx/modulos/gdw_faqs',
        ];
    }
}