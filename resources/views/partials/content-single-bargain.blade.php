<article @php(post_class())>
  <header class="ph2 pt3">
    @include('partials/entry-meta')
    <h1>チラシ掲載商品</h1>
  </header>
  <h2 class="entry-title ph2 f4 f3-ns b my-purple">{{ get_the_title() }}</h2>
  <div class="tc ph5-m ph6-l">
  @php
  $id = get_field('image');
  $src = wp_get_attachment_image_src($id, 'full');
  $tag = wp_get_attachment_image( $id, 'large', false, array( 'class' => 'h-auto' ));
  @endphp
  <a href="{!! $src[0] !!}" data-lightbox="shopinfo-image">{!! $tag !!}</a>
  </div>

  <div class="entry-content lh-copy ph2 f5 f4-ns">
    @php(the_content())
  </div>
  <div class="ph2">
    <p>{{ get_field('rank') }}</p>
    <p><span class="red b">￥{{ number_format(get_field('price')) }}</span>&nbsp;<a href="{{ get_field('url') }}">({{ get_field('tenpo') }})</a>
  </div>
  <hr>
  <div class="ph2">
      <p>お買い得商品満載！早い者勝ち！見逃せない！！</p>
      <p>初日のみ、商品購入権利券を発行いたします。(23日・24日・25日は発行いたしません）</p>
      <p>●配布日時：2018年3月22日(木)AM9:45～</p>
      <p>●配布場所：1Fコルソ通りエスカレーター前</p>
      <p>(注)商品購入権利券の有効期限は　<span class="red b">当日3/22午前11時まで</span>　となります。</p>
  </div>
  <hr>
  {!! App\related_bargain( array(
      'year' => '2018',
      'number' => 6,
      'orderby' => 'rand',
      'exclude' => array( get_the_ID() ),
  ))
  !!}
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
