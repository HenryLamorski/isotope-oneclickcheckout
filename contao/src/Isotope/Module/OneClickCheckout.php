<?php

/**
 * Isotope eCommerce for Contao Open Source CMS
 *
 * Copyright (C) 2009-2016 terminal42 gmbh & Isotope eCommerce Workgroup
 * 
 * @author Henry Lamorski <henry.lamorski@mailbox.org>
 *
 * @link       https://isotopeecommerce.org
 * @license    https://opensource.org/licenses/lgpl-3.0.html
 */

namespace Isotope\Module;

use Haste\Util\Url;
use Isotope\Interfaces\IsotopeProduct;
use Isotope\Model\Product;

/**
 * @property array $iso_cumulativeFields
 */
class OneClickCheckout extends Module
{
	public $iso_arrSkuQtys=array();
 
	/**
     * Constructor.
     *
     * @param object $objModule
     * @param string $strColumn
     */
	public function __construct($objModule, $strColumn = 'main')
    {
        parent::__construct($objModule, $strColumn);
        $this->arrSkuQtys = deserialize($this->iso_arrSkuQtys);
    }
	
    /**
     * Compile the module
     */
    protected function compile()
    {
        if($this->iso_purgeCart)
			Isotope::getCart()->purge();
        
        foreach($this->iso_arrSkuQtys as $arrSkuQty)
        {
			$objProduct = Product::findPublishedByPk($arrSkuQty['product_id']);
			$intQty = $arrSkuQty['product_qty'];
			Isotope::getCart()->addProduct($objProduct, $intQty, array());
		}
        
		\Controller::redirect(
			Url::prepareUrl($this->iso_addProductJumpTo)
		);
        
    }
	
	
}
