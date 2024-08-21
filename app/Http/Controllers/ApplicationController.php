<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function add_application(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'surname' => 'required|string|min:3',
            'phone' => 'required|integer',
            'email' => 'required|string|email',
            'text' => 'required|string'
        ]);

        $applicationData = $request->all();

        $application = new Application();
        $application->name = $applicationData['name'];
        $application->surname = $applicationData['surname'];
        $application->phone = $applicationData['phone'];
        $application->email = $applicationData['email'];
        $application->application = $applicationData['text'];
        $application->status_id = 1;

        $application->save();

        return back()->with('success', 'Сообщение успешно отправлено!');
    }

    public function edit_application(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'surname' => 'required|string|min:3',
            'phone' => 'required|integer',
            'email' => 'required|string|email',
            'text' => 'required|string'
        ]);

        $applicationData = $request->all();

        $application = Application::find($id);
        $application->name = $applicationData['name'];
        $application->surname = $applicationData['surname'];
        $application->phone = $applicationData['phone'];
        $application->email = $applicationData['email'];
        $application->application = $applicationData['text'];
        $application->status_id = $applicationData['status'];

        $application->save();

        return back()->with('success', 'Изменения успешно внесены!');

    }

    public function delete_application($id)
    {

        Application::find($id)->delete();

        return redirect()->back();

    }
}
