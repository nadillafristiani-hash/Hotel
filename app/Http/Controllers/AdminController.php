<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\Type;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminhome()
    {
        $reservation = Reservation::all();
        return view('admin.home', compact('reservation'));
    }

    public function room()
    {
        $room = Room::with('type')->get();

        return view('admin.room', compact('room'));
    }

    public function tambah()
    {
        $type = Type::all();

        return view('admin.tambah', compact('type'));
    }

    public function posttambah(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type_id' => 'required'
        ]);

        Room::create([
            'name' => $request->name,
            'type_id' => $request->type_id
        ]);

        return redirect()->route('rooma')->with('success', 'Room berhasil ditambahkan');
    }

    public function edit(Room $room)
    {
        $type = Type::all();

        return view('admin.edit', compact('room', 'type'));
    }

    public function postedit(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required',
            'type_id' => 'required'
        ]);

        $room->update([
            'name' => $request->name,
            'type_id' => $request->type_id
        ]);

        return redirect()->route('rooma')->with('success', 'Room berhasil diubah');
    }

    public function hapus(Room $room)
    {
        $room->delete();

        return redirect()->route('rooma')->with('success', 'Room berhasil dihapus');
    }

    public function poststatus(Request $request, Reservation $reservation)
    {
        $request->validate([
            'status' => 'required|in:terisi,kosong'
        ]);

        $reservation->update([
            'status' => $request->status
        ]);

        return redirect()->route('rooma')->with('success', 'Status berhasil diubah');
    }
}
