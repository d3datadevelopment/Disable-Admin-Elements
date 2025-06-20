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

use DOMXPath;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Framework\Module\Facade\ModuleSettingServiceInterface;

class NavigationTree extends NavigationTree_parent
{

    /**
     * clean empty nodes from tree
     *
     * @param object $dom         dom object
     * @param string $parentXPath parent xpath
     * @param string $childXPath  child xpath from parent
     */
    protected function cleanEmptyParents($dom, $parentXPath, $childXPath)
    {
        parent::cleanEmptyParents($dom, $parentXPath, $childXPath);

        $xPath = new DomXPath($dom);
        $nodeList = $xPath->query($parentXPath);

        foreach ($nodeList as $node) {
            $id = $node->getAttribute('id');
            $childList = $xPath->query("{$parentXPath}[@id='$id']/$childXPath");

            $aListOfDisabledElements = $this->getModulConfigurationAsCollection('d3disableAdminElements_elemtentlist', 'd3disableadminelements');

            foreach($childList as $id => $node) {

                if (in_array($node->getAttribute('id'), $aListOfDisabledElements) ) {
                    $node->parentNode->removeChild($node);
                }
            }
        }

    }

    public function getModulConfigurationAsCollection(string $sParam, string $sModulId)
    {
        $moduleSettingService = $this->getModuleSettingService();
        return $moduleSettingService->getCollection($sParam, $sModulId);
    }

    /**
     * @return mixed
     */
    public function getModuleSettingService()
    {
        return ContainerFactory::getInstance()
            ->getContainer()
            ->get(ModuleSettingServiceInterface::class);
    }

}