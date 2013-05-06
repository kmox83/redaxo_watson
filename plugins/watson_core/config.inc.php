<?php

/**
 *
 * @author blumbeet - web.studio
 * @author Thomas Blum
 * @author mail[at]blumbeet[dot]com Thomas Blum
 *
 */


$basedir  = __DIR__;
$myaddon  = ltrim(substr($basedir, strrpos($basedir, '/')), DIRECTORY_SEPARATOR);


$REX['ADDON']['rxid'][$myaddon] = '';

// Credits
$REX['ADDON']['version'][$myaddon]     = '0.0';
$REX['ADDON']['author'][$myaddon]      = 'blumbeet - web.studio';
$REX['ADDON']['supportpage'][$myaddon] = '';
$REX['ADDON']['perm'][$myaddon]        = 'admin[]';



// Check AddOns und Versionen --------------------------------------------------
if (OOPlugin::isActivated('watson', $myaddon)) {

    if ($REX['USER']) {
        require_once($basedir . '/lib/' . $myaddon . '.php');

        // rechte werden in der class geprüft
        $object = new watson_core_articles();
        rex_register_extension('WATSON_SEARCHER', array('watson_searcher', 'registerExtension'), array('searcher' => $object));

        $object = new watson_core_logout();
        rex_register_extension('WATSON_SEARCHER', array('watson_searcher', 'registerExtension'), array('searcher' => $object));

        $object = new watson_core_start();
        rex_register_extension('WATSON_SEARCHER', array('watson_searcher', 'registerExtension'), array('searcher' => $object));

        $object = new watson_core_home();
        rex_register_extension('WATSON_SEARCHER', array('watson_searcher', 'registerExtension'), array('searcher' => $object));


        if ($REX['USER']->isAdmin()) {
            $object = new watson_core_modules();
            rex_register_extension('WATSON_SEARCHER', array('watson_searcher', 'registerExtension'), array('searcher' => $object));

            $object = new watson_core_templates();
            rex_register_extension('WATSON_SEARCHER', array('watson_searcher', 'registerExtension'), array('searcher' => $object));

            $object = new watson_core_users();
            rex_register_extension('WATSON_SEARCHER', array('watson_searcher', 'registerExtension'), array('searcher' => $object));
        }

    }
}
