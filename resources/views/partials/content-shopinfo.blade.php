@php
$thumbnail_id = get_post_thumbnail_id();
$eye_img = wp_get_attachment_image_src($thumbnail_id, 'full');
@endphp
<article class="flex ph1">
  <a href="{{ the_permalink() }}" class="link">
    <div class="w4 w5-ns ba b--dark-blue" style="object-fit: contain">
      @if( get_field('image-1') )
        <img src="{{ get_field('image-1') }}" >
      @else
        <img src="{{ get_template_directory_uri() }}/../dist/images/00_noren.png">
      @endif
    </div>
  </a>
  <div class="w-100 ml1 ml2-ns">
    <div class="f4 f3-ns mv1 my-purple b">
      <a href="{{ the_permalink() }}" class="link my-purple">
        {{ the_title() }}
      </a>
    </div>
    <div class="f4-ns mv1">{{ get_field('access') }}</div>
    <p class="dn tr f6 f5-ns fw8"><time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date('Y.m.d') }}</time>&nbsp;更新</p>
  </div>
</article>
<hr class="my-bg-dark-blue">
