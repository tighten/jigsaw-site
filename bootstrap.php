<?php

use App\Listeners\GenerateSitemap;

$events->afterBuild(GenerateSitemap::class);
