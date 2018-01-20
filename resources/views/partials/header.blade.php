<header class="banner">
  <div class="container">
    @if(is_home())
    <div class="box flex flex-column justify-between items-center">
      <div class="f4 mt5 mt7-ns white">
        <span>質という歴史を守るお店を紹介</span>
      </div>
      <div>
        <a href="{{ get_home_url() }}" class="link">
          <img src="<?= get_template_directory_uri(); ?>/../dist/images/flags.png">
        </a>
      </div>
      <div class="mb5 mb6-ns w-50-ns tc">
        <object id="main_title" data="<?= get_template_directory_uri(); ?>/../dist/images/main_header.svg"></object>
      </div>
    </div>
  </div>
  @else
    <div class="tc bg-black pv3">
      <div class="tc">
        <object class="w-90 w5-ns" id="main_title" data="<?= get_template_directory_uri(); ?>/../dist/images/main_header.svg"></object>
      </div>
    </div>
  @endif
</header>
