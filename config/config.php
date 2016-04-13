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

if (TL_MODE == 'BE') {
	$GLOBALS['TL_CSS'][] = 'system/modules/c-customarticles/assets/backend.css';
}

/**
* Hooks
*/
if (TL_MODE == 'BE') {
	$GLOBALS['TL_HOOKS']['loadDataContainer'][]	= array('customarticles\ArticleHook', 'appendGridComponentsCallback');
}

if(TL_MODE == 'FE'){
	$GLOBALS['TL_HOOKS']['getPageLayout'][]			= array('customarticles\CSSHook', 'addCSStoLayout');
	$GLOBALS['TL_HOOKS']['compileArticle'][]		= array('customarticles\ArticleHook', 'insertCustomTemplate');
	$GLOBALS['TL_HOOKS']['getContentElement'][]	= array('customarticles\ContentHook', 'insertCustomGrid');
}