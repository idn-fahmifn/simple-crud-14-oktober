<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\Task;

class TaskController extends Controller
{
    
    public function index()
    {
        $tasks = Task::paginate(8);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return abort(404);
    }

    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'nama_tugas' => ['string', 'required', 'min:5', 'max:50'],
            'deskripsi' => ['required'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048']
        ]);

        // yang disimpan itu adalah : 

        $simpan = [
            'task_title' => $request->nama_tugas,
            'desc' => $request->deskripsi,
            'user_id' => Auth::user()->id,
            'uuid' => Str::uuid()
        ];

        $gambar = $request->file('image');
        $ext = $gambar->getClientOriginalExtension();
        $nama = 'task_cover_'.now()->format('Ymdhis').'_'.uniqid().'.'.$ext;
        // task_cover_20261015105745_12345.jpg

        // nama yang dikirimkan ke database
        $simpan['image_cover'] = $nama;
        $gambar->storeAs('tasks', $nama, 'public');

        Task::create($simpan);
        return back()->with('success', 'Task has been created');

    }

    /**
     * Display the specified resource.
     */
    public function show($param)
    {
        $data = Task::where('uuid', $param)->firstOrFail();
        return view('tasks.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
