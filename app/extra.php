<?php

namespace App;


//カスタム投稿タイプ
function shopinfo_register_post_types() {
  register_post_type( 'shopinfo', [
    'description' => '店舗の紹介です',
    'public' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'label' => '店舗情報',
    'labels' => array(
      'all_items' => '店舗情報',
    ),
    'has_archive' => true,
    'taxonomies' => ['area'],
    'supports' => array(
      'title',
      'editor',
      'author',
       // 'custom-fields',
       'thumbnail',
     ),
  ]);
};
add_action( 'init', 'App\shopinfo_register_post_types' );

function shopinfo_register_area_taxonomy() {
  $args = array(
    'label' => 'エリア',
    'hierarchical' => true,
  );
  register_taxonomy( 'area', 'shopinfo', $args);
}
// Taxonomy
add_action( 'init', 'App\shopinfo_register_area_taxonomy');

// Google Maps
function my_acf_google_map_api( $api ){

	$api['key'] = 'AIzaSyCBITY0ctRdIhL4OKpOOorDbwxTcXUxBok';

	return $api;

}

add_filter('acf/fields/google_map/api', 'App\my_acf_google_map_api');
