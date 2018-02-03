<article @php(post_class())>
  <header class="ph1 pt3">
    @include('partials/entry-meta')
    <h1 class="entry-title ph1 f4 f2-ns b">{{ get_the_title() }}</h1>
  </header>
  <!--
  <div class="tc ph1 ph5-m ph6-l">
    {{ the_post_thumbnail( 'large', array( 'class' => 'ba h-auto')) }}
  </div>
  -->
  <div class="entry-content lh-copy ph1 f5 f4-ns">
    @php(the_content())
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
