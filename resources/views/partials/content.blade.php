@php
/*
<article @php(post_class())>
  <header>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
    @include('partials/entry-meta')
  </header>
  <div class="entry-summary">
    @php(the_excerpt())
  </div>
</article>
*/
@endphp
@php
  $thumbnail_id = get_post_thumbnail_id();
  $eye_img = wp_get_attachment_image_src($thumbnail_id, 'full');
@endphp
<article class="flex">
  <a href="{{ the_permalink() }}" class="link">
    <div class="w4 w5-ns">
      <img src={{ $eye_img[0] }} >
    </div>
  </a>
  <div class="w-100 ml1">
    <div class="pv1"><a href="{{ the_permalink() }}" class="link f5 black">{{ the_title() }}</a></div>
    <div class="tr f6 fw8 pv1"><time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date('Y.m.d') }}</time>&nbsp;更新</div>
  </div>
</article>
<hr class="my-bg-dark-blue">
