<?php

/**
 * @file
 * Display Suite 1 column template with layout wrapper.
 */
?>
<<?php print $layout_wrapper; print $layout_attributes; ?> class="ds-1col <?php print $classes;?> clearfix">

  <?php if (isset($title_suffix['contextual_links'])): ?>
  <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>
  <div class="art-box art-post">
    <div class="art-box-body art-post-body">
			<div class="art-post-inner art-article">
				<h2 class="art-postheader"<?php print $title_attributes; ?>><?php print render($title_prefix); ?>
					<?php echo art_node_title_output($title, $node_url, $page); ?>
					<?php print render($title_suffix); ?>
				</h2>
				<?php if ($display_submitted): ?>
				<div class="art-postheadericons art-metadata-icons">
					<?php 
						if ($published_at) {
							echo art_submitted_worker(format_date($timestamp.$published_at), $name); 
						} else {
							echo art_submitted_worker($date, $name); 
						}
					?>
				</div>
				<?php endif; ?>
				<div class="art-postcontent">

					<<?php print $ds_content_wrapper ?> class="<?php print trim($ds_content_classes); ?>">
						<?php print $ds_content; ?>
					</<?php print $ds_content_wrapper ?>>
				</div>
		  </div>
		</div>
	</div>

</<?php print $layout_wrapper ?>>

<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>