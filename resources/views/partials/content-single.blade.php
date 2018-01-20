<article @php(post_class())>
  <header class="ph1 pt3">
    @include('partials/entry-meta')
    <h1 class="entry-title ph1 f4 f2-ns b">{{ get_the_title() }}</h1>
  </header>
  @php
  $thumbnail_id = get_post_thumbnail_id();
  $eye_img = wp_get_attachment_image_src($thumbnail_id, 'full');
  @endphp
  <div class="tc ph1 ph5-m ph6-l">
    <img src="{{ $eye_img[0] }}" class="ba">
  </div>
  <div class="entry-content lh-copy ph1 f4 f3-ns">
    @php(the_content())
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
