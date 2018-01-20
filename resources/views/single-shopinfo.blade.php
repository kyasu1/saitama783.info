@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
  <article @php(post_class())>
    <header class="ph1 pt3 bb my-b--gold">
      @include('partials/entry-meta')
      <h1 class="entry-title ph1 f4 f2-ns b mb1">{{ get_the_title() }}</h1>
    </header>
    <!-- コンテンツスタート -->
    <div class="flex flex-column flex-row-l">
      <!-- 左側 -->
      <div class="w-50-l ph4-l">
        <div class="entry-content lh-copy ph1 f4 f3-ns">
          @if($post->post_content=="")
            <p class="tc">記事を準備中</p>
          @else
            @php(the_content())
          @endif
        </div>
        <div class="tc">
          <div>
          @php
          $noren = get_template_directory_uri()."/../dist/images/00_noren.png";
          $image1 = ( get_field('image-1') ? get_field('image-1') : $noren );
          $image2 = ( get_field('image-2') ? get_field('image-2') : $noren );
          $image3 = ( get_field('image-3') ? get_field('image-3') : $noren );
          $image4 = ( get_field('image-4') ? get_field('image-4') : $noren );
          @endphp
            <img src="{{ $image1 }}" class="ba w-100" >
          </div>
          <div class="flex justify-between">
            <div class="w-33 ba">
              <img src="{{ $image2 }}">
            </div>
            <div class="w-33 ba">
              <img src="{{ $image3 }}">
            </div>
            <div class="w-33 ba">
              <img src="{{ $image4 }}">
            </div>
          </div>
        </div>
      </div>
      <!-- 右側 -->
      <div class="w-50-l ph4-l">
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
              <a href="tel://{{ get_field('tel')}}" class="link my-purple b">
                {{ get_field('tel') }}
              </a>
            </div>
          </div>

          <div class="flex pv2">
            <div class="w-30">HP</div>
            <div class="">
              @if ( get_field('url') )
              <a href="{{ get_field('url') }}" target="_blank" class="link my-purple b">
                あり
              </a>
              @else
              なし
              @endif
            </div>
          </div>
        </div>

        <h2 class="shopinfo-h2 mh2">所在地</h2>
        <div class="f5-ns ml3">
          <div class="pv2">〒{{ get_field('zip') }}</div>
          <div class="pv2">{{ get_field('address') }}</div>
        </div>
        @php
        $location = get_field('map');
        @endphp
        <div class="tc">
          <div id="map" style="height: 200px">地図が表示できません</div>
        </div>
        <script>
          function initMap() {
            // Create a map object and specify the DOM element for display.
            var lat = {{ $location['lat'] }};
            var lng = {{ $location['lng'] }};
            var title = '{{ get_the_title() }}';
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: lat, lng: lng },
              zoom: 12
            });

            var image = '';
            var marker = new google.maps.Marker({
              position: {lat: lat, lng: lng },
              map: map,
              title: title,
//              icon: image,
            })
          }
        </script>
      </div>
    </div>
    <div>
      <h2 class="shopinfo-h2 mh2">取扱品目</h2>
      <div class="flex flex-wrap shopinfo-items pl2">
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
          $label = preg_replace("/.{4}$/", "", preg_replace("/^.{3}/", "", $icons[$item]))
        @endphp
        <div class="tc w-25 w4-l">
          <div class="ph1">
            <p class="ba br2"><img class="w-24" src="{{ get_template_directory_uri() }}/../dist/images/icons/{{ $icon }}"></p>
          </div>
          <p class="f7 f4-ns b">{{ $label }}</p>
        </div>
        @endforeach

      </div>
    </div>
    <footer>
      {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
    </footer>
  </article>
  @endwhile
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBITY0ctRdIhL4OKpOOorDbwxTcXUxBok&callback=initMap&language=ja&region=JP" async defer></script>
@endsection
