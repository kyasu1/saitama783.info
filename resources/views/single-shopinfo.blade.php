@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
  <article @php(post_class())>
    <header class="ph1 pt3 bb my-b--gold">
      @include('partials/entry-meta')
      <h1 class="entry-title ph1 f4 f2-ns b mb1 my-purple">{{ get_the_title() }}</h1>
    </header>
    <!-- コンテンツスタート -->
    {{-- <div class="flex flex-column"> --}}
    <div>
      <!-- 左側 -->

        <div class="entry-content lh-copy ph1 f5 f4-ns">
          @if($post->post_content=="")
            <p class="tc">記事を準備中</p>
          @else
            @php(the_content())
          @endif
        </div>
        <div class="tc" style="line-height: 0;">
          @php
          $noren = App\asset_path('images/00_noren.png');
          $blank = App\asset_path('images/blank.png');

          function boxed_image($image, $size, $default) {
            if ( get_field($image) ) {
              $id = get_field($image);
              $src = wp_get_attachment_image_src($id, 'full');
              $tag = wp_get_attachment_image( $id, $size, false, array( 'class' => 'h-auto' ));
              return sprintf('<a href="%s" data-lightbox="shopinfo-image">%s</a>', $src[0], $tag);
            } else {
              return sprintf('<img src="%s" class="h-auto">', $default);
            }
          }
          @endphp
          <div class="ba mb1 mh2-ns">
            {!! boxed_image('image-1', 'large', $noren) !!}
          </div>
          <div class="flex justify-between mh2-ns">
            <div class="w-33 ba">
              {!! boxed_image('image-2', 'medium', $blank) !!}
            </div>
            <div class="w-33 ba">
              {!! boxed_image('image-3', 'medium', $blank) !!}
            </div>
            <div class="w-33 ba">
              {!! boxed_image('image-4', 'medium', $blank) !!}
             </div>
          </div>
        </div>

      <!-- 右側 -->
      <div class="">
        <h2 class="shopinfo-h2 mh2">営業内容</h2>
        <div class="flex my-dark-blue">
          @php
          $contents = get_field('contents');
          @endphp
          @if ( $contents && in_array('pawn', $contents) )
            <div class="tc w-25">
              <p><i class="fa fa-handshake-o f1" aria-hidden="true"></i></p>
              <p class="f5 f4-ns b">質預り</p>
            </div>
          @endif
          @if ( $contents && in_array('buyout', $contents) )
            <div class="tc w-25">
              <p><i class="fa fa-balance-scale f1" aria-hidden="true"></i></p>
              <p class="f5 f4-ns b">買取り</p>
            </div>
          @endif
          @if ( $contents && in_array('shopping', $contents) )
            <div class="tc w-25">
              <p><i class="fa fa-shopping-bag f1" aria-hidden="true"></i></p>
              <p class="f5 f4-ns b">店頭販売</p>
            </div>
          @endif
          @if ( $contents && in_array('internet', $contents) )
            <div class="tc w-25">
              <p><i class="fa fa-laptop f1" aria-hidden="true"></i></p>
              <p class="f5 f4-ns b">通信販売</p>
            </div>
          @endif
        </div>
        <h2 class="shopinfo-h2 mh2">ショップ情報</h2>
        <div class="f5-ns ml3">
          <div class="flex pv2">
            <div class="w-30">営業時間</div>
            <div class="">{{ get_field('opening') }}</div>
          </div>

          <div class="flex pv2">
            <div class="w-30">定休日</div>
            <div class="">{{ get_field('closed') }}</div>
          </div>

          <div class="flex pv2">
            <div class="w-30">電話番号</div>
            <div class="">
              {!! App\mobile_tel(array( 'class' => 'my-purple b' ), get_field('tel')) !!}
            </div>
          </div>

          <div class="flex pv2">
            <div class="w-30">HP</div>
            <div class="">
              @if ( get_field('url') )
              <a href="{{ esc_url(get_field('url')) }}" target="_blank" class="link my-purple b">
                あり
              </a>
              @else
              なし
              @endif
            </div>
          </div>

          @if( get_field('lineid') )
          <div class="flex pv2">
            <div class="w-30">LINE</div>
            <div class="line-it-button" data-lang="ja" data-type="friend" data-lineid="{{ get_field('lineid') }}" data-home="true" style="display: none;"></div>
          </div>
          @endif
        </div>

        <h2 class="shopinfo-h2 mh2">所在地</h2>
        <div class="f5-ns ml3">
          <div class="pv2">〒{{ get_field('zip') }}</div>
          <div class="pv2">{{ get_field('address') }}</div>
          <div class="pv2">{!! do_shortcode( get_post_meta($post->ID, 'access', true)) !!}</div>
        </div>
        @php
        $location = get_field('location');
        $placeid = get_field('placeid');
        $address = get_field('address');
        $link = "https://www.google.co.jp/maps/search/?api=1&query_place_id=" . $placeid . "&query=" . $address;
        @endphp
        <div class="tc mh2-ns ba">
          <div id="map" style="height: 200px">地図が表示できません</div>
        </div>
        <div class="tr mv2 mh2">
          <a href={{ $link }} class="dib ba bw1 w-100 w5-l my-dark-blue pa2 link" target="_blank">
            <div class="tc dim b">Googleマップを開く</div>
          </a>
        </div>
        <script>
          function initMap() {
            // Create a map object and specify the DOM element for display.
            var lat = {{ $location['lat'] }};
            var lng = {{ $location['lng'] }};
            var title = '{{ get_the_title() }}';
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: lat, lng: lng },
              zoom: 16
            });

            var icon = '{{ App\asset_path('images/shichimaru_marker.png') }}';
            var image = {
                url: icon,
                size: new google.maps.Size(48, 48),
                origin: new google.maps.Point(0, 0),
                scaledSize: new google.maps.Size(48, 48),
            }
            var marker = new google.maps.Marker({
              position: {lat: lat, lng: lng },
              map: map,
              icon: image,
              title: title,
            })
          }
        </script>
      </div>
    </div>
    <div>
      <h2 class="shopinfo-h2 mh2">取扱品目</h2>
      <div class="flex flex-wrap shopinfo-items pl2 justify-center">
        @php
        $items = get_field('items');
        $icons = [
          'metals' => '01_金・プラチナ.png',
          'diamond' => '02_ダイヤモンド.png',
          'jewelry' => '03_ジュエリー.png',
          'silver' => '04_シルバー製品.png',
          'bags' => '05_バッグ・財布.png',
          'watch' => '06_時計.png',
          'camera' => '07_デジカメ.png',
          'tv' => '08_電化製品.png',
          'tools' => '09_電動工具.png',
          'pc' => '10_パソコン.png',
          'gadget' => '11_スマホ.png',
          'lighter' => '12_ライター.png',
          'sports' => '13_スポーツ用品.png',
          'instrumental' => '14_楽器.png',
          'japan' => '15_和服・毛皮.png',
          'wear' => '16_ブランド衣類.png',
          'ticket' => '17_金券.png',
          'stamp' => '18_切手.png',
          'coin' => '19_古銭.png',
          'book' => '20_本・DVD.png',
          'hobby' => '21_ホビー.png',
          'antique' => '22_アンティーク.png',
          'painting' => '23_絵画.png',
          'liquor' => '24_お酒.png',
        ]
        @endphp

        @foreach($items as $item)
        @php
          $icon = $icons[$item];
          $label = preg_replace("/.{4}$/", "", preg_replace("/^.{3}/", "", $icon));
          $src = 'images/icons/' . $icon;
          $src2 = preg_replace("/.{4}$/", "@2x.png", $src);
        @endphp
        <div class="tc w-25 w4-l">
          <div class="ph1">
            <p class="ba br2"><img class="w-24" src="@asset($src)" srcset="@asset($src) 1x, @asset($src2) 2x" alt="{{$label}}"></p>
          </div>
          <p class="f7 f4-ns b">{{ $label }}</p>
        </div>
        @endforeach
        @for($i = 0; $i < (4 - count($items) % 4) % 4 ; $i++)
        <div class="tc w-25 w4-l">
        </div>
        @endfor

      </div>
      {{-- アフィリエイト --}}
      @if( have_rows('rakuten') )
      <h2 class="shopinfo-h2 mh2">販売商品</h2>
      <div class="flex flex-wrap justify-around mh2-ns">
      @while( have_rows('rakuten') ) @php(the_row())
          <div class="" >
          {{ the_sub_field('afis') }}
          </div>
      @endwhile
      </div>
      @endif

    </div>
    <footer>
    @include('partials.sns')
    </footer>
  </article>
  @endwhile

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBITY0ctRdIhL4OKpOOorDbwxTcXUxBok&callback=initMap&language=ja&region=JP" async defer></script>
@endsection
