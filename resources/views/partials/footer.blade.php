<footer class="content-info">
  <div class="container">
{{--    @php(dynamic_sidebar('sidebar-footer')) --}}
    <div class="ph1 ph4-m ph6-l pv2 lh-copy my-bg-gold white">
      <div class="tc tr-l f3">
        <a href="{{ get_home_url() }}" class="link white">
          埼玉県質屋組合連合会
        </a>
      </div>
      <div class="tc tr-l">埼玉県さいたま市大宮区宮町1-47</div>
      <div class="tc tr-l">{!! App\mobile_tel(array( 'class' => 'link white'), '048-641-1738' ) !!}</div>
      <div class="tc f7">Copyright (c) kyasu1 All Rights Reserved.</div>
    </div>
  </div>

  <a href="javascript:void(0);" id="scroll" title="Scroll to Top"><span></span></a>
  <div id="fb-root"></div>
  <script>
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.async = true;
      js.src = 'https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.11&appId=267055100035726&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  </script>
  <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
  <script type="text/javascript" async src="//platform.twitter.com/widgets.js"></script>

</footer>
