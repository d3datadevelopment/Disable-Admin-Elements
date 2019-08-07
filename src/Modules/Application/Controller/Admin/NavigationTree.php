<?php
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

/**
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author        D3 Data Development - Thomas Dartsch <support@shopmodule.com>
 * @link          http://www.oxidmodule.com
 */

namespace D3\DisableAdminElements\Modules\Application\Controller\Admin;

use OxidEsales\Eshop\Core\Registry;
use DOMXPath;

class NavigationTree extends NavigationTree_parent
{

    /**
     * clean empty nodes from tree
     *
     * @param object $dom         dom object
     * @param string $parentXPath parent xpath
     * @param string $childXPath  child xpath from parent
     */
    protected function _cleanEmptyParents($dom, $parentXPath, $childXPath)
    {
        parent::_cleanEmptyParents($dom, $parentXPath, $childXPath);

        $xPath = new DomXPath($dom);
        $nodeList = $xPath->query($parentXPath);

        foreach ($nodeList as $node) {
            $id = $node->getAttribute('id');
            $childList = $xPath->query("{$parentXPath}[@id='$id']/$childXPath");

            $aListOfDisabledElements = Registry::getConfig()->getShopConfVar( 'd3disableAdminElements_elemtentlist');

            foreach($childList as $id => $node) {

                if (in_array($node->getAttribute('id'), $aListOfDisabledElements) ) {
                    $node->parentNode->removeChild($node);
                }
            }

        }

    }
}