<?php

namespace App\Helpers;
use Request;
use App\Models\Log;

class LogActivity
{
    public static function addToLog($subject)
    {
    	$log = [];
    	$log['subject'] = $subject;
    	$log['url'] = Request::fullUrl();
    	$log['ip'] = Request::ip();
    	$log['agent'] = Request::header('user-agent');
    	$log['user_id'] =  auth()->check() ? auth()->user()->id : null;
    	Log::create($log);
    }

    public static function logActivityLists()
    {
    	return Log::latest()->get();
    }
}
