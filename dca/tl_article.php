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
 * Add palettes to tl_article
 */
$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = str_replace('cssID;','cssID;{Artikel},article_visible,article_hidden,article_width,article_minheight,article_color,article_image,article_image_repeat,article_image_position,article_image_cover,article_image_fixed;{Artikel Inhalt},inner_article_width,inner_article_minheight,inner_article_position,inner_article_space,inner_article_overflow,inner_article_color;', $GLOBALS['TL_DCA']['tl_article']['palettes']['default']);

/**
 * Add fields to tl_article
 */
$GLOBALS['TL_DCA']['tl_article']['fields']['article_width'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['article_width'],
    'inputType' => 'inputUnit',
    'options'   => $GLOBALS['TL_CSS_UNITS'],
    'eval'      => array('includeBlankOption'=>true, 'rgxp'=>'digit_auto_inherit', 'maxlength' => 20, 'tl_class'=>'w50'),
    'sql'       => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['article_color'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['article_color'],
    'inputType' => 'text',
    'eval'      => array('maxlength'=>6, 'multiple'=>true, 'size'=>2, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
    'sql'       => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['article_image'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['article_image'],
    'inputType' => 'text',
    'eval'      => array('filesOnly'=>true, 'extensions'=>Config::get('validImageTypes'), 'fieldType'=>'radio', 'tl_class'=>'w50 wizard'),
    'wizard'    => array (
        array('tl_customarticle', 'filePicker')
    ),
    'sql'       => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['article_image_repeat'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['article_image_repeat'],
    'inputType' => 'select',
    'options'   => array('repeat', 'repeat-x', 'repeat-y', 'no-repeat'),
    'eval'      => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
    'sql'       => "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['article_image_position'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_article']['article_image_position'],
    'inputType'               => 'select',
    'options'                 => array('left top', 'left center', 'left bottom', 'center top', 'center center', 'center bottom', 'right top', 'right center', 'right bottom'),
    'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['article_image_cover'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_article']['article_image_cover'],
    'inputType'               => 'checkbox',
    'eval'                    => array('tl_class'=>'w50 m12'),
    'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['article_image_fixed'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_article']['article_image_fixed'],
    'inputType'               => 'checkbox',
    'eval'                    => array('tl_class'=>'w50 m12'),
    'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['article_minheight'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_article']['article_minheight'],
    'inputType'               => 'inputUnit',
    'options'                 => $GLOBALS['TL_CSS_UNITS'],
    'eval'                    => array('includeBlankOption'=>true, 'rgxp'=>'digit_inherit', 'maxlength' => 20, 'tl_class'=>'w50'),
    'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['inner_article_width'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_article']['inner_article_width'],
    'inputType'               => 'inputUnit',
    'options'                 => $GLOBALS['TL_CSS_UNITS'],
    'eval'                    => array('includeBlankOption'=>true, 'rgxp'=>'digit_auto_inherit', 'maxlength' => 20, 'tl_class'=>'w50'),
    'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['inner_article_minheight'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_article']['inner_article_minheight'],
    'inputType'               => 'inputUnit',
    'options'                 => $GLOBALS['TL_CSS_UNITS'],
    'eval'                    => array('includeBlankOption'=>true, 'rgxp'=>'digit_inherit', 'maxlength' => 20, 'tl_class'=>'w50'),
    'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['inner_article_color'] = array
    (
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['inner_article_color'],
    'inputType' => 'text',
    'eval'      => array('maxlength'=>6, 'multiple'=>true, 'size'=>2, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
    'sql'       => "varchar(64) NOT NULL default ''"
);

// $GLOBALS['TL_DCA']['tl_article']['fields']['inner_article_position'] = array
//     (
//     'label' => &$GLOBALS['TL_LANG']['tl_article']['inner_article_position'],
//     'exclude' => true,
//     'search' => false,
//     'inputType' => 'select',
//     'options' => array(
//         'left_position' => 'Linksbündig',
//         'center_position' => 'Zentriert',
//         'right_position' => 'Rechtsbündig'
//     ),
//     'eval' => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'),
//     'sql' => "varchar(32) NOT NULL default ''"
// );

$GLOBALS['TL_DCA']['tl_article']['fields']['inner_article_space'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_article']['inner_article_space'],
    'exclude' => true,
    'search' => false,
    'default' => 'top_bottom_spaceing',
    'inputType' => 'select',
    'options' => array(
        'top_bottom_spaceing' => 'Abstand oben und unten',
        'top_spaceing' => 'Abstand nur oben',
        'bottom_spaceing' => 'Abstand nur unten',
        'no_spaceing' => 'Keinen Abstand'
    ),
    'eval' => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'),
    'sql' => "varchar(32) NOT NULL default 'top_bottom_spaceing'"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['inner_article_overflow'] = array
    (
    'label' => &$GLOBALS['TL_LANG']['tl_article']['inner_article_overflow'],
    'exclude' => true,
    'search' => false,
    'default' => 'overflow_hidden',
    'inputType' => 'select',
    'options' => array(
        'overflow_hidden' => 'Overflow verstecken',
        'overflow_visible' => 'Overflow anzeigen'
    ),
    'eval' => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'),
    'sql' => "varchar(32) NOT NULL default 'overflow_hidden'"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['article_visible'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['article_visible'],
    'inputType' => 'select',
    'options'   => array(
                    'visible-xs',
                    'visible-sm',
                    'visible-md',
                    'visible-lg',
    ),
    'reference' => &$GLOBALS['TL_LANG']['tl_article']['article_visible'],
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 500, 'tl_class' => 'w50', 'multiple' => true, 'chosen' => true),
    'sql'       => "varchar(500) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['article_hidden'] = array (
    'label'     => &$GLOBALS['TL_LANG']['tl_article']['article_hidden'],
    'inputType' => 'select',
    'options'   => array(
                    'hidden-xs',
                    'hidden-sm',
                    'hidden-md',
                    'hidden-lg'
    ),
    'reference' => &$GLOBALS['TL_LANG']['tl_article']['article_hidden'],
    'eval'      => array('includeBlankOption'=>true, 'mandatory' => false, 'maxlength' => 500, 'tl_class' => 'w50', 'multiple' => true, 'chosen' => true),
    'sql'       => "varchar(500) NOT NULL default ''"
);


class tl_customarticle extends Backend {
    /**
     * Return the file picker wizard
     *
     * @param DataContainer $dc
     *
     * @return string
     */
    public function filePicker(DataContainer $dc)
    {
        return ' <a href="contao/file.php?do='.Input::get('do').'&amp;table='.$dc->table.'&amp;field='.$dc->field.'&amp;value='.$dc->value.'" title="'.specialchars(str_replace("'", "\\'", $GLOBALS['TL_LANG']['MSC']['filepicker'])).'" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':768,\'title\':\''.specialchars($GLOBALS['TL_LANG']['MOD']['files'][0]).'\',\'url\':this.href,\'id\':\''.$dc->field.'\',\'tag\':\'ctrl_'.$dc->field . ((Input::get('act') == 'editAll') ? '_' . $dc->id : '').'\',\'self\':this});return false">' . Image::getHtml('pickfile.gif', $GLOBALS['TL_LANG']['MSC']['filepicker'], 'style="vertical-align:top;cursor:pointer"') . '</a>';
    }
}




