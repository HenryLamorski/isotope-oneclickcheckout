<?php
/**
 * Fidor-Payments: all in one Payment Solutions
 *
 * Copyright (c) 2017 Henry Lamorski
 *
 * @package FidorPays
 * @author  Henry Lamorski <henry.lamorski@mailbox.org>
 */


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['iso_oneclickcheckout'] = '{title_legend},name,headline,type;{config_legend},iso_purgeCart,iso_arrSkuQtys;{redirect_legend},iso_addProductJumpTo';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['iso_purgeCart'] = array
(
	'label'                     => &$GLOBALS['TL_LANG']['tl_module']['iso_purgeCart'],
    'exclude'                   => true,
    'inputType'                 => 'checkbox',
    'eval'                      => array('tl_class'=>'w50'),
    'sql'                       => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_module']['fields']['iso_arrSkuQtys'] = array
(
    'label'                     => &$GLOBALS['TL_LANG']['tl_module']['iso_arrSkuQtys'],
    'exclude'                   => true,
    'inputType'                 => 'multiColumnWizard',
    'eval'                      => array(
        'mandatory' => true,
        'tl_class'  => 'clr',
        'columnFields' => array(
			'product_id' => array
			(
				'label'                 => 'product_id',
				'exclude'               => true,
				'inputType'             => 'text',
				'eval' 					=> array('style'=>'width:180px')
			),
			'product_qty' => array
			(
				'label'                 => 'product_qty',
				'exclude'               => true,
				'inputType'             => 'text',
				'eval' 					=> array('style'=>'width:180px')
			),
        )
    ),
    'sql'                       => 'blob NULL',
);
