<?php
use \Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::get('/', [\App\Controllers\MainController::class, 'index'])->name('index');
SimpleRouter::get('/second-chart-by-frequency', [\App\Controllers\MainController::class, 'getSecondChartByFrequencyInString'])->name('second-chart-by-frequency');
SimpleRouter::get('/is-pollyndrom', [\App\Controllers\MainController::class, 'isPollyndrom'])->name('is-pollyndrom');