<?php

function team_members_init() {
	register_post_type( 'team-members', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'query_var'         => true,
		'rewrite'           => array(
			'slug'          	=> 'team'
		),
		'labels'            => array(
			'name'                => __( 'Team members', 'greenwichmarketinggroup' ),
			'singular_name'       => __( 'Team member', 'greenwichmarketinggroup' ),
			'all_items'           => __( 'Team members', 'greenwichmarketinggroup' ),
			'new_item'            => __( 'New team member', 'greenwichmarketinggroup' ),
			'add_new'             => __( 'Add New', 'greenwichmarketinggroup' ),
			'add_new_item'        => __( 'Add New team member', 'greenwichmarketinggroup' ),
			'edit_item'           => __( 'Edit team member', 'greenwichmarketinggroup' ),
			'view_item'           => __( 'View team member', 'greenwichmarketinggroup' ),
			'search_items'        => __( 'Search team members', 'greenwichmarketinggroup' ),
			'not_found'           => __( 'No team members found', 'greenwichmarketinggroup' ),
			'not_found_in_trash'  => __( 'No team members found in trash', 'greenwichmarketinggroup' ),
			'parent_item_colon'   => __( 'Parent team members', 'greenwichmarketinggroup' ),
			'menu_name'           => __( 'Team members', 'greenwichmarketinggroup' ),
		),
	) );

}
add_action( 'init', 'team_members_init' );

function team_members_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['team-members'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Team members updated. <a target="_blank" href="%s">View team members</a>', 'greenwichmarketinggroup'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'greenwichmarketinggroup'),
		3 => __('Custom field deleted.', 'greenwichmarketinggroup'),
		4 => __('Team members updated.', 'greenwichmarketinggroup'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Team member restored to revision from %s', 'greenwichmarketinggroup'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Team members published. <a href="%s">View team members</a>', 'greenwichmarketinggroup'), esc_url( $permalink ) ),
		7 => __('Team member saved.', 'greenwichmarketinggroup'),
		8 => sprintf( __('Team member submitted. <a target="_blank" href="%s">Preview team members</a>', 'greenwichmarketinggroup'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Team member scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview team member</a>', 'greenwichmarketinggroup'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Team member draft updated. <a target="_blank" href="%s">Preview team member</a>', 'greenwichmarketinggroup'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'team_members_updated_messages' );
