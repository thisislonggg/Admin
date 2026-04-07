<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class MetricaController extends Controller
{
    public function index(Request $request){
        if(view()->exists($request->path())){
            return view($request->path());
        }
        return view('errors.404');
    }
    public function showLeads()
{
    $leads = Lead::orderBy('created_at', 'desc')->get();
    return view('crm-leads', compact('leads'));
}
}
