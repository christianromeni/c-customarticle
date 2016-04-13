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


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'customarticles',
));

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'customarticles\SCSSGenerator'	=> 'system/modules/c-customarticles/classes/SCSSGenerator.php',
	'customarticles\CSSHook'				=> 'system/modules/c-customarticles/classes/CSSHook.php',
	'customarticles\ArticleHook'		=> 'system/modules/c-customarticles/classes/ArticleHook.php',
	'customarticles\ContentHook'		=> 'system/modules/c-customarticles/classes/ContentHook.php',
));

/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_customarticle' => 'system/modules/c-customarticles/templates',
));