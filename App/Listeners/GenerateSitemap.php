<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;
use samdark\sitemap\Sitemap;

class GenerateSitemap
{
    public function handle(Jigsaw $jigsaw)
    {
        $baseUrl = $jigsaw->getConfig('baseUrl');
        $sitemap = new Sitemap($jigsaw->getDestinationPath() . '/sitemap.xml');

        collect($jigsaw->getOutputPaths())
            ->push('/404.html') // Manually add the 404 page. If added automatically, the $path does not being with a /, so the URL is not correct.
            ->each(function ($path) use ($baseUrl, $sitemap) {
                if (! $this->isAsset($path)) {
                    $sitemap->addItem($baseUrl . $path, time(), Sitemap::DAILY);
                }
            });

        $sitemap->write();
    }

    public function isAsset($path)
    {
        return collect(['/css', '/img', '/js', '/CNAME', '404.html'])->contains(function ($value) use ($path) {
            return starts_with($path, $value);
        });
    }
}
