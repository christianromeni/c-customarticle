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
	'customarticle\customarticleHook' => 'system/modules/c-customarticles/classes/customarticleHook.php',
	'customarticle\customarticleGridHook' => 'system/modules/c-customarticles/classes/customarticleGridHook.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_customarticle' => 'system/modules/c-customarticles/templates',
));
