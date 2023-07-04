<?php
class Woo_Card extends \Elementor\Widget_Base {

	public function get_name() {
		return 'woo_card';
	}

	public function get_title() {
		return esc_html__( 'Woo Card', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-woocommerce';
	}

	public function get_categories() {
		return [ 'monir-team-cat' ];
	}

	public function get_keywords() {
		return [ 'woo', 'card' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Carousel Section or Card', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'woo_monir_card_title',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'textdomain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'woo_monir_card_rating',
			[
				'label' => esc_html__( 'Type Rating Number', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 5,
				'step' => 1,
				'default' => 1,
			]
		);

		$repeater->add_control(
			'woo_image_url',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'woo_monir_card_btn_text_1',
			[
				'label' => esc_html__( 'Button One Text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Learn More' , 'textdomain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'woo_monir_card_btn_url_1',
			[
				'label' => esc_html__( 'Button One Link', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'woo_monir_card_btn_text_2',
			[
				'label' => esc_html__( 'Button Two Text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Learn More' , 'textdomain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'woo_monir_card_btn_url_2',
			[
				'label' => esc_html__( 'Button Two Link', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_color',
			[
				'label' => esc_html__( 'Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
				],
			]
		);

		$this->add_control(
			'woo_monir_card_reapter',
			[
				'label' => esc_html__( 'Repeater List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'woo_monir_card_title' => esc_html__( 'Title #1', 'textdomain' ),
						'woo_monir_card_rating' => 1,
						'woo_monir_card_btn_text_1' => esc_html__( 'Button One', 'textdomain' ),
						'woo_monir_card_btn_text_2' => esc_html__( 'Button Two', 'textdomain' ),
					],
				],
				'title_field' => '{{{ woo_monir_card_title }}}',
			]
		);

		$this->add_control(
			'woo_monir_active_carousel',
			[
				'label' => esc_html__( 'Want To Show Carousel?', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Enable', 'textdomain' ),
				'label_off' => esc_html__( 'Disable', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->end_controls_section();

		// Content Tab End


		// Style Tab Start

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Card Border', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'woo-card-border',
				'selector' => '{{WRAPPER}} .monir-woo-card',
			]
		);
		$this->add_control(
			'woo-card-padding',
			[
				'label' => esc_html__( 'Woo Card Padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .monir-woo-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'woo-card-button-padding',
			[
				'label' => esc_html__( 'Woo Card Button', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .monir-woo-card .woo-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		// Style Tab End

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
       
        $woo_monir_active_carousel = $settings['woo_monir_active_carousel'];
        $woo_monir_card_reapter = $settings['woo_monir_card_reapter'];
		if($woo_monir_active_carousel == 'yes'){
			?>
			<script>
				jQuery(document).ready(function($) {
					$('.monir-woo-card-wraper').slick({
						dots: true,
						arrows: false,
						infinite: true,
						speed: 300,
						slidesToShow: 4,
						centerMode: true,
						centerPadding: '50px',
						autoplay: true,
  						autoplaySpeed: 2000,
						draggable:true,
						focusOnSelect:true,
						responsive: [
						{
						breakpoint: 767,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
							draggable:false,
							
						}
						},
						{
						breakpoint: 480,
						settings: {
							slidesToShow: 1	,
							slidesToScroll: 1,
							draggable:false,
						}
						}
					]
					});
				});
			</script>
			<style>
				/* Slick Slider */
					.monir-woo-card-wraper .monir-woo-card.slick-slide {
						width: 230px !important;
						text-align: center;
						display: flex;
						margin-right:30px;
						margin-bottom: 30px;
					}
					.monir-woo-card-wraper .monir-woo-card.slick-slide:last-child {
						margin-right:0px;
					}
					.monir-woo-card-wraper ul.slick-dots {
						display: flex;
						list-style: none;
					}

					.monir-woo-card-wraper ul.slick-dots button {
						display: none;
					}

					.monir-woo-card-wraper ul.slick-dots li {
						height: 5px;
						background: red !important;
						width: 100%;
						cursor: pointer;
					}

					.monir-woo-card-wraper ul.slick-dots li.slick-active {
						height: 10px;
						background: green !important;
						position:relative;
						top:-2px;
					}
					.monir-woo-card-wraper .slick-list {
						overflow: inherit;
					}
			</style>
			<?php
		}
		?>


		<div class="monir-woo-card-wraper">
			<?php 

				if($woo_monir_card_reapter){
					foreach ($woo_monir_card_reapter as $single_woo_card) {		
						$woo_monir_card_title = 	$single_woo_card['woo_monir_card_title'];
						$woo_monir_card_rating = 	$single_woo_card['woo_monir_card_rating'];
						$woo_image_url = 	$single_woo_card['woo_image_url']['url'];
						$woo_monir_card_btn_text_1 = 	$single_woo_card['woo_monir_card_btn_text_1'];
						$woo_monir_card_btn_url_1 = 	$single_woo_card['woo_monir_card_btn_url_1'];
						$woo_monir_card_btn_text_2 = 	$single_woo_card['woo_monir_card_btn_text_2'];
						$woo_monir_card_btn_url_2 = 	$single_woo_card['woo_monir_card_btn_url_2'];
						
					?>

						<div class="monir-woo-card">
							<?php if($woo_monir_card_title){
								?>
									<h3><?php echo $woo_monir_card_title ?></h3>
								<?php

								if($woo_monir_card_rating){
									?>
									<div class="monir-woo-card-star-icon">
										<?php
											for($raing_check = 1; $raing_check <= $woo_monir_card_rating ; $raing_check++){
												?>
													<i class="eicon-star"></i>
												<?php
											}
											for($raing_check=5-$woo_monir_card_rating; $raing_check>=1; $raing_check--){
												?>
													<i class="eicon-star-o"></i>
												<?php
											}
										?>
										
									</div>
									<?php
								}
								if($woo_image_url){
									?>
									<img class="monir-woo-card-image" src="<?php echo esc_attr( $woo_image_url ); ?>" alt="">
									<?php
								}

								if($woo_monir_card_btn_text_1 || $woo_monir_card_btn_text_2){
									?>
									<div class="woo-button">
										<?php 
											if($woo_monir_card_btn_text_1 && $woo_monir_card_btn_url_1){
												?>
													<a href="<?php echo $woo_monir_card_btn_url_1['url']; ?>" class="woo-button-one"><?php echo $woo_monir_card_btn_text_1; ?></a>		
												<?php
											}
											if($woo_monir_card_btn_text_2 && $woo_monir_card_btn_url_2){
												?>
													<a href="<?php echo $woo_monir_card_btn_url_2['url']; ?>" class="woo-button-two"><?php echo $woo_monir_card_btn_text_2; ?></a>
												<?php
											}
										?>
										
									</div>
									<?php
								}
							} ?>


							
							
							
						</div>
					<?php
					}
				}
			?>

            
        </div>

		<?php
	}
}