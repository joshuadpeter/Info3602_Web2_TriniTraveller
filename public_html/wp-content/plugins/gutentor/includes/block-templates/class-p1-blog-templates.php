<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Gutentor_P1_Blog_Templates' ) ) {

	/**
	 * Blog_Post_Templates Class For Gutentor
	 * @package Gutentor
	 * @since 2.0.0
	 *
	 */
	class Gutentor_P1_Blog_Templates extends Gutentor_Query_Elements{

		/**
		 * Gets an instance of this object.
		 * Prevents duplicate instances which avoid artefacts and improves performance.
		 *
		 * @static
		 * @access public
		 * @since 2.0.0
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
		 * Run Block
		 *
		 * @access public
		 * @since 2.0.0
		 * @return void
		 */
		public function run(){
            add_filter( 'gutentor_post_module_p1_template_data', array( $this, 'load_blog_post_template' ), 99999, 3 );
		}

        /**
         * Load Grid Template 1
         *
         * @param {string} $data
         * @param {array} $post
         * @param {array} $attributes
         * @return {mix}
         */
        public function gutentor_p1_grid_template1( $data, $post, $attributes ){

            $query_sorting      = array_key_exists('blockSortableItems',$attributes) ?$attributes['blockSortableItems'] : false;
            $output = '';
            if($query_sorting):
                foreach( $query_sorting as $element ):
                    if(!(array_key_exists('itemValue',$element))){
                        return $output;
                    }
                    switch ( $element['itemValue'] ) {
                        case 'featured-image':
                            if (has_post_thumbnail( $post->ID ) ){
                                $output .= '<div class="gutentor-post-image-box">'.$this->get_featured_image($post,$attributes).'</div>';
                            }
                            break;
                        case 'title':
                            $output .= $this->get_title($post,$attributes);
                            break;
                        case 'primary-entry-meta':
                            $output .= $this->get_primary_meta($post,$attributes);
                            break;
                        case 'secondary-entry-meta':
                            $output .= $this->get_secondary_meta($post,$attributes);
                            break;
                        case 'description':
                            $output .= $this->get_description($post,$attributes);
                            break;
                        case 'button':
                            $output .= $this->get_button($post,$attributes);
                            break;
                        default:
                            $output .= '';
                            break;
                    }
                endforeach;
            endif;
            return $output;
        }

        /**
         * Load List Template 1
         *
         * @param {string} $data
         * @param {array} $post
         * @param {array} $attributes
         * @return {mix}
         */
        public function gutentor_p1_list_template1( $data, $post, $attributes ){

            $query_sorting      = array_key_exists('blockSortableItems',$attributes) ?$attributes['blockSortableItems'] : false;
            $output = '';
            if (has_post_thumbnail( $post->ID ) ){
                $output .= '<div class="gutentor-post-image-box">'.$this->get_featured_image($post,$attributes).'</div>';
            }
            $output .= '<div class="gutentor-post-content">';
            if($query_sorting):
                foreach( $query_sorting as $element ):
                    if(!(array_key_exists('itemValue',$element))){
                        return $output;
                    }
                    switch ( $element['itemValue'] ) {
                        case 'title':
                            $output .= $this->get_title($post,$attributes);
                            break;
                        case 'primary-entry-meta':
                            $output .= $this->get_primary_meta($post,$attributes);
                            break;
                        case 'secondary-entry-meta':
                            $output .= $this->get_secondary_meta($post,$attributes);
                            break;
                        case 'description':
                            $output .= $this->get_description($post,$attributes);
                            break;
                        case 'button':
                            $output .= $this->get_button($post,$attributes);
                            break;
                        default:
                            $output .= '';
                            break;
                    }
                endforeach;
            endif;
            $output .= '</div>';/*.gutentor-post-content*/
            return $output;

        }

        /**
         * Load Template 1
         *
         * @param {string} $data
         * @param {array} $post
         * @param {array} $attributes
         * @return {mix}
         */
        public function gutentor_p1_template1( $data, $post, $attributes ){

            $template_style = isset($attributes['gStyle']) ? $attributes['gStyle'] : false;
            $output = '';
            if($template_style == 'gutentor-blog-grid' ){
                $output = $this->gutentor_p1_grid_template1($data, $post, $attributes);
            }
            elseif ($template_style == 'gutentor-blog-list'){
                $output = $output = $this->gutentor_p1_list_template1($data, $post, $attributes);
            }
            return $output;
        }

        /**
         * Load Template 2
         *
         * @param {string} $data
         * @param {array} $post
         * @param {array} $attributes
         * @return {mix}
         */
        public function gutentor_p1_template2( $data, $post, $attributes ){

            $output = '';
            if (has_post_thumbnail( $post->ID ) ){
                $output .= '<div class="gutentor-post-image-box">';
                $output .= $this->get_featured_image($post,$attributes);
                $output .= $this->get_primary_meta($post,$attributes);
                $output .= '</div>';/*.gutentor-post-image-box*/
            }
            $output .= '<div class="gutentor-post-content">';
            $output .= $this->get_title($post,$attributes);
            $output .= $this->get_description($post,$attributes);
            $output .= $this->get_secondary_meta($post,$attributes);
            $output .= $this->get_button($post,$attributes);
            $output .= '</div>';/*.gutentor-post-content*/
            return $output;
        }

        /**
         * Get Categories Template 3
         *
         * @param {mix} $post_id
         * @return string
         */
        function get_categories_template3( $post_id = false ) {

            global $wp_rewrite;
            $categories = get_the_category( $post_id );
            $rel = ( is_object( $wp_rewrite ) && $wp_rewrite->using_permalinks() ) ? 'rel="category tag"' : 'rel="category"';
            $i = 0;
            $cat_list = '';

            foreach ( $categories as $category ) {
                if ( 0 <= $i )
                    $cat_list .= '<a href="' . get_category_link( $category->term_id ) . ' " class="post-category gutentor-cat-'.$category->slug. '" ' . $rel . '>' . $category->name.'</a>';
                    $cat_list .= ' ';
                ++$i;
            }
            return  $cat_list;
        }

        /**
         * Load Template 3
         *
         * @param {string} $data
         * @param {array} $post
         * @param {array} $attributes
         * @return {mix}
         */
        public function gutentor_p1_template3( $data, $post, $attributes ){
            $output = '';
            if (has_post_thumbnail( $post->ID ) ){
                $output .= '<div class="gutentor-post-image-box">';
                $output .= $this->get_featured_image($post,$attributes);
                $categories_list = get_the_category_list(esc_html__(' ', 'gutentor'));
                if ($categories_list) {
                    $output .= '<div class="gutentor-categories">' . $this->get_categories_template3($post->ID) . '</div>';
                }
                $output .= '</div>';/*.gutentor-post-image-box*/
            }
            $output .= '<div class="gutentor-post-content">';
            $output .= $this->get_title($post,$attributes);
            $output .= $this->get_primary_meta($post,$attributes);
            $output .= $this->get_secondary_meta($post,$attributes);
            $output .= $this->get_description($post,$attributes);
            $output .= $this->get_button($post,$attributes);
            $output .= '</div>';/*.gutentor-post-content*/
            return $output;
        }

        /**
         * Blog Post Templates
         *
         * @param {string} $data
         * @param {array} $post
         * @param {array} $attributes
         * @return {mix}
         */

        public function load_blog_post_template( $data, $post, $attributes ){

            $output = $data;
            $template = (isset($attributes['p1Temp'])) ? $attributes['p1Temp'] : '';
            if( method_exists( $this, $template ) ){
                $output = $this->$template($data, $post, $attributes);
            }
            else{
                $output = $this->gutentor_p1_template1($data, $post, $attributes);
            }
            return $output;
        }
		
	}
}
Gutentor_P1_Blog_Templates::get_instance()->run();