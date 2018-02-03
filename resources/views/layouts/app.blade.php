<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
  <body @php(body_class())>
    @php(do_action('get_header'))
    @include('partials.header')
    <div class="wrap container" role="document">
      <div class="content ph3-m ph5-l center mt3 mw8-ns flex flex-column flex-row-l">
        <main class="main flex-auto w-100">
          @yield('content')
        </main>
        {{-- @if (App\display_sidebar()) --}}
        <aside class="sidebar ph2 h-100 sticky" style="flex-basis: 16rem; flex-shrink: 0; flex-grow: 0;">
          @include('partials.sidebar')
        </aside>
        {{-- @endif --}}
      </div>
    </div>
    @php(do_action('get_footer'))
    @include('partials.footer')
    @php(wp_footer())
  </body>
</html>
