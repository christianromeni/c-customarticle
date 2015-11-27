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

if (TL_MODE == 'FE') {
    $GLOBALS['TL_CSS'][] = 'system/modules/c-customarticles/assets/styles.scss|static';
}

if (TL_MODE == 'BE') {
    $GLOBALS['TL_CSS'][] = 'system/modules/c-customarticles/assets/backend.css';
}

/**
* Hooks
*/
$GLOBALS['TL_HOOKS']['loadDataContainer'][]	= array('customarticle\customarticleHook', 'appendGridComponentsCallback');
$GLOBALS['TL_HOOKS']['compileArticle'][]		= array('customarticle\customarticleHook', 'insertCustomTemplate');
$GLOBALS['TL_HOOKS']['getContentElement'][] = array('customarticle\customarticleGridHook', 'insertCustomGrid');
