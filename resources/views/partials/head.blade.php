<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta property="fb:app_id"						 content="267055100035726" />
  <meta property="og:site_name"          content="{{ bloginfo('name') }}" />
  @if(is_single()) @if(have_posts()) @while(have_posts()) @php(the_post())
    <meta property="og:title"              content="{{ the_title() }}" />
    <meta property="og:description"        content="{{ mb_substr(get_the_excerpt(), 0, 100) }}" />
    <meta property="og:url"                content="{{ the_permalink() }}" />
	  <meta property="og:type"               content="article" />
    <meta property="og:image"              content="{{ the_post_thumbnail_url( 'full' ) }}" />
  @endwhile @endif @else
    <meta property="og:title"              content="{{ bloginfo('name' )}}" />
    <meta property="og:description"        content="{{ bloginfo('description') }}" />
    <meta property="og:url"                content="{{ bloginfo('url') }}" />
    <meta property="og:type"               content="website" />
  @endif
  @php(wp_head())
</head>
