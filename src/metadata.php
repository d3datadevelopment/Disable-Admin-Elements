<?php

use D3\DisableAdminElements\Modules\Application\Controller\Admin\NavigationTree as D3NavigationTree;
use OxidEsales\Eshop\Application\Controller\Admin\NavigationTree;

/**
 * Metadata version
 */
$sMetadataVersion = '2.1';

/**
 * Module information
 */
$aModule = array(
    'id'          => 'disableadminelements',
    'title'       =>
        (class_exists(d3utils::class) ? d3utils::getInstance()->getD3Logo() : 'D&sup3;') . ' Ausblenden von ungenutzen Men&uuml;punkten im Admin',
    'description' => array(
        'de' => 'Tragen Sie in den Einstellungen die id der gew&uuml;nschten Elemente (Men&uuml;punkte, Tabs etc.) aus den menu.xml Dateien ein und das jeweilige Element wird f&uuml;r alle Adminbenutzer ausgeblendet.',
        'en' => '',
    ),
    'thumbnail'   => 'picture.png',
    'version'     => '1.0',
    'author'      => 'D&sup3; Data Development (Inh.: Thomas Dartsch)',
    'email'       => 'support@shopmodule.com',
    'url'         => 'http://www.oxidmodule.com/',
    'extend'      => [
        NavigationTree::class    => D3NavigationTree::class,
    ],

    'settings' => array(

        array(
            'group'     => 'd3disableAdminElements_group',
            'name'      => 'd3disableAdminElements_elemtentlist',
            'type'      => 'arr',
            'value'     => array('tbclorder_downloads', 'tbclarticle_files'),
        ),

    ),

);