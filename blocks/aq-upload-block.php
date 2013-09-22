<?php
/** A simple text block **/
class AQ_Upload_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Image',
			'size' => 'span6',
		);
		
		//create the block
		parent::__construct('AQ_Upload_Block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'text' => '',
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
			<label for="<?php echo $this->get_field_id('image') ?>">
				Image
				<?php echo aq_field_upload('image', $block_id, $image, $size = 'full') ?>
			</label>
		</p>
		
		<?php
	}
	
	function block($instance) {
		extract($instance);
		
		if($title) echo '<h4 class="aq-block-title">'.strip_tags($title).'</h4>';
		?>
			<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"/>
		<?php
	}
	
}