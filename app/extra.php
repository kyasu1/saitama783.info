<?php

namespace App;

use WP_Query;
use WP_Widget;

//店舗情報カスタム投稿タイプ
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
function my_acf_google_map_api($api)
{
    $api['key'] = 'AIzaSyCBITY0ctRdIhL4OKpOOorDbwxTcXUxBok';
    return $api;
}

add_filter('acf/fields/google_map/api', 'App\my_acf_google_map_api');

// 駅が所属する路線をポップアップ表示するショートコード
function stations()
{
    return array(
        '朝霞台駅' => '東武東上線',
        '北朝霞駅' => 'JR武蔵野線',
        '和光市駅' => '東武東上線',
        '志木駅' => '東武東上線',
        '浦和駅' => 'JR京浜東北線,JR高崎線,JR宇都宮線',
        '北浦和駅' => 'JR京浜東北線',
        '南浦和駅' => 'JR京浜東北線,JR武蔵野線',
        '中浦和駅' => 'JR埼京線',
        '大宮駅' => 'JR埼京線,JR京浜東北線,JR宇都宮線,JR高崎線,JR川越線,東武アーバンパークライン,ニューシャトル',
        '鉄道博物館駅' => 'ニューシャトル',
        '東大宮駅' => 'JR宇都宮線',
        '指扇駅' => 'JR埼京線,JR川越線',
        '上尾駅' => 'JR高崎線',
        '北本駅' => 'JR高崎線',
        '川口駅' => 'JR京浜東北線',
        '西川口駅' => 'JR京浜東北線',
        '蕨駅' => 'JR京浜東北線',
        '東川口駅' => 'JR武蔵野線,埼玉高速鉄道',
        '鳩ヶ谷駅' => '埼玉高速鉄道',
        '越谷駅' => '東武スカイツリーライン',
        '南越谷駅' => 'JR武蔵野線',
        '大袋駅' => '東武スカイツリーライン',
        '蒲生駅' => '東武スカイツリーライン',
        'せんげん台' => '東武スカイツリーライン',
        '新越谷駅' => '東武スカイツリーライン',
        '北越谷駅' => '東武スカイツリーライン',
        '鴻巣駅' => 'JR高崎線',
        '本川越駅' => '西武新宿線',
        '川越市駅' => '東武東上線',
        '川越駅' => '東武東上線,JR埼京線,JR川越線',
        '上福岡駅' => '東武東上線',
        'みずほ台駅' => '東武東上線',
        '坂戸駅' => '東武東上線,東武越生線',
        '北坂戸駅' => '東武東上線',
        '鶴ヶ島駅' => '東武東上線',
        '武州長瀬駅' => '東武越生線',
        '東毛呂駅' => '東武越生線',
        '東飯能駅' => '西武秩父線,JR八高線',
        '武蔵高萩駅' => 'JR川越線',
        '熊谷駅' => 'JR高崎線,秩父鉄道',
        '上熊谷駅' => 'JR高崎線,秩父鉄道',
        '行田市駅' => '秩父鉄道',
        '深谷駅' => 'JR高崎線',
        '獨協大学駅' => '東武スカイツリーライン',
        '新田駅' => '東武スカイツリーライン',
        '草加駅' => '東武スカイツリーライン',
        '谷塚駅' => '東武スカイツリーライン',
        '八潮駅' => 'つくばエクスプレス',
        '三郷駅' => 'JR武蔵野線',
        '西武秩父駅' => '西武秩父線',
        '秩父駅' => '秩父鉄道',
        'お花畑駅' => '秩父鉄道',
        '所沢駅' => '西武新宿線,西武池袋線',
        '新所沢駅' => '西武新宿線',
        '狭山ヶ丘駅' => '西武池袋線',
        '狭山市駅' => '西武新宿線',
        '羽生駅' => '東武スカイツリーライン,秩父鉄道',
        '岩槻駅' => '東武アーバンパークライン）',
        '春日部駅' => '東武スカイツリーライン,東武アーバンパークライン',
        '武里駅' => '東武スカイツリーライン',
        '一ノ割駅' => '東武スカイツリーライン',
        '蓮田駅' => 'JR宇都宮線',
        '久喜駅' => 'JR宇都宮線,東武スカイツリーライン',
        '杉戸高野台駅' => '東武日光線',
        '東武動物公園駅' => '東武スカイツリーライン,東武日光線',
        '戸田公園駅' => 'JR埼京線',
        '戸田駅' => 'JR埼京線',
    );
}

function station_tooltip($atts, $content = "")
{
    $stations = stations();
    $line = preg_replace('/,/', '<BR>', $stations[$content]);

    if ($line) {
        return '<div class="togglebox"><div class="toggletip" data-toggletip-content="' . $line . '">'.$content.'</div><span></span></div>';
    } else {
        return '<span>'.$content.'</span>';
    }
}

add_shortcode('eki', 'App\station_tooltip');

// 電話番号

function mobile_tel($atts, $content = "")
{
    extract(shortcode_atts(array(
        'class' => 'link black',
    ), $atts));

    $tel = sanitize_text_field($content);
    if ( wp_is_mobile() ) {
      return '<a href="tel://' . $tel . '" class="' . $class . '"">' . $tel . '</a>';
    } else {
      return '<span class="' . $class . '">' . $tel . '</span>';
    }
}

add_shortcode('tel', 'App\mobile_tel');

// 関連記事
function related_bargain($atts, $content = "") {
  extract(shortcode_atts(array(
      'year' => '2018',
      'number' => -1,
      'orderby' => 'title',
      'exclude' => array(),
  ), $atts));

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => $number,
    'orderby' => $orderby,
    'order' => 'ASC',
    'post__not_in' => $exclude,
    'tax_query' => array(
      array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $year,
      )
    )
  );
  $the_query = new WP_Query( $args );
  if( $the_query->have_posts() ) {
    $output = '';
    $output .= '<div class="flex flex-wrap">';
    while( $the_query->have_posts() ){
      $the_query->the_post();
      $id = get_field('image');
      $tag = wp_get_attachment_image( $id, array(200, 200), false, array( 'class' => 'h-auto dim' ));
      $output .= '<a href="' . get_permalink() . '" title="' . get_the_title() . '" class="dib dim">'. $tag . '</a>';
    }
    $output .= '</div>';
    wp_reset_postdata();
    return $output;
  }
}

add_shortcode('related_bargain', 'App\related_bargain');


/* Sidebar widget for retina image banner */

add_action( 'widgets_init', function() {
  register_widget( 'App\retina_banner' );
});

class retina_banner extends WP_Widget {
  function __construct() {
    parent::__construct(
      'retina_banner',
      __('Retina Banner Widget', 'retina_banner_domain'),
      array( 'description' => __( 'Retina Image Banner', 'retina_banner_domain' ))
    );
  }
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    $image1x = $instance['image1x'];
    $image2x = $instance['image2x'];
    $url = $instance['url'];
    $alt = $instance['alt'];

    echo $args['before_widget'];
    ?>
    <a href="<?php echo $url; ?>">
      <img src="<?php echo $image1x; ?>"
           srcset="<?php echo $image1x; ?> 1x, <?php echo $image2x; ?> 2x"
           class="w-100"
           alt="<?php echo $alt; ?>"
      />
    </a>
    <?php if( !empty( $title ) ) { ?>
    <p class="f6 tc mv1"><?php echo $title; ?>
    <?php } ?>
    <?php
    echo $args['after_widget'];
  }

  public function form( $instance ) {
    if( $instance ) {
      $title = isset($instance['title']) ? $instance['title'] : '';
      $image1x = isset($instance['image1x']) ? $instance['image1x'] : '';
      $image2x = isset($instance['image2x']) ? $instance['image2x'] : '';
      $url = isset($instance['url']) ? $instance['url'] : '';
      $alt = isset($instance['alt']) ? $instance['alt'] : '';
    } else {
      $title = '';
      $image1x = '';
      $image2x = '';
      $url = '';
      $alt= '';
    }
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' )?>"
             name="<?php echo $this->get_field_name( 'title' ); ?>"
             type="text"
             value="<?php echo esc_attr( $title ); ?>" />
    </p>    <p>
      <label for="<?php echo $this->get_field_id( 'image1x' ); ?>">Image 1x</label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'image1x' )?>"
             name="<?php echo $this->get_field_name( 'image1x' ); ?>"
             type="text"
             value="<?php echo esc_attr( $image1x ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'image2x' ); ?>">Image 2x</label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'image2x' )?>"
             name="<?php echo $this->get_field_name( 'image2x' ); ?>"
             type="text"
             value="<?php echo esc_attr( $image2x ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'url' ); ?>">URL</label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'url' )?>"
             name="<?php echo $this->get_field_name( 'url' ); ?>"
             type="text"
             value="<?php echo esc_attr( $url ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'alt' ); ?>">ALT</label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'alt' )?>"
             name="<?php echo $this->get_field_name( 'alt' ); ?>"
             type="text"
             value="<?php echo esc_attr( $alt ); ?>" />
    </p>
    <?php
  }

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) :'';
    $instance['image1x'] = ( !empty( $new_instance['image1x'] ) ) ? strip_tags( $new_instance['image1x'] ) :'';
    $instance['image2x'] = ( !empty( $new_instance['image2x'] ) ) ? strip_tags( $new_instance['image2x'] ) :'';
    $instance['url'] = ( !empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) :'';
    $instance['alt'] = ( !empty( $new_instance['alt'] ) ) ? strip_tags( $new_instance['alt'] ) :'';
    return $instance;
  }
}
