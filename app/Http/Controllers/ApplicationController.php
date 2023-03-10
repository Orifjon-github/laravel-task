<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Jobs\SendEmailJob;
use App\Mail\ApplicationCreated;
use App\Models\Application;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{

    public function index() {

        return view('applications.index')->with([
            'applications' => auth()->user()->applications()->latest()->paginate(3),
        ]);
    }

    public function store(StoreApplicationRequest $request) {

        if ($this->checkDate()){
            return redirect('dashboard')->with('error', 'You can create one Application a day');
        }

        if ($request->hasFile('file')) {
            $name = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs('files', $name, 'public');
        }

        $application = Application::create([
            'user_id' => auth()->user()->id,
            'subject' => $request->subject,
            'message' => $request->message,
            'file_url' => $path ?? null
        ]);

        dispatch(new SendEmailJob($application));

        return redirect('/dashboard')->with('create', 'Application Create Successfully');
    }

    protected function checkDate() {

        $last_application = auth()->user()->applications()->latest()->first();
        $last_app_date = Carbon::parse($last_application->created_at)->format('Y-m-d');
        $today = Carbon::now()->format('Y-m-d');

        if (is_null($last_application)) {
            return false;
        }
        elseif ($last_app_date == $today) {
            return true;
        }

        return false;

    }

}
