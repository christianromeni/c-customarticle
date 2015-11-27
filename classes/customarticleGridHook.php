<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @package   customarticle
 * @author    Christian Romeni  <christian@romeni.eu>
 * @link      https://romeni.eu
 * @license   GNU
 * @copyright Romeni WebDesign
 */

namespace customarticle;

class customarticleGridHook extends \Frontend {
	/**
	 * [insertCustomGrid description]
	 * @param  Database_Result $objElement
	 * @param  [string]          $strBuffer
	 * @return [string]
	 */
	public function insertCustomGrid($objElement, $strBuffer)
	{
		$strClass = $this->findContentElement($objElement->type);
		$objElement = new $strClass($objElement);

		$classes = ' col';
		if($objElement->grid_xs != ''){
			$classes .= ' col-xs-' . $objElement->grid_xs;
		}
		if($objElement->grid_sm != ''){
			$classes .= ' col-sm-' . $objElement->grid_sm;
		}
		if($objElement->grid_md != ''){
			$classes .= ' col-md-' . $objElement->grid_md;
		}
		if($objElement->grid_lg != ''){
			$classes .= ' col-lg-' . $objElement->grid_lg;
		}
		if($objElement->grid_visible != ''){
			$grid_visible = @unserialize($objElement->grid_visible);
			if ($grid_visible === 'b:0;' || $grid_visible !== false) {
				foreach (deserialize($objElement->grid_visible) as $key => $value) {
					$classes .= ' ' . $value;
				}
			} else {
				$classes .= ' ' . $objElement->grid_visible;
			}
		}
		if($objElement->grid_hidden != ''){
			$grid_hidden = @unserialize($objElement->grid_hidden);
			if ($grid_hidden === 'b:0;' || $grid_hidden !== false) {
				foreach (deserialize($objElement->grid_hidden) as $key => $value) {
					$classes .= ' ' . $value;
				}
			} else {
				$classes .= ' ' . $objElement->grid_hidden;
			}
		}
		if($classes != ''){
			$arrCss = deserialize($objElement->cssID);
			$arrCss[1] .= $classes;
			$objElement->cssID = $arrCss;
		}

    $strBuffer = $objElement->generate();

    return $strBuffer;
	}
}