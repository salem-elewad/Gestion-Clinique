<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('backend.services.index-service', compact('services'));
    }

    public function create()
    {
        return view('backend.services.create-service');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_service' => 'required|string|max:255',
        ]);

        Service::create($request->all());

        return Redirect::to('services')->with('success', 'La service a été ajouté avec succés.');

    }

    public function show(Service $service)
    {
        return view('backend.services.show-service', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('backend.services.edit-service', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'nom_service' => 'required|string|max:255',
        ]);

        $service->update($request->all());

       return Redirect::to('services')->with('success', 'La service a été modifié avec succés');

    }

    public function destroy(Service $service)
    {
        $service->delete();

       return Redirect::to('services')->with('success', 'La service a été supprimé avec succés');
    }
}
