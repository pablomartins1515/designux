<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.2
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $post, $product;

?>
<div class="images">
	<div id="single-product-slider">
			<?php
			//Image Slider
			$attachment_count = count( $product->get_gallery_image_ids() );

            if ( has_post_thumbnail() ) {

				$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
				$thumbnail_size    = apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' );
				$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );

				$attributes = array(
					'title'                   => get_post_field( 'post_title', $post_thumbnail_id ),
					'data-caption'            => get_post_field( 'post_excerpt', $post_thumbnail_id ),
					'data-src'                => $full_size_image[0],
					'data-large_image'        => $full_size_image[0],
					'data-large_image_width'  => $full_size_image[1],
					'data-large_image_height' => $full_size_image[2],
				);

				$html  = '<a class="woocommerce-main-image" href="' . esc_url( $full_size_image[0] ) . '" data-rel="prettyPhoto[product-gallery]">';
				$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
				$html .= '</a>';
            } else {
				$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
				$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Placeholder', 'burst' ) );
				$html .= '</div>';
			}

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

			if ( $attachment_count > 0 ) {

				$attachment_ids = $product->get_gallery_image_ids();
				foreach ( $attachment_ids as $attachment_id ) {
					$image_link = wp_get_attachment_image_src($attachment_id, 'full');
					$image = wp_get_attachment_image($attachment_id, apply_filters('single_product_large_thumbnail_size', 'shop_single'));

					$thumbnail_html = '<a class="woocommerce-main-image" href="' . esc_url( $image_link[0] ) . '" data-rel="prettyPhoto[product-gallery]">';
					$thumbnail_html .= $image;
					$thumbnail_html .= '</a>';

					echo apply_filters('woocommerce_single_product_image_html', $thumbnail_html, $attachment_id);
				}
                //generate navigation html
                ?>
			<?php }
			?>
	</div>

    <ul class="caroufredsel-direction-nav">
        <li class="caroufredsel-prev-holder">
            <a id="caroufredsel-prev" class="single-product-gallery-prev caroufredsel-navigation-item caroufredsel-prev" href="javascript: void(0)">
            	<img src="<?php echo esc_url(get_template_directory_uri() . '/img/arrow-left-slider.png'); ?>" alt="arrow" />
            </a>
        </li>
        <li class="caroufredsel-next-holder">
            <a class="single-product-gallery-next caroufredsel-next caroufredsel-navigation-item" id="caroufredsel-next" href="javascript: void(0)">
            	<img src="<?php echo esc_url(get_template_directory_uri() . '/img/arrow-right-slider.png'); ?>" alt="arrow" />
            </a>
        </li>
    </ul>
	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>
