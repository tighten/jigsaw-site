<?php

use App\Listeners\GenerateSitemap;
use Torchlight\Jigsaw\TorchlightExtension;

$events->afterBuild(GenerateSitemap::class);

TorchlightExtension::make($container, $events)->boot();
