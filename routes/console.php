<?php

use Illuminate\Support\Facades\Schedule;
// Daily
Schedule::command('backup:run --only-db')->daily()->at('01:30');

// Weekly
Schedule::command('backup:run')->weeklyOn(0, '04:00');
