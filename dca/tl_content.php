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
    'options'   => range(1, 12),
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(2) NOT NULL default '12'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['grid_sm'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['grid_sm'],
    'inputType' => 'select',
    'options'   => range(1, 12),
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(2) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['grid_md'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['grid_md'],
    'inputType' => 'select',
    'options'   => range(1, 12),
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(2) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['grid_lg'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['grid_lg'],
    'inputType' => 'select',
    'options'   => range(1, 12),
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(2) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['pull_xs'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['pull_xs'],
    'inputType' => 'select',
    'options'   => range(1, 12),
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(2) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['pull_sm'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['pull_sm'],
    'inputType' => 'select',
    'options'   => range(1, 12),
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(2) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['pull_md'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['pull_md'],
    'inputType' => 'select',
    'options'   => range(1, 12),
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(2) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['pull_lg'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['pull_lg'],
    'inputType' => 'select',
    'options'   => range(1, 12),
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(2) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['push_xs'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['push_xs'],
    'inputType' => 'select',
    'options'   => range(1, 12),
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(2) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['push_sm'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['push_sm'],
    'inputType' => 'select',
    'options'   => range(1, 12),
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(2) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['push_md'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['push_md'],
    'inputType' => 'select',
    'options'   => range(1, 12),
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(2) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['push_lg'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['push_lg'],
    'inputType' => 'select',
    'options'   => range(1, 12),
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(2) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['offset_xs'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['offset_xs'],
    'inputType' => 'select',
    'options'   => range(-1, 12),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['offset'],
    'default'   => -1,
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(2) NOT NULL default '-1'"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['offset_sm'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['offset_sm'],
    'inputType' => 'select',
    'options'   => range(-1, 12),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['offset'],
    'default'   => -1,
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(2) NOT NULL default '-1'"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['offset_md'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['offset_md'],
    'inputType' => 'select',
    'options'   => range(-1, 12),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['offset'],
    'default'   => -1,
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(2) NOT NULL default '-1'"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['offset_lg'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['offset_lg'],
    'inputType' => 'select',
    'options'   => range(-1, 12),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['offset'],
    'default'   => -1,
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w25'),
    'sql'       => "varchar(2) NOT NULL default '-1'"
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

$GLOBALS['TL_DCA']['tl_content']['fields']['col_no_padding'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['col_no_padding'],
    'inputType' => 'checkbox',
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['col_no_padding'],
    'eval'      => array('includeBlankOption'=>false, 'mandatory' => false, 'maxlength' => 500, 'tl_class' => 'w25 m12'),
    'sql'       => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['col_centered'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['col_centered'],
    'inputType' => 'checkbox',
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['col_centered'],
    'eval'      => array('includeBlankOption'=>false, 'mandatory' => false, 'maxlength' => 500, 'tl_class' => 'w25 m12'),
    'sql'       => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['col_newline'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['col_newline'],
    'inputType' => 'checkbox',
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['col_newline'],
    'eval'      => array('includeBlankOption'=>false, 'mandatory' => false, 'maxlength' => 500, 'tl_class' => 'w25 m12'),
    'sql'       => "char(1) NOT NULL default ''"
);



// Anpassung der Bild Palette
$GLOBALS['TL_DCA']['tl_content']['palettes']['image'] = str_replace
(
    'caption;',
    'caption,lightbox;',
    $GLOBALS['TL_DCA']['tl_content']['palettes']['image']
);

// Hinzufügen der Feld-Konfiguration
$GLOBALS['TL_DCA']['tl_content']['fields']['lightbox'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['lightbox'],
    'inputType' => 'text',
    'eval'      => array('tl_class'=>'w50'),
    'sql'       => "varchar(25) NOT NULL default ''"
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

            $GLOBALS['TL_DCA']['tl_content']['palettes'][$key] = $value . ';{grid_legend:hide},grid_xs,grid_sm,grid_md,grid_lg,grid_visible,grid_hidden,col_no_padding,col_centered,col_newline;{grid_order_legend:hide},pull_xs,pull_sm,pull_md,pull_lg,push_xs,push_sm,push_md,push_lg,offset_xs,offset_sm,offset_md,offset_lg';
        }
    }
}