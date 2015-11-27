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
 * Add palettes to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['grid_xs'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['grid_xs'],
    'inputType' => 'select',
    'options'   => array(
                    '1'  => '1',
                    '2'  => '2',
                    '3'  => '3',
                    '4'  => '4',
                    '5'  => '5',
                    '6'  => '6',
                    '7'  => '7',
                    '8'  => '8',
                    '9'  => '9',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12'
    ),
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['grid_sm'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['grid_sm'],
    'inputType' => 'select',
    'options'   => array(
                    '1'  => '1',
                    '2'  => '2',
                    '3'  => '3',
                    '4'  => '4',
                    '5'  => '5',
                    '6'  => '6',
                    '7'  => '7',
                    '8'  => '8',
                    '9'  => '9',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12'
    ),
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(32) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['grid_md'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['grid_md'],
    'inputType' => 'select',
    'options'   => array(
                    '1'  => '1',
                    '2'  => '2',
                    '3'  => '3',
                    '4'  => '4',
                    '5'  => '5',
                    '6'  => '6',
                    '7'  => '7',
                    '8'  => '8',
                    '9'  => '9',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12'
    ),
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(32) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['grid_lg'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['grid_lg'],
    'inputType' => 'select',
    'options'   => array(
                    '1'  => '1',
                    '2'  => '2',
                    '3'  => '3',
                    '4'  => '4',
                    '5'  => '5',
                    '6'  => '6',
                    '7'  => '7',
                    '8'  => '8',
                    '9'  => '9',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12'
    ),
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['grid_visible'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['grid_visible'],
    'inputType' => 'select',
    'options'   => array(
                    'visible-xs',
                    'visible-sm',
                    'visible-md',
                    'visible-lg',
    ),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['grid_visible'],
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 500, 'tl_class' => 'w50', 'multiple' => true, 'chosen' => true),
    'sql'       => "varchar(500) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['grid_hidden'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['grid_hidden'],
    'inputType' => 'select',
    'options'   => array(
                    'hidden-xs',
                    'hidden-sm',
                    'hidden-md',
                    'hidden-lg'
    ),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['grid_hidden'],
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 500, 'tl_class' => 'w50', 'multiple' => true, 'chosen' => true),
    'sql'       => "varchar(500) NOT NULL default ''"
);

class tl_content_grid extends tl_content
{
    /**
     * Onload callback for tl_content
     *
     * Add language field to all content palettes
     *
     * @param DataContainer $dc
     */
    public function appendGridComponents(DataContainer $dc = null)
    {
        $dc->loadDataContainer('tl_page');
        $dc->loadDataContainer('tl_content');

        // add grid to all palettes
        foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $key => $value) {
            // if element is '__selector__' OR 'default' OR the palette has already a language key
            if ($key == '__selector__' || $key == 'default' || strpos($value, ',grid(?=\{|,|;|$)') !== false) {
                continue;
            }

            $GLOBALS['TL_DCA']['tl_content']['palettes'][$key] = $value . ';{grid_legend:hide},grid_xs,grid_sm,grid_md,grid_lg,grid_visible,grid_hidden';
        }
    }
}