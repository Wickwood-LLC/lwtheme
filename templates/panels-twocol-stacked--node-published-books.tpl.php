<?php
/**
 * @file
 * Template for a 2 column panel layout.
 *
 * This template provides a two column panel display layout, with
 * additional areas for the top and the bottom.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['top']: Content in the top row.
 *   - $content['left']: Content in the left column.
 *   - $content['right']: Content in the right column.
 *   - $content['bottom']: Content in the bottom row.
 */

/* Artisteer Code */
$vars = get_defined_vars();
$view = get_artx_drupal_view();

$message = $view->get_incorrect_version_message();
if (!empty($message)) {
	print $message;
	die();
}
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>" <?php print $attributes; ?>>
	<div class="art-box art-post">
    <div class="art-box-body art-post-body">
			<div class="art-post-inner art-article">
				<div class="art-postcontent">
					<div class="panel-2col-stacked clearfix panel-display" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
						<?php if ($content['top']): ?>
						<div class="panel-col-top panel-panel">
							<div class="inside"><?php print $content['top']; ?></div>
						</div>
						<?php endif; ?>
					
						<div class="center-wrapper">
							<div class="panel-col-first panel-panel">
								<div class="inside"><?php print $content['left']; ?></div>
							</div>
							<div class="panel-col-last panel-panel">
								<div class="inside"><?php print $content['right']; ?></div>
							</div>
						</div>
					
						<?php if ($content['bottom']): ?>
						<div class="panel-col-bottom panel-panel">
							<div class="inside"><?php print $content['bottom']; ?></div>
						</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="cleared"></div>
				<?php ob_start(); ?>
				<?php $access_links = true;
				if (isset($content['links']['#access'])) {
					$access_links = $content['links']['#access'];
				}
				if ($access_links && (isset($content['links']) || isset($content['comments']))):
				$output = art_links_woker_D7($content);
				if (!empty($output)):	?>
				<div class="art-postfootericons art-metadata-icons">
					<?php echo $output; ?>
				</div>
				<?php endif; endif; ?>
				<?php $metadataContent = ob_get_clean(); ?>
				<?php if (trim($metadataContent) != ''): ?>
				<div class="art-postmetadatafooter">
					<?php echo $metadataContent; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="cleared"></div>
		</div>
	</div>	
	<?php
		$view->print_comment_node($vars);
	?>
</div>