@php(dynamic_sidebar('sidebar-primary'))

<div class="">
    <h4 class="ba my-bg-dark-blue f4 tc pv1 mt1 mb2 dim">
      <a href="{{ home_url('history') }}" class="dib link white">埼質連の歴史</a>
    </h4>

    <div class="ba">
        <h3 class="bb my-b--dark-blue f4 tc pv1 mv0 my-purple">
          エリア検索
        </h3>
        @php
        $areas = get_terms( array(
          'taxonomy' => 'area',
          'hide_empty' => false,
        ));
        @endphp
        @foreach( $areas as $key => $area)
        @php
            $bb = $key + 1 < count($areas) ? 'bb' : '';
        @endphp
        <a href="{{ home_url('shopinfo#' . $area->slug)}}" class="db link my-dark-blue">
            <h4 class="ph2 mv0 pv2 {{ $bb }} b--white my-bg-dark-blue white dim">
            {{ preg_replace("/^.{3}/", "", $area->name) }}
            </h4>
        </a>
        @endforeach
    </div>

    <div class="ba mv3">
        <h3 class="bb my-b--dark-blue f4 tc pv1 mv0 my-purple">
          リンク
        </h3>
        <div class="tc">
          <div class="pa1 bb">
            <a class="dib link dim-ns" href="https://www.shichimaru.com" target="_blank">
              <img class="w-100" src="@asset('images/link_01.png')" title="しちまる公式ホームページ">
            </a>
            <p class="f6">質屋のマスコットキャラクター<BR>しちまるの公式ホームページ</p>
          </div>
          <div class="pa1">
            <a class="dib link dim-ns" href="http://www.zenshichi.gr.jp" target="_blank">
              <img class="w-100" src="@asset('images/link_02.png')" title="全国質屋組合連合会">
            </a>
            <p class="f6">全国の質屋さんの情報はこちら<BR>全国質屋組合連合会のページ</p>
          </div>
        </div>
    </div>

</div>
