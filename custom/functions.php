<?php
/**
 * Functions.php
 *
 * @package  Theme_Customisations
 * @author   WooThemes
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * functions.php
 * Add PHP snippets here
 */

add_action( 'init', 'ff_init' );
//add_action('wp_head', 'mailchimp_popup_js');
//add_action('woocommerce_before_shop_loop', 'add_header_image_to_shop_page');
add_action( 'woocommerce_before_main_content', 'add_header_image_to_shop_page', 20, 0 );

function ff_init() {
	wp_register_style( 'bootstrap', plugin_dir_url(__FILE__) . 'bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap' );
}

function script_shortcode( $atts, $content = null ) {
	return '<span class="script">' . $content . '</span>';
}
add_shortcode( 'script', 'script_shortcode' );

function button_shortcode( $atts, $content = null ) {
	return '<a class="btn btn-primary btn-shortcode button" href="'. $atts['link'] . '">' . $atts['title'] . '</a>';
}
add_shortcode( 'button', 'button_shortcode' );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 30 );

 class ff_Footer_Widget extends WP_Widget {

	 public function __construct() {
    $widget_options = array(
      'classname' => 'ff_footer_widget',
      'description' => 'This footer widget allows user to create three calls to action.',
    );
    parent::__construct( 'ff_footer_widget', 'Footer Widget', $widget_options );
  }

	public function widget( $args, $instance ) {
	  $title_1 = apply_filters( 'widget_title', $instance[ 'title_1' ] );
		$title_2 = apply_filters( 'widget_title', $instance[ 'title_2' ] );
		$title_3 = apply_filters( 'widget_title', $instance[ 'title_3' ] );
		$link_1 = apply_filters( 'widget_title', $instance[ 'link_1' ] );
		$link_2 = apply_filters( 'widget_title', $instance[ 'link_2' ] );
		$link_3 = apply_filters( 'widget_title', $instance[ 'link_3' ] );
		$image_1 = apply_filters( 'widget_title', $instance[ 'image_1' ] );
		$image_2 = apply_filters( 'widget_title', $instance[ 'image_2' ] );
		$image_3 = apply_filters( 'widget_title', $instance[ 'image_3' ] );

	  echo $args['before_widget'] ?>
		<div class = "row">
			<div class = "item col-sm-12 col-md-4">
				<a href="<?php echo $link_1; ?>">
					<img src="<?php echo $image_1 ?>"); />
					<h3 class="title"><?php echo $title_1 ?></h3>
				</a>
			</div>
			<div class = "item col-sm-12 col-md-4">
				<a href="<?php echo $link_2; ?>">
					<img src="<?php echo $image_2 ?>"); />
					<h3 class="title"><?php echo $title_2 ?></h3>
				</a>
			</div>
			<div class = "item col-sm-12 col-md-4">
				<a href="<?php echo $link_3; ?>">
					<img src="<?php echo $image_3 ?>"); />
					<h3 class="title"><?php echo $title_3 ?></h3>
				</a>
			</div>
		</div>

	  <?php echo $args['after_widget'];
	}

	public function form( $instance ) {
	  $title_1 = ! empty( $instance['title_1'] ) ? $instance['title_1'] : '';
		$link_1 = ! empty( $instance['link_1'] ) ? $instance['link_1'] : '';
		$image_1 = ! empty( $instance['image_1'] ) ? $instance['image_1'] : ''; ?>
		<h2>First Call to Action</h2>
		<p>
	    <label for="<?php echo $this->get_field_id( 'title_1' ); ?>">Title:</label>
	    <input type="text" id="<?php echo $this->get_field_id( 'title_1' ); ?>" name="<?php echo $this->get_field_name( 'title_1' ); ?>" value="<?php echo esc_attr( $title_1 ); ?>" />
	  </p>
		<p>
	    <label for="<?php echo $this->get_field_id( 'link_1' ); ?>">Link:</label>
	    <input type="text" id="<?php echo $this->get_field_id( 'link_1' ); ?>" name="<?php echo $this->get_field_name( 'link_1' ); ?>" value="<?php echo esc_attr( $link_1 ); ?>" />
	  </p>
		<p>
			<label for="<?php echo $this->get_field_id( 'image_1' ); ?>">Image Url:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'image_1' ); ?>" name="<?php echo $this->get_field_name( 'image_1' ); ?>" value="<?php echo esc_attr( $image_1 ); ?>" />
		</p>
		<?php
		$title_2 = ! empty( $instance['title_2'] ) ? $instance['title_2'] : '';
		$link_2 = ! empty( $instance['link_2'] ) ? $instance['link_2'] : '';
		$image_2 = ! empty( $instance['image_2'] ) ? $instance['image_2'] : '';?>
		<h2>Second Call to Action</h2>
		<p>
	    <label for="<?php echo $this->get_field_id( 'title_2' ); ?>">Title:</label>
	    <input type="text" id="<?php echo $this->get_field_id( 'title_2' ); ?>" name="<?php echo $this->get_field_name( 'title_2' ); ?>" value="<?php echo esc_attr( $title_2 ); ?>" />
	  </p>
		<p>
	    <label for="<?php echo $this->get_field_id( 'link_2' ); ?>">Link:</label>
	    <input type="text" id="<?php echo $this->get_field_id( 'link_2' ); ?>" name="<?php echo $this->get_field_name( 'link_2' ); ?>" value="<?php echo esc_attr( $link_2 ); ?>" />
	  </p>
		<p>
			<label for="<?php echo $this->get_field_id( 'image_2' ); ?>">Image Url:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'image_2' ); ?>" name="<?php echo $this->get_field_name( 'image_2' ); ?>" value="<?php echo esc_attr( $image_2 ); ?>" />
		</p>
		<?php
		$title_3 = ! empty( $instance['title_3'] ) ? $instance['title_3'] : '';
		$link_3 = ! empty( $instance['link_3'] ) ? $instance['link_3'] : '';
		$image_3 = ! empty( $instance['image_3'] ) ? $instance['image_3'] : '';?>
		<h2>Third Call to Action</h2>
		<p>
	    <label for="<?php echo $this->get_field_id( 'title_3' ); ?>">Title:</label>
	    <input type="text" id="<?php echo $this->get_field_id( 'title_3' ); ?>" name="<?php echo $this->get_field_name( 'title_3' ); ?>" value="<?php echo esc_attr( $title_3 ); ?>" />
	  </p>
		<p>
	    <label for="<?php echo $this->get_field_id( 'link_3' ); ?>">Link:</label>
	    <input type="text" id="<?php echo $this->get_field_id( 'link_3' ); ?>" name="<?php echo $this->get_field_name( 'link_3' ); ?>" value="<?php echo esc_attr( $link_3 ); ?>" />
	  </p>
		<p>
			<label for="<?php echo $this->get_field_id( 'image_3' ); ?>">Image Url:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'image_3' ); ?>" name="<?php echo $this->get_field_name( 'image_3' ); ?>" value="<?php echo esc_attr( $image_3 ); ?>" />
		</p><?php
	}

	public function update( $new_instance, $old_instance ) {
	  $instance = $old_instance;
	  $instance[ 'title_1' ] = strip_tags( $new_instance[ 'title_1' ] );
		$instance[ 'link_1' ] = strip_tags( $new_instance[ 'link_1' ] );
		$instance[ 'image_1' ] = strip_tags( $new_instance[ 'image_1' ] );

		$instance[ 'title_2' ] = strip_tags( $new_instance[ 'title_2' ] );
		$instance[ 'link_2' ] = strip_tags( $new_instance[ 'link_2' ] );
		$instance[ 'image_2' ] = strip_tags( $new_instance[ 'image_2' ] );

		$instance[ 'title_3' ] = strip_tags( $new_instance[ 'title_3' ] );
		$instance[ 'link_3' ] = strip_tags( $new_instance[ 'link_3' ] );
		$instance[ 'image_3' ] = strip_tags( $new_instance[ 'image_3' ] );

	  return $instance;
	}

 }
function ff_register_footer_widget() {
  register_widget( 'ff_Footer_Widget' );
}
add_action( 'widgets_init', 'ff_register_footer_widget' );

function storefront_credit() {
	?>
	<div class="site-info">
		<?php wp_nav_menu( $args = array('theme_location'	=> 'primary', 'container_class' => 'footer-menu', 'depth' => 1)); ?>
		<h1 class="script">Let's Connect!</h1>
		<div class="social-icons">
			<a href="https://www.facebook.com/flourandfig/" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
			<a href="https://www.instagram.com/flourandfig/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
			<a href="https://www.pinterest.com/FlourandFig/" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
			<a href="mailto:hello@flourandfig.com" target="_blank"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
		</div>
	</div><!-- .site-info -->
	<div class="copyright"><?php echo esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?></div>
	<?php
}

function storefront_site_title_or_logo( $echo = true ) {
	if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
		$logo = '<a href="'. get_home_url() . '" class="custom-logo-link" rel="home" itemprop="url"><img src="http://flourandfig.com/wp-content/uploads/2017/03/LOGO-Flour-Fig.png" class="custom-logo"/></a>';
		$html = is_home() ? '<h1 class="logo">' . $logo . '</h1>' : $logo;

		if ( '' !== get_bloginfo( 'description' ) ) {
			$html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
		}
	}

	if ( ! $echo ) {
		return $html;
	}

	echo $html;
}

function woocommerce_checkout_coupon_form() {
	return null;
}

function add_header_image_to_shop_page() {
	if (is_shop()) { ?>
		<header class="entry-header">
			<?php
			storefront_post_thumbnail( 'full' );
			?>
		</header><!-- .entry-header -->
	<?php }
}

/*function mailchimp_popup_js() { ?>
	<script>
	    // Fill in your MailChimp popup settings below.
	    // These can be found in the original popup script from MailChimp.
	    var mailchimpConfig = {
	        baseUrl: 'mc.us16.list-manage.com',
	        uuid: 'e5429749eb5c934d3dd15d2aa',
	        lid: '1051b6909f'
	    };

	    // No edits below this line are required
	    var chimpPopupLoader = document.createElement("script");
	    chimpPopupLoader.src = '//s3.amazonaws.com/downloads.mailchimp.com/js/signup-forms/popup/embed.js';
	    chimpPopupLoader.setAttribute('data-dojo-config', 'usePlainJson: true, isDebug: false');

	    var chimpPopup = document.createElement("script");
	    chimpPopup.appendChild(document.createTextNode('require(["mojo/signup-forms/Loader"], function (L) { L.start({"baseUrl": "' +  mailchimpConfig.baseUrl + '", "uuid": "' + mailchimpConfig.uuid + '", "lid": "' + mailchimpConfig.lid + '"})});'));

	    jQuery(function ($) {
	        document.body.appendChild(chimpPopupLoader);

	        $(window).load(function () {
	            document.body.appendChild(chimpPopup);
	        });

	    });
	</script>
	<!-- <script type="text/javascript" src="https://s3.amazonaws.com/downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">require(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us16.list-manage.com","uuid":"e5429749eb5c934d3dd15d2aa","lid":"1051b6909f"}) })</script> -->
<?php }*/
