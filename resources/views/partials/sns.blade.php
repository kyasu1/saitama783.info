<div class="flex justify-center mb2">
    <div class="fb-like"
        data-href="{{ get_permalink() }}"
        data-layout="button"
        data-action="like"
        data-share="true"
        data-show-faces="false">
    </div>
    <div class="ph1">
        <a class="twitter-share-button" href="https://twitter.com/intent/tweet"></a>
    </div>
    <div class="line-it-button" data-lang="ja" data-type="share-a" data-url="{{ get_permalink() }}" style="display: none;"></div>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
</div>
