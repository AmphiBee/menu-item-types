<?php

defined( 'ABSPATH' ) or	die();


/**
 * 
 * 
 * @link : https://wordpress.org/plugins/post-type-archive-links/
 * @link : https://stackoverflow.com/questions/20879401/how-to-add-custom-post-type-archive-to-menu
 * @link : https://kinsta.com/blog/wordpress-custom-menu/
 * 
 */


 /**
 * Add menu meta box
 *
 * @param object $object The meta box object
 * @link https://developer.wordpress.org/reference/functions/add_meta_box/
 */
function mitypes_add_item_type_custom_metabox( $object ) {

	add_meta_box( 'mitypes-item-type-custom-metabox', esc_html__( 'Custom Items', 'menu-item-types' ), 'mitypes_item_type_custom_metabox', 'nav-menus', 'side', 'low' );

	return $object;
}

add_filter( 'nav_menu_meta_box_object', 'mitypes_add_item_type_custom_metabox', 10, 1 );


/**
 * Displays a metabox for authors menu item.
 *
 * @global int|string $nav_menu_selected_id (id, name or slug) of the currently-selected menu
 *
 * @link https://core.trac.wordpress.org/browser/tags/4.5/src/wp-admin/includes/nav-menu.php
 * @link https://core.trac.wordpress.org/browser/tags/4.5/src/wp-admin/includes/class-walker-nav-menu-edit.php
 * @link https://core.trac.wordpress.org/browser/tags/4.5/src/wp-admin/includes/class-walker-nav-menu-checklist.php
 */
function mitypes_item_type_custom_metabox(){

	global $nav_menu_selected_id;
	$current_tab = 'all';

	$removed_args = array( 'action', 'customlink-tab', 'edit-menu-item', 'menu-item', 'page-tab', '_wpnonce' );

	// run

	?>
	<div id="mitypes-item-type-custom" class="categorydiv">

		<ul id="mitypes-item-type-custom-tabs" class="mitypes-item-type-custom-tabs add-menu-item-tabs">
			<li <?php echo ( 'all' == $current_tab ? ' class="tabs"' : '' ); ?>>
				<a class="nav-tab-link" data-type="tabs-panel-mitypes-item-type-custom-all" href="<?php if ( $nav_menu_selected_id ) echo esc_url( add_query_arg( 'mitypes-item-type-custom-tab', 'all', remove_query_arg( $removed_args ) ) ); ?>#tabs-panel-mitypes-item-type-custom-all">
					<?php echo esc_html__( 'View All' ); ?>
				</a>
			</li><!-- /.tabs -->

		</ul>
		
		<div id="tabs-panel-mitypes-item-type-custom-all" class="tabs-panel tabs-panel-view-all <?php echo ( 'all' == $current_tab ? 'tabs-panel-active' : 'tabs-panel-inactive' ); ?>">
			
			<ul id="mitypes-item-type-custom-checklist-all" class="categorychecklist form-no-clear">
			<?php
			
			global $_nav_menu_placeholder, $nav_menu_selected_id;
			




			?>
			<?php
			/**
			 * 
			 * no link
			 * 
			 */
			

			$mitypes_custom_item_tag = '#mitypes_nolink' ;
			$menu_item_data = array(
				'menu-item-title'  => __( 'MITYPES', 'menu-item-types' )
				,'menu-item-url'    => $mitypes_custom_item_tag
				);

			$url = $mitypes_custom_item_tag . '_' . http_build_query($menu_item_data)  ;

			?>
			<li>
				<label class="menu-item-title">
					<input type="checkbox" class="menu-item-checkbox" name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-label]" value="0"> <?php echo esc_html__( 'No link', 'menu-item-types' ) ; ?>
				</label>

				<input type="hidden" class="menu-item-type"   name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-type]" value="custom">
				<input type="hidden" class="menu-item-object" name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-object]" value="custom">
				<input type="hidden" class="menu-item-title"  name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-title]" value="<?php echo esc_attr__( 'No link', 'menu-item-types' ) ; ?>">
				<input type="hidden" class="menu-item-url"    name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-url]" value="<?php echo  esc_url( $url ) ; ?>">
				<input type="hidden" class="menu-item-url"    name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-data]" value="<?php echo esc_url( $url )  ; ?>">
				
			</li>
			<hr>
			<?php

			/**
			 * 
			 * Heading item
			 * 
			 */
			

			$mitypes_custom_item_tag = '#mitypes_heading' ;
			$menu_item_data = array(
				'menu-item-title'  => __( 'MITYPES', 'menu-item-types' )
				,'menu-item-url'    => $mitypes_custom_item_tag
				);

			$url = $mitypes_custom_item_tag . '_' . http_build_query($menu_item_data)  ;

			?>
			<li>
				<label class="menu-item-title">
					<input type="checkbox" class="menu-item-checkbox" name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-label]" value="0"> <?php echo esc_html__( 'Heading', 'menu-item-types' ) ; ?>
				</label>

				<input type="hidden" class="menu-item-type"   name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-type]" value="custom">
				<input type="hidden" class="menu-item-object" name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-object]" value="custom">
				<input type="hidden" class="menu-item-title"  name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-title]" value="<?php echo esc_attr__( 'Heading', 'menu-item-types' ) ; ?>">
				<input type="hidden" class="menu-item-url"    name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-url]" value="<?php echo  esc_url( $url ) ; ?>">
				<input type="hidden" class="menu-item-url"    name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-data]" value="<?php echo esc_url( $url )  ; ?>">
				
			</li>
			<?php
			/**
			 * 
			 * Paragraph item
			 * 
			 */
			

			$mitypes_custom_item_tag = '#mitypes_paragraph' ;
			$menu_item_data = array(
				'menu-item-title'  => __( 'MITYPES', 'menu-item-types' )
				,'menu-item-url'    => $mitypes_custom_item_tag
				);

			$url = $mitypes_custom_item_tag . '_' . http_build_query($menu_item_data)  ;

			?>
			<li>
				<label class="menu-item-title">
					<input type="checkbox" class="menu-item-checkbox" name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-label]" value="0"> <?php echo esc_html__( 'Paragraph', 'menu-item-types' ) ; ?>
				</label>

				<input type="hidden" class="menu-item-type"   name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-type]" value="custom">
				<input type="hidden" class="menu-item-object" name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-object]" value="custom">
				<input type="hidden" class="menu-item-title"  name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-title]" value="<?php echo esc_attr__( 'Paragraph', 'menu-item-types' ) ; ?>">
				<input type="hidden" class="menu-item-url"    name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-url]" value="<?php echo  esc_url( $url ) ; ?>">
				<input type="hidden" class="menu-item-url"    name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-data]" value="<?php echo esc_url( $url )  ; ?>">
				
			</li>
			<?php
			


			/**
			 * 
			 * Image type
			 * 
			 */
			
			$mitypes_custom_item_tag = '#mitypes_image' ;
			$menu_item_data = array(
				'menu-item-title'  => esc_html__( 'Image', 'menu-item-types' )
				,'menu-item-url'    => $mitypes_custom_item_tag
				);
			
			$url = $mitypes_custom_item_tag . '_' . http_build_query($menu_item_data)  ;

			?>
			<li>
				<label class="menu-item-title">
					<input type="checkbox" class="menu-item-checkbox" name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-label]" value="0"> <?php echo esc_html__( 'Image', 'menu-item-types' ) ; ?>
				</label>

				<input type="hidden" class="menu-item-type"   name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-type]" value="custom">
				<input type="hidden" class="menu-item-object" name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-object]" value="custom">
				<input type="hidden" class="menu-item-title"  name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-title]" value="<?php echo esc_attr__( 'Image', 'menu-item-types' ) ; ?>">
				<input type="hidden" class="menu-item-url"    name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-url]" value="<?php echo esc_url( $url ); ?>">
				<input type="hidden" class="menu-item-url"    name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-data]" value="<?php echo esc_url( $url )  ; ?>">
			</li>
			
			<hr>
			<?php



			/**
			 * 
			 * Block item
			 * 
			 */
			

			$mitypes_custom_item_tag = '#mitypes_wpblock' ;
			$menu_item_data = array(
				'menu-item-title'  => __( 'MITYPES', 'menu-item-types' )
				,'menu-item-url'    => $mitypes_custom_item_tag
				);

			$url = $mitypes_custom_item_tag . '_' . http_build_query($menu_item_data)  ;

			?>
			<li>
				<label class="menu-item-title">
					<input type="checkbox" class="menu-item-checkbox" name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-label]" value="0"> <?php echo esc_html__( 'Reusable Block', 'menu-item-types' ) ; ?>
				</label>

				<input type="hidden" class="menu-item-type"   name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-type]" value="custom">
				<input type="hidden" class="menu-item-object" name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-object]" value="custom">
				<input type="hidden" class="menu-item-title"  name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-title]" value="<?php echo esc_attr__( 'Reusable Block', 'menu-item-types' ) ; ?>">
				<input type="hidden" class="menu-item-url"    name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-url]" value="<?php echo  esc_url( $url ) ; ?>">
				<input type="hidden" class="menu-item-url"    name="menu-item[<?php echo esc_attr( $_nav_menu_placeholder ) ; ?>][menu-item-data]" value="<?php echo esc_url( $url )  ; ?>">
				
			</li>
			
			

			</ul>
		</div><!-- /.tabs-panel -->

		<p class="button-controls wp-clearfix">

			<span class="add-to-menu">
				<input type="submit"<?php wp_nav_menu_disabled_check( $nav_menu_selected_id ); ?> class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e('Add to Menu'); ?>" name="add-mitypes-item-type-custom-menu-item" id="submit-mitypes-item-type-custom" />
				<span class="spinner"></span>
			</span>
		</p>

	</div><!-- /.categorydiv -->
	<?php

}