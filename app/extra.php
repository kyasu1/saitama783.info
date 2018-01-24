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
function my_acf_google_map_api($api)
{
    $api['key'] = 'AIzaSyCBITY0ctRdIhL4OKpOOorDbwxTcXUxBok';
    return $api;
}

add_filter('acf/fields/google_map/api', 'App\my_acf_google_map_api');

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
// Short code for station tooltips
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
