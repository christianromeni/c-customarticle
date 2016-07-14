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

namespace customarticles;

class ContentHook extends \Frontend {
	/**
	 * [insertCustomGrid description]
	 * @param  Database_Result $objElement
	 * @param  [string]          $strBuffer
	 * @return [string]
	 */
	public function insertCustomGrid($objElement, $strBuffer)
	{
		global $objPage;
		$layoutID = $objPage->layout;
		$objLayout = \LayoutModel::findByID($layoutID);

		if($objLayout->activateCArticles){

			$strClass = $this->findContentElement($objElement->type);
			$newObjElement = new $strClass($objElement);

			$classes = ' col';

			$arrClasses = [
				'grid_xs'		=> 'col-xs-',
				'grid_sm'		=> 'col-sm-',
				'grid_md'		=> 'col-md-',
				'grid_lg'		=> 'col-lg-',
				'offset_xs'	=> 'col-xs-offset-',
				'offset_sm'	=> 'col-sm-offset-',
				'offset_md'	=> 'col-md-offset-',
				'offset_lg'	=> 'col-lg-offset-',
				'pull_xs'		=> 'col-xs-pull-',
				'pull_sm'		=> 'col-sm-pull-',
				'pull_md'		=> 'col-md-pull-',
				'pull_lg'		=> 'col-lg-pull-',
				'push_xs'		=> 'col-xs-push-',
				'push_sm'		=> 'col-sm-push-',
				'push_md'		=> 'col-md-push-',
				'push_lg'		=> 'col-lg-push-'
			];

			foreach ($arrClasses as $key => $classPart) {
				if($objElement->$key != '' && $objElement->$key != -1){
					$classes .= ' '.$classPart.$objElement->$key;
				}
			}

			if($objElement->grid_visible != ''){
				$grid_visible = @unserialize($objElement->grid_visible);
				if ($grid_visible === 'b:0;' || $grid_visible !== false) {
					foreach (\Contao\StringUtil::deserialize($objElement->grid_visible) as $key => $value) {
						$classes .= ' ' . $value;
					}
				} else {
					$classes .= ' ' . $objElement->grid_visible;
				}
			}
			if($objElement->grid_hidden != ''){
				$grid_hidden = @unserialize($objElement->grid_hidden);
				if ($grid_hidden === 'b:0;' || $grid_hidden !== false) {
					foreach (\Contao\StringUtil::deserialize($objElement->grid_hidden) as $key => $value) {
						$classes .= ' ' . $value;
					}
				} else {
					$classes .= ' ' . $objElement->grid_hidden;
				}
			}

			if($objElement->col_no_padding || $objElement->col_no_padding != ''){
				if($objElement->col_no_padding == 'padding_no_top_bottom'){
					$classes .= ' col-no-padding-top-bottom';
				}
				if($objElement->col_no_padding == 'padding_no_left_right'){
					$classes .= ' col-no-padding-left-right';
				}
				if($objElement->col_no_padding == 'padding_no_all'){
					$classes .= ' col-no-padding';
				}
			}

			if($objElement->col_centered){
					$classes .= ' col-centered';
			}

			if($objElement->col_newline){
					$classes .= ' col-newline';
			}

			if($classes != ''){
				$arrCss = \Contao\StringUtil::deserialize($objElement->cssID);
				$arrCss[1] .= $classes;
				$newObjElement->cssID = $arrCss;
			}
	    $strBuffer = $newObjElement->generate();
	  }

    return $strBuffer;
	}
}
