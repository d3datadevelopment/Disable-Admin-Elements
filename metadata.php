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
    'id'          => 'd3disableadminelements',
    'title'       =>
        'D³ Ausblenden von ungenutzen Menüpunkten im Admin',
    'description' => array(
        'de' => 'Tragen Sie in den Einstellungen die id der gewünschten Elemente (Menüpunkte, Tabs etc.) aus den menu.xml Dateien ein und das jeweilige Element wird für alle Adminbenutzer ausgeblendet.',
        'en' => '',
    ),
    'version'     => '1.0',
    'author'      => 'D&sup3; Data Development (Inh.: Thomas Dartsch)',
    'email'       => 'support@shopmodule.com',
    'url'         => 'https://www.oxidmodule.com/',
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