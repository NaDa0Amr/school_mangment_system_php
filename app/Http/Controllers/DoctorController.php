<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class DoctorController extends Controller
{
    function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', ['doctors' => $doctors]);
    }
    function create()
    {
        return view('doctors.create');
    }
    function store()
    {
        $data = request()->all();

        Doctor::create($data);

        return redirect('doctors');
    }
    function destroy(string $id)
    {
        if ($doctor = Doctor::find($id)) {
            $doctor->delete();
        }
        return redirect('doctors');
    }
    function edit(string $id)
    {
        $doctor = Doctor::find($id);
        return view('doctors.edit', ['doctor' => $doctor]);
    }
    function update(string $id)
    {
        $data = request()->all();
        if ($doctor = Doctor::find($id)) {
            $doctor->update($data);
        }
        return redirect('doctors');
    }
}
