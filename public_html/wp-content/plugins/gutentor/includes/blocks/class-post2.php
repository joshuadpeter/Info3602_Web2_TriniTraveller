<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Gutentor_Post2' ) ) {

	/**
	 * Functions related to Blog Post
	 * @package Gutentor
	 * @since 1.0.1
	 *
	 */

	class Gutentor_Post2 extends Gutentor_Block_Base{

		/**
		 * Name of the block.
		 *
		 * @access protected
		 * @since 1.0.1
		 * @var string
		 */
		protected $block_name = 'post2';

		/**
		 * Gets an instance of this object.
		 * Prevents duplicate instances which avoid artefacts and improves performance.
		 *
		 * @static
		 * @access public
		 * @since 1.0.1
		 * @return object
		 */
		public static function get_instance() {

			// Store the instance locally to avoid private static replication
			static $instance = null;

			// Only run these methods if they haven't been ran previously
			if ( null === $instance ) {
				$instance = new self();
			}

			// Always return the instance
			return $instance;

		}

		/**
		 * Load Dependencies
		 * Used for blog template loading
		 *
		 * @since      1.0.1
		 * @package    Gutentor
		 * @author     Gutentor <info@gutentor.com>
		 */
		public function load_dependencies(){

			require_once GUTENTOR_PATH . 'includes/block-templates/class-post2-templates.php';
		}

        /**
         * Returns attributes for this Block
         *
         * @static
         * @access public
         * @since 1.0.1
         * @return array
         */
        protected function get_attrs(){
            $blog_post_attr = array(
                'gID'   => array(
                    'type'    => 'string',
                    'default' => ''
                ),
                'gName' => array(
                    'type'    => 'string',
                    'default' => 'gutentor/post2',
                ),
                'post2Temp'                  => array(
                    'type'    => "string",
                    'default' => "gutentor_template1"
                ),
                'postsToShow'               => array(
                    'type'    => 'number',
                    'default' => 6
                ),
                'order'                     => array(
                    'type'    => 'string',
                    'default' => 'desc',
                ),
                'orderBy'                   => array(
                    'type'    => 'string',
                    'default' => 'date',
                ),
                'categories'                => array(
                    'type'    => 'string',
                    'default' => '',
                ),
                'gutentorBlogPostImageLink'=> array(
                    'type'    => 'boolean',
                    'default'    => false,
                ),
                'pReverseContent'=> array(
                    'type'    => 'boolean',
                    'default'    => false,
                ),
                'gutentorBlogPostImageLinkNewTab'=> array(
                    'type'    => 'boolean',
                    'default'    => false,
                ),
                'p1BgProps'           => array(
                    'type' => 'object',
                    'default' => array(
                        'size'   => 'cover',
                        'pos'   => 'center',
                        'repeat'   =>'no-repeat',
                        'attachment'   => 'scroll',
                    )
                ),
                'p1FImageOnHeight'=> array(
                    'type'    => 'boolean',
                    'default'    => false,
                ),
                'p1FImageHeight'=> array(
                    'type'    => 'boolean',
                    'default'    => false,
                ),
            );
            $blog_partial_attrs =  array_merge_recursive( $blog_post_attr, $this->get_module_common_attrs() );
            $blog_partial_attrs =  array_merge_recursive( $blog_partial_attrs, $this->get_module_query_elements_common_attrs() );
            return $blog_partial_attrs;
        }
        

		/**
		 * Render Blog Post Data
		 *
		 * @since    1.0.1
		 * @access   public
		 *
		 * @param array $attributes
		 * @param string $content
		 * @return string
		 */
		public function render_callback( $attributes, $content ) {

		    $gutentor_dynamic_style_location = '';
			if(gutentor_get_options('gutentor_dynamic_style_location')){
				$gutentor_dynamic_style_location =  gutentor_get_options('gutentor_dynamic_style_location');
			}
			$blockID = isset($attributes['pID']) ? $attributes['pID'] : $attributes['gID'];
			$gID = isset($attributes['gID']) ? $attributes['gID'] : '';
			$output = '';
			// the query
			$args      = array(
				'posts_per_page'      => $attributes['postsToShow'],
				'orderby'             => $attributes['orderBy'],
				'order'               => $attributes['order'],
				'cat'                 => $attributes['categories'],
				'ignore_sticky_posts' => 1
			);

			$tag = $attributes['mTag'] ? $attributes['mTag'] : 'div';
			$template = $attributes['post2Temp'] ? $attributes['post2Temp'] : '';
			$align = isset($attributes['align']) ? 'align'.$attributes['align'] : '';
			$blockComponentAnimation = isset($attributes['mAnimation']) ? $attributes['mAnimation'] : '';

			$the_query = new WP_Query( $args );
            $loop = 0;
			if ($the_query->have_posts()) :
				$output  .= '<'.$tag.' class="'.apply_filters('gutentor_post_module_main_wrap_class',gutentor_concat_space('gutentor-post-module','gutentor-post-module-post2', 'section-'.$gID,$template,$align), $attributes).'" id="'. esc_attr($blockID) . '" '.GutentorAnimationOptionsDataAttr($blockComponentAnimation).'>' . "\n";
				if('default' == $gutentor_dynamic_style_location){
					$blog_style = $this->get_common_css($attributes);
					$output .= '<style>'.$blog_style.'</style>';
				}
				$output .= apply_filters( 'gutentor_post_module_before_container', '', $attributes );
				$output .= "<div class='".apply_filters( 'gutentor_post_module_container_class','grid-container', $attributes  )."'>";
				$output .= apply_filters('gutentor_post_module_before_block_items', '', $attributes);
				$output .= "<div class='". apply_filters('gutentor_post_module_grid_row_class', 'grid-row' , $attributes) . " ' ".apply_filters( 'gutentor_save_grid_row_attr','', $attributes  ).">";
				while ($the_query->have_posts()) : $the_query->the_post();
                    if($loop == 2 ){
                        break;
                    }
					$thumb_class = has_post_thumbnail() ? '' : 'gutentor-post-no-thumb';
					$output .= "<article class='".apply_filters('gutentor_post_module_grid_column_class', gutentor_concat_space('gutentor-post',$thumb_class,'gutentor-post-item-'.$loop) , $attributes) . "'>";
					$output .= '<div class="gutentor-post-item">';
					$output .= apply_filters('gutentor_post_module_post2_template_data', '',get_post(), $attributes);
					$output .= "</div>";/*.gutentor-post-item*/
					$output .= "</article>";/*.article*/
                    $loop++;

                endwhile;
				$output .= "</div>";/*.grid-row*/
				$output .= apply_filters('gutentor_post_module_after_block_items', '', $attributes);
				$output .= "</div>";/*.grid-container*/
				$output .= apply_filters( 'gutentor_post_module_after_container', '', $attributes );
				$output .= '</'.$tag.'>';/*.gutentor-blog-post-wrapper*/
			endif;

			// Restore original Post Data
			wp_reset_postdata();
			return $output;
		}
	}
}
Gutentor_Post2::get_instance()->run();