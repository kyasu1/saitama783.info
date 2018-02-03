<div class="fa5">
  <time class="updated" datetime="{{ get_the_modified_date('c') }}">{{ get_the_modified_date('Y.m.d') }}</time>&nbsp;更新
  <span "dn author" rel="author">{{ get_the_author() }}</span>
</div>
@php
/*
<p class="byline author vcard">
  {{ __('By', 'sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
    {{ get_the_author() }}
  </a>
</p>
*/
@endphp
