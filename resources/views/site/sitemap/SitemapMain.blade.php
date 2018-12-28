<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  @foreach ($sitemap as $post)
  <url>
  <loc>{{ $post->loc }}</loc>
  <lastmod>{{$post->created_at}}</lastmod>
  <changefreq>{{$post->changefreq}}</changefreq>
  <priority>{{$post->priority}}</priority>
  </url>
@endforeach

</sitemapindex>