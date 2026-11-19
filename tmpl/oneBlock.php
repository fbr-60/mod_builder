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

if ($params->get('adv_media')) {
		$medialink =  Uri::root(true) . '/' . HTMLHelper::_('cleanImageURL', $params->get('adv_media'))->url;
		$mediastyle = '#' . $modId . ' .media-wrap {background-image: url(' . $medialink . ')}';
    $wa = Factory::getApplication()->getDocument()->getWebAssetManager();
		$wa->addInlineStyle($mediastyle , ['name' => $modId]);    
}
$newintortext = str_replace('<ul>', '<ul class="sq_red_24">', $module->content);
$container = $params->get('wrap_container', 0);

$media_class = $params->get('media_width') . $params->get('media_breakpoint') .$params->get('media_position');
// $content_class = " uk-card uk-card-default uk-card-body uk-card-hover ";
$content_class = $params->get('block_style'); // ? $params->get('block_style') : '';
$flex_class = " uk-flex uk-flex-middle uk-width-expand ";
?>
<style>
@media(max-width: 639px) {
	#<?php echo $modId; ?> .fp-overflow {
		background: url(<?php echo $medialink; ?>) no-repeat;
		background-size: auto 100%;
	}
}
.fp3-img img {height: calc(100vh - 80px);}

</style>
<div id="<?php echo $modId; ?>" class="section full-height sect_top">

	<?php if ($container) : ?><div class="<?php echo ($container); ?>"><?php endif; ?>
	
	<div class="mainbox uk-background-cover uk-grid-small" uk-grid>
		
		<div class="uk-flex uk-flex-middle uk-width-expand<?php echo $params->get('media_breakpoint'); ?>">
			<div class="content-wrap <?php echo $content_class; ?>">
				<?php echo $newintortext; ?>
			</div>
		</div>
		
		<div class="media-wrap uk-width-expand uk-inline uk-visible@s <?php echo $media_class; ?>" uk-height-viewport>
			<div class="uk-h2 uk-text-center uk-position-large uk-position-center uk-light" uk-scrollspy="cls: uk-animation-fade; delay: 1000"><?php echo $params->get('adv_box'); ?></div>
		</div>
		
	</div>
	
	<?php if ($container) : ?> </div> <?php endif; ?>
		
</div>
