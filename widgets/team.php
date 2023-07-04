<?php
class Monir_Team_Member_Widgets extends \Elementor\Widget_Base {

	public function get_name() {
		return 'monir_team';
	}

	public function get_title() {
		return esc_html__( 'Monir Team', 'monir-team' );
	}

	public function get_icon() {
		return 'eicon-preferences';
	}

	public function get_categories() {
		return [ 'monir-team-cat' ];
	}

	public function get_keywords() {
		return [ 'monir', 'team' ];
	}

    protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'monir-team' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'monir_image',
			[
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label' => esc_html__( 'Choose Image', 'monir-team' ),
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);
		$this->add_control(
			'team_member_name',
			[
				'label' => esc_html__( 'Team Member Name', 'monir-team' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Monir Ullah', 'monir-team' ),
				'placeholder' => esc_html__( 'Type your team member Name here', 'monir-team' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'team_member_designation',
			[
				'label' => esc_html__( 'Team Member designation', 'monir-team' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Web Desinger', 'monir-team' ),
				'placeholder' => esc_html__( 'Type your team member designation here', 'monir-team' ),
				'label_block' => true
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'social_links_section',
			[
				'label' => esc_html__( 'Social Links', 'monir-team' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'social_media_name',
			[
				'label' => esc_html__( 'Social Media Name', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'textdomain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'social_media_link',
			[
				'label' => esc_html__( 'Social Media Link', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'moinir_social_icon',
			[
				'label' => esc_html__( 'Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'label_block' => true,
			]
		);

		$this->add_control(
			'repeater_items',
			[
				'label' => esc_html__( 'Repeater List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'social_media_name' => esc_html__( 'Title #1', 'textdomain' ),
					]
				],
				'title_field' => '{{{ social_media_name }}}',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style Section', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),

			[	'label' => esc_html__( 'Team Member Name Typography', 'textdomain' ),
				'name' => 'team_name_typography',
				'selector' => '{{WRAPPER}} .caption h3',
			]
		);
		$this->add_control(
			'team_name_text_color',
			[
				'label' => esc_html__( 'Member Name Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .caption h3' => 'color: {{VALUE}}',
				],
			]
		);
		

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[	'label' => esc_html__( 'Member Designation Text Color', 'textdomain' ),
				'name' => 'team_designation_typography',
				'selector' => '{{WRAPPER}} .caption p',
			]
		);

		$this->add_control(
			'team_designation_text_color',
			[
				'label' => esc_html__( 'Member Designation Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .caption p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_section();

		// Social Icon Hover Effect

		$this->start_controls_section(
			'social_icon_hover',
			[
				'label' => esc_html__( 'Social Icon Hover', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'textdomain' ),
			]
		);
		$this->add_control(
			'profile_normal_background_color',
			[
				'label' => esc_html__( 'Profile Normal Background Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .profile-card' => 'background: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'social_icon_normal_color',
			[
				'label' => esc_html__( 'Normal Icon Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .social-links a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'textdomain' ),
			]
		);

		
		$this->add_control(
			'profile_hover_background_color',
			[
				'label' => esc_html__( 'Profile Hover Background Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .profile-card:hover' => 'background: {{VALUE}}',
				],
			]
		);

		
		$this->add_control(
			'social_icon_hover_color',
			[
				'label' => esc_html__( 'Icon Hover  Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .social-links a:hover' => 'color: {{VALUE}}',
				],
			]
		);
	

		$this->end_controls_tabs();

		$this->end_controls_section();


	}

	protected function render() {
        $settings = $this->get_settings_for_display();
        $monir_image = $settings['monir_image']['url'];
        $team_member_name = $settings['team_member_name'];
        $team_member_designation = $settings['team_member_designation'];
        $repeater_items = $settings['repeater_items'];
       
		?>

        <div class="profile-card">
			<?php 
				if($monir_image){
					?>
					<div class="img">
						<img src="<?php echo $monir_image; ?>">
					</div>
					<?php
				}
			?>
            
            <div class="caption">
				<?php 
					if($team_member_name){
						?>
						<h3><?php echo $team_member_name;?></h3>
						<?php
					}

					if($team_member_designation){
						?>
						<p><?php echo $team_member_designation;?></p>
						<?php
					}

					if($repeater_items){
						?>
						<div class="social-links">
							<?php 
								foreach ($repeater_items as $single) {
									$moinir_social_icon = $single['moinir_social_icon']['value'];
									$social_media_link = $single['social_media_link']['url'];
									if($social_media_link && $moinir_social_icon){
										?>
										<a href="<?php echo $social_media_link;?>"><i class="<?php echo $moinir_social_icon;?>"></i></a>
										<?php
									}
								}
								
							?>
						</div>
						<?php
					}
				?>
            </div>
        </div>

		<?php
	}
}