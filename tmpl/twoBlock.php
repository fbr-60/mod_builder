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
use Joomla\CMS\Uri\Uri;

$modId = 'builder_' . $module->id;

$src = HTMLHelper::_('cleanImageURL', $params->get('adv_media'))->url;
$adv_media = "/" . $src;
$style_media = "url(" . $src . ")";

if ($params->get('backgroundimage')) {
    /** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
    $wa = Factory::getApplication()->getDocument()->getWebAssetManager();
    $wa->addInlineStyle('
#' . $modId . '{background-image: url("' . Uri::root(true) . '/' . HTMLHelper::_('cleanImageURL', $params->get('backgroundimage'))->url . '");}
', ['name' => $modId]);
}


$container = $params->get('wrap_container');

$media_class = $params->get('media_width') . $params->get('media_breakpoint') .$params->get('media_position');
//$media_position = $params->get('media_position') . " uk-visible@s";
// $content_class = " uk-card uk-card-default uk-card-body ";
$content_class = $params->get('') ? $params->get('block-style') : '';

?>
<style>
@media(max-width: 639px) {
	#<?php echo $modId; ?>.full-height .opt {
		background: url(/<?php echo $src; ?>) no-repeat;
		
	}
	.full-height .fp-img {background: none;}
}

</style>
<div id="<?php echo $modId; ?>" class="section full-height">

	<?php if ($container) : ?><div class="<?php echo ($container); ?>"><?php endif; ?>
    <div class="opt"  uk-grid>
			<div class="uk-flex uk-flex-middle uk-width-1-2<?php echo $params->get('media_breakpoint'); ?>">
				<div class="content-wrap <?php echo $content_class; ?>">
					<?php echo $module->content; ?>
					
				</div>
			</div>
			<div class="media-wrap3 uk-visible@s uk-cover-container <?php echo $media_class; ?>" uk-height-viewport> 
				<div class="fp3-img" ><img src="<?php  echo $adv_media; ?>" uk-cover /></div>
			</div>
		</div>
	<?php if ($container) : ?> </div> <?php endif; ?>
		
</div>
