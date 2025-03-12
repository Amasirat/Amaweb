<?php

use App\Jobs\DeleteInactiveDrafts;

Schedule::call(function () {
    DeleteInactiveDrafts::dispatch();
})->weekly()->mondays()->at('1:00');
