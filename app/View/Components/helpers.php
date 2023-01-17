<?php

use Carbon\Carbon;

if (! function_exists('separator_func')) {
    function separator_func($created_time) {
        $now = Carbon::now()->toArray();
        $created_time = $created_time->toArray();

        $status = '';

        if ($now['year'] == $created_time['year'] and $now['month'] == $created_time['month']) {
            $diff = $now['day'] - $created_time['day'];
            if ($diff == 0) {
                $status = 'Today';
            }
            elseif ($diff == 1) {
                $status = 'Yesterday';
            }
        }
        return $status;
    }
}
