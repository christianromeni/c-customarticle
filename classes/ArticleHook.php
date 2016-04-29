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

class ArticleHook extends \System {
	/**
	* getArticle hook
	*
	* insert custom template when
	* getArticle hook is called
	*
	*/
	public function insertCustomTemplate($tpl, $data, $article)
	{
		global $objPage;
		$layoutID = $objPage->layout;
		$objLayout = \LayoutModel::findByID($layoutID);

		if($objLayout->activateCArticles){
			$template = new \FrontendTemplate('mod_customarticle');
			$count = count($tpl->elements);

			$containertype = 'container';

			$article_color						= deserialize($tpl->article_color);
			$article_width						= deserialize($tpl->article_width);
			$article_minheight				= deserialize($tpl->article_minheight);
			$article_image						= $tpl->article_image;
			$article_image_position		= $tpl->article_image_position;
			$article_image_repeat			= $tpl->article_image_repeat;
			$article_image_cover			= $tpl->article_image_cover;
			$article_image_fixed			= $tpl->article_image_fixed;

			$inner_article_width			= deserialize($tpl->inner_article_width);
			$inner_article_space			= $tpl->inner_article_space;
			$inner_article_overflow		= $tpl->inner_article_overflow;
			$inner_article_color			= deserialize($tpl->inner_article_color);
			$inner_article_float			= $tpl->inner_article_float;
			$inner_article_minheight	= deserialize($tpl->inner_article_minheight);

			if($tpl->article_visible != ''){
				$tmpclasses = $article->cssID;
				$article_visible = @unserialize($tpl->article_visible);
				if ($article_visible === 'b:0;' || $article_visible !== false) {
					foreach ($deserialize($tpl->article_hidden) as $key => $value) {
						$tmpclasses[1] .= ' ' . $value;
					}
				} else {
					$tmpclasses[1] .= ' ' . $tpl->article_visible;
				}
				$article->cssID = $tmpclasses;
			}
			if($tpl->article_hidden != ''){
				$tmpclasses = $article->cssID;
				$article_hidden = @unserialize($tpl->article_hidden);
				if ($article_hidden === 'b:0;' || $article_hidden !== false) {
					foreach (deserialize($tpl->article_hidden) as $key => $value) {
						$tmpclasses[1] .= ' ' . $value;
					}
				} else {
					$tmpclasses[1] .= ' ' . $tpl->article_hidden;
				}
				$article->cssID = $tmpclasses;
			}

			$customstyle =	".mod_article.customarticle_$tpl->id { ";
				if(isset($article_width['value']) && $article_width['value'] != ''){
					if($article_width['value'] == 100  && $article_width['unit'] == "%") {
						$containertype = 'container-fluid';
					}
					else {
						$containertype = 'container';
					}
					$customstyle .= "width:" . $article_width['value'] . $article_width['unit'] . " !important;";
					$customstyle .= "max-width:" . $article_width['value'] . $article_width['unit'] . " !important;";
				}
				if(isset($article_minheight['value']) && $article_minheight['value'] != ''){
					$customstyle .= "min-height:" . $article_minheight['value'] . $article_minheight['unit'] . " !important;";
				}
				if(isset($article_color[0]) && $article_color[0] != ''){
					$customstyle .= "background-color:" . $this->cHex2rgba($article_color[0],$article_color[1]) . " !important;";
				}
				if(isset($article_image) && $article_image != ''){
					$customstyle .= "background-image:url('" . $article_image . "') !important;";
				}
				if(isset($article_image_repeat) && $article_image_repeat != ''){
					$customstyle .= "background-repeat:" . $article_image_repeat . " !important;";
				}
				if(isset($article_image_position) && $article_image_position != ''){
					$customstyle .= "background-position:" . $article_image_position . " !important;";
				}
				if($article_image_cover) {
					$customstyle .= "
						-webkit-background-size: cover;
						-moz-background-size: cover;
						-o-background-size: cover;
						background-size: cover;
						filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=$img-uri, sizingMethod='scale');
						-ms-filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=$img-uri, sizingMethod='scale') !important;";
					if($article_image_fixed){
						$customstyle .= "background-attachment: fixed";
					}
					else {
						$customstyle .= "background-attachment: initial";
					}
				}

			$customstyle .= "	}";
			$customstyle .=	".mod_article.customarticle_$tpl->id .outer { ";
				if(isset($inner_article_color[0]) && $inner_article_color[0] != ''){
					$customstyle .= "background-color:" . $this->cHex2rgba($inner_article_color[0],$inner_article_color[1]) . " !important;";
				}
				if(isset($inner_article_width['value']) && $inner_article_width['value'] != ''){
					$customstyle .= "width:" . $inner_article_width['value'] . $inner_article_width['unit'] . " !important;";
					$customstyle .= "max-width:" . $inner_article_width['value'] . $inner_article_width['unit'] . " !important;";
				}
				if(isset($inner_article_height['value']) && $inner_article_height['value'] != ''){
					$customstyle .= "min-height:" . $inner_article_height['value'] . $inner_article_height['unit'] . " !important;";
				}
			$customstyle .= "	}";
			$customstyle .=	".mod_article.customarticle_$tpl->id .inner { ";
				if(isset($inner_article_space) && $inner_article_space != ''){
					if($inner_article_space == 'top_spaceing'){
						$customstyle .= "padding-bottom:0 !important;";
					}
					if($inner_article_space == 'bottom_spaceing'){
						$customstyle .= "padding-top:0 !important;";
					}
					if($inner_article_space == 'no_spaceing'){
						$customstyle .= "padding-bottom:0 !important;";
						$customstyle .= "padding-top:0 !important;";
					}
				}
				if(isset($inner_article_overflow) && $inner_article_overflow != ''){
					if ($inner_article_overflow == 'overflow_hidden') {
						$customstyle .= "overflow:hidden !important;";
					}
					if ($inner_article_overflow == 'overflow_visible') {
						$customstyle .= "overflow:visible !important;";
					}
				}
			$customstyle .= "	}";
			$tpl->customstyle = $customstyle;
			$tpl->gridcount = $count;
			$tpl->containertype = $containertype;
			$template->setData($tpl->getData());
			$article->Template = $template;
		}
	}

	/**
	* loadDataContainer hook
	*
	* Add onload_callback definition when loadDataContainer hook is
	* called to define onload_callback as late as possible
	*
	* @param   String  $strName
	*/
	public function appendGridComponentsCallback($strName)
	{
		if ($strName == 'tl_content') {
			$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('tl_content_grid', 'appendGridComponents');
		}
	}

	private function cHex2rgba($color, $opacity = false) {
		$default = 'rgb(0,0,0)';
		if(empty($color))
			return $default;
			if ($color[0] == '#' ) {
				$color = substr( $color, 1 );
			}
			if (strlen($color) == 6) {
				$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
			} elseif ( strlen( $color ) == 3 ) {
				$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
			} else {
				return $default;
			}
			$rgb =  array_map('hexdec', $hex);
			if($opacity){
				$opacity = $opacity/100;
				if(abs($opacity) > 1)
					$opacity = 1.0;
					$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
				} else {
				$output = 'rgb('.implode(",",$rgb).')';
			}
		return $output;
	}

}
