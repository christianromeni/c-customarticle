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

class customarticleCSSHook {
	/**
	* getArticle hook
	*
	* insert custom template when
	* getArticle hook is called
	*
	*/
	public function addCSStoLayout($objPage, $objLayout, $objPty)
	{
		if($objLayout->activateCArticles) {
			$GLOBALS['TL_CSS'][] = 'system/modules/c-customarticles/assets/styles.scss|static';
		}
	}
}