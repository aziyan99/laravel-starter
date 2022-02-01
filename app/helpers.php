<?php

use Illuminate\Support\Facades\Gate;

if (!function_exists('adminOnly')) {
    function adminOnly()
    {
        if (!Gate::allows('update setting')) {
            abort(403);
        }
    }
}
