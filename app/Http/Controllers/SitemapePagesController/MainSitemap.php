<?php

namespace App\Http\Controllers\SitemapePagesController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Model\Sitemap;

class MainSitemap extends BaseController
{
    public function index(){
       
        $sitemap = Sitemap::get();
        return response()->view('site.sitemap.SitemapMain',
        [
            'sitemap' => $sitemap
        ])
        ->header('Content-Type', 'text/xml');
    }
}
