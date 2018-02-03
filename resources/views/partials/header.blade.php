@php
$head_upper = App\asset_path('images/head_upper.png');
$head_upper2 = App\asset_path('images/head_upper@2x.png');
$head_lower = App\asset_path('images/head_lower.png');
$head_lower2 = App\asset_path('images/head_lower@2x.png');
$upper = sprintf('<img src="%s" srcset="%s 1x, %s 2x" alt="埼玉質屋情報">',
    $head_upper, $head_upper, $head_upper2);
$lower = sprintf('<img src="%s" srcset="%s 1x, %s 2x" alt="埼玉県の質屋一覧">', $head_lower, $head_lower, $head_lower2);
@endphp
<header class="banner">
  <div class="container">
      <span class="dn entry-title">埼玉質屋情報</span>
    @if(is_front_page())
    <span class="dn updated">{{ get_the_modified_date('c') }}</span>
    <div class="box flex flex-column justify-between items-center">
      <div class="f4 mt5 white">
        <span>質という歴史を守るお店を紹介</span>
      </div>
      <div>
        <a href="{{ get_home_url() }}" class="link">
          <img src="@asset('images/flags.png')" style="max-height: 30vh; height: auto;">
        </a>
      </div>
      <div id="header-menu" class="w-100 bg-lg-black pv3 flex justify-center">
        <div class="tc" style="max-width: 400px; line-height: 0;" >
          <a class="link db" href="{{ home_url() }}">{!! $upper !!}</a>
          <a class="link db" href="{{ home_url( '/shopinfo' ) }}">{!! $lower !!}</a>
        </div>
      </div>
    </div>
    @else
    <div class="bg-lg-black pv3 flex justify-center">
      <div class="tc" style="max-width: 400px; line-height: 0;">
        <a class="link db" href="{{ home_url() }}">{!! $upper !!}</a>
        <a class="link db" href="{{ home_url( '/shopinfo' ) }}">{!! $lower !!}</a>
      </div>
    </div>
    @endif
  </div>
</header>
