<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Storage};
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
        // validasi
        $request->validate([
            'nama_tugas' => ['string', 'required', 'min:5', 'max:50'],
            'deskripsi' => ['required'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
        ]);

        // yang disimpan itu adalah :

        $simpan = [
            'task_title' => $request->nama_tugas,
            'desc' => $request->deskripsi,
            'user_id' => Auth::user()->id,
            'uuid' => Str::uuid(),
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

    public function show($param)
    {
        $data = Task::where('uuid', $param)->firstOrFail();

        return view('tasks.show', compact('data'));
    }

    public function edit(string $id)
    {
        return abort(404);
    }

    public function update(Request $request, $param)
    {
        // validasi
        $request->validate([
            'nama_tugas' => ['string', 'required', 'min:5', 'max:50'],
            'deskripsi' => ['required'],
            'image' => ['image', 'mimes:png,jpg,jpeg', 'max:2048'],
        ]);

        $data = Task::where('uuid', $param)->first();

        // yang disimpan itu adalah :

        $simpan = [
            'task_title' => $request->nama_tugas,
            'desc' => $request->deskripsi,
            'user_id' => Auth::user()->id,
            'uuid' => Str::uuid(),
        ];

        // berfungsi saat ada gambar baru saja
        if ($request->hasFile('image')) {
            // hapus gambar lama :
            if ($data->image_cover) {
                Storage::disk('public')->delete('tasks/'.$data->image_cover);
            }

            $gambar = $request->file('image');
            $ext = $gambar->getClientOriginalExtension();
            $nama = 'task_cover_'.now()->format('Ymdhis').'_'.uniqid().'.'.$ext;
            // task_cover_20261015105745_12345.jpg

            // nama yang dikirimkan ke database
            $simpan['image_cover'] = $nama;
            $gambar->storeAs('tasks', $nama, 'public');

        }

        $data->update($simpan);

        return redirect()->route('tasks.show', $data->uuid)
            ->with('success', 'Task has been updated');
    }

    public function destroy(string $id)
    {
        //
    }
}
