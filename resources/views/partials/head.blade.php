<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta property="fb:app_id"						 content="267055100035726" />
	<meta property="og:url"                content="{{ get_permalink() }}" />
	<meta property="og:type"               content="article" />
	<meta property="og:title"              content="{{ get_the_title() }}" />
	<meta property="og:description"        content="{{ the_content() }}" />
	<meta property="og:image"              content="{{ the_post_thumbnail_url( 'full' ) }}" />
  @php(wp_head())
</head>
