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
	'customarticle',
));

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'customarticle\customarticleCSSHook'			=> 'system/modules/c-customarticles/classes/customarticleCSSHook.php',
	'customarticle\customarticleArticleHook'	=> 'system/modules/c-customarticles/classes/customarticleArticleHook.php',
	'customarticle\customarticleContentHook'	=> 'system/modules/c-customarticles/classes/customarticleContentHook.php',
	'customarticle\customarticleLayoutHook'		=> 'system/modules/c-customarticles/classes/customarticleLayoutHook.php',
));

/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_customarticle' => 'system/modules/c-customarticles/templates',
));