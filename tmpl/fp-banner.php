<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Uri\Uri;

$modContainer  = " uk-container"; // настройка
$modId =  $module->id;
$suffix = $params->get('moduleclass_sfx', '');
/**/
if ($params->get('backgroundimage')) {
    $url = HTMLHelper::_('cleanImageURL', $params->get('backgroundimage'))->url; 
    //$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
    //$wa->addInlineStyle('
#' . $modId . '{background-image: url("' . Uri::root(true) . '/' . HTMLHelper::_('cleanImageURL', $params->get('backgroundimage'))->url . '");}
//', ['name' => $modId]);
}
?>
<style>
.demo-33 {
	min-height: calc(100vh - 80px);
	background: #0c0c0c;	
	filter: brightness(0.8) sepia(0.8)
}
@media(min-width: 1200px) {
		.demo-33 {
		//background: #0c0c0c url(/images/banner-full-4.webp);
		background-size: auto 100%;		
		background-repeat: no-repeat;
		background-position: center 0;
		background-position: -80px top;
		
		justify-content: center;
	
	}
}
@media(min-width: 1200px) {
	.demo-33 {
		background-position: -110px 0px;	
	}
}



#sect__<?php echo $modId; ?> {
	overflow-y: hidden;
	color: #fff;
}

#sect__<?php echo $modId; ?> h1 {color: #f2dcb2;}
#sect__<?php echo $modId; ?>	.right_p33 > * {
	margin-top: 50px;
}
	
@media(min-width: 640px) {
	#sect__<?php echo $modId; ?>	.right_p33 > * {
		margin-top: 160px;
		width: 500px;
		background: rgba(0,0,0, .5);
	}
}
@media(min-width: 1200px) {
	#sect__<?php echo $modId; ?> {
		background-image: url(<?php echo $url; ?>);
		background-color: #0c0c0c;
		background-repeat: no-reapeat;
		overflow-y: auto;
	}
	.right_p33 > * {
		width: 500px;
		padding: 40px;
		color: #fff;
		right: 140px;
		background: transparent;
	}
}
</style>
<?php


// field Title
// field SubTitle
// editor
// background - standard
// advanced bg/img - creat!
// breakpoint for img @l - creat!

/*
if ($params->get('modcontainer', 1)== 1) {
	$modContainer  = " uk-container";
} elseif ($params->get('modcontainer', 1)== 900) {
	$modContainer  = "uk-container-small uk-margin-auto";	
} else {
	$modContainer  = "";
}
*/
$breakp = $params->get("media_breakpoint");
$i = 0;
$advimg = '';
$mob_img = HTMLHelper::_('cleanImageURL', $params->get('adv_media'))->url;
?>	
	<div id="<?php echo "sect__" . $modId; ?>" class="section banner uk-width-1-1 <?php echo $suffix; ?>">
		<div class="intro uk-width-1-1<?php echo $modContainer; ?>">
			<?php if($mob_img) : ?>
			<div><img class="uk-hidden<?php echo $breakp; ?>" src="<?php echo $mob_img; ?>" alt="bg img"></div>
			<?php endif; ?>
			<div class="right_p33">
				<div class="uk-position-top-right uk-padding" 
         uk-toggle="cls: uk-position-top-right uk-position-center; mode: media; media: @l">

					<h1 class="uk-h1 uk-text-center"><?php echo $module->title; ?></h1>
					<?php echo $module->content; ?>
				</div>
			</div>
		</div>
	</div>	



    


