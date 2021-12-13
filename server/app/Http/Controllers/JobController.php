<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function list() {
        return Job::orderBy('id', 'desc')->get();
    }

    public function view($id) {
        $job = Job::find($id);
        return $job;
    }

    public function create(Request $request) {
        $newJobData = json_decode($request->getContent());

        $newJob = new Job();
        
        $newJob->linguaggiodiprogrammazione = $newJobData->linguaggiodiprogrammazione;
        $newJob->fotolinguaggio = $newJobData->fotolinguaggio;
        $newJob->aziendaofferente = $newJobData->aziendaofferente;
        $newJob->ral = $newJobData->ral;
        $newJob->livellodiesperienza = $newJobData->livellodiesperienza;
        $newJob->location = $newJobData->location;
        $newJob->descrizione = $newJobData->descrizione;

        $newJob->save();
        return $newJob;
    }

    public function edit(Request $request, $id) {
        $job = Job::find($id);
        $newJobData = json_decode($request->getContent());

        $job->linguaggiodiprogrammazione = $newJobData->linguaggiodiprogrammazione;
        $job->fotolinguaggio = $newJobData->fotolinguaggio;
        $job->aziendaofferente = $newJobData->aziendaofferente;
        $job->ral = $newJobData->ral;
        $job->livellodiesperienza = $newJobData->livellodiesperienza;
        $job->location = $newJobData->location;
        $job->descrizione = $newJobData->descrizione;

        $job->save();
        return $job;
    }

    public function delete(Request $request, $id) {
        $job = Job::where("id", $id)->delete();
        return $job;
    }
}
