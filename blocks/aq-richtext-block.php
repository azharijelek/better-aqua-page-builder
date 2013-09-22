<?php
/** A simple rich textarea block **/
class AQ_Richtext_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Rich Text',
			'size' => 'span3',
		);
		
		//create the block
		parent::__construct('aq_richtext_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'text' => ''
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title (optional)
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('text') ?>">
				Content
				<?php /*
				$args = array (
				   // 'tinymce' => false,
				    'quicktags' => true,
				);
				wp_editor( htmlspecialchars_decode($text), 'aq_blocks['.$block_id.'][text]', $args );
				*/?>
				<div class="editor_media_buttons hide-if-no-js <?php echo $media_buttons_extra_class; ?>">
					<?php do_action('media_buttons', $text); ?>
				</div>
				<div class="clear"></div>
				<br/>
				<?php echo aq_field_richtext('text', $block_id, $text, $size = 'full') ?>
			</label>
		</p>
		
		<?php
	}
	
	function block($instance) {
		extract($instance);
		
		if($title) echo '<h4 class="aq-block-title">'.strip_tags($title).'</h4>';
		echo wpautop(do_shortcode(htmlspecialchars_decode($text)));
	}
	
}