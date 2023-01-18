<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerStoreRequest;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AnswerController extends Controller
{

    public function create(Application $application) {
        return view('answers.create', ['application' => $application]);
    }

    public function store(Application $application, AnswerStoreRequest $request) {

        $application->answer()->create([
            'body' => $request->body,
        ]);
        return redirect('dashboard');
    }
}
