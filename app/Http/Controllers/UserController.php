<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home(Request $request)
    {
        if ($request->checkin && $request->checkout) {

            $kamarTerisi = Reservation::where('status', 'terisi')
                ->where('checkin', '<', $request->checkout)
                ->where('checkout', '>', $request->checkin)
                ->pluck('room_id')->toArray();

            $type = Type::with(['room' => function ($query) use ($kamarTerisi) {
                $query->whereNotIn('id', $kamarTerisi);
            }])->get();
        } else {
            $type = Type::with('room')->get();
        }

        return view('user.home', compact('type'));
    }

    public function ditel(Request $request, Room $room)
    {
        return view('user.ditel', compact('room'));
    }

    public function reservasi(Request $request, Room $room)
    {
        $request->validate([
            'checkin' => 'required|date',
            'checkout' => 'required|date|after:checkin',
        ]);

        $type = Type::findOrFail($room->type_id);

        $checkin = $request->checkin;
        $checkout = $request->checkout;

        $sudahDipesan = Reservation::where('room_id', $room->id)
            ->where('status', 'terisi')
            ->where('checkin', '<', $checkout)
            ->where('checkout', '>', $checkin)
            ->exists();

        return view('user.reservasi', compact(
            'room',
            'type',
            'checkin',
            'checkout',
            'sudahDipesan'
        ));
    }

    public function booking(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'no_identitas' => 'required',
            'alamat' => 'required',
            'room_id' => 'required',
            'checkin' => 'required|date',
            'checkout' => 'required|date|after:checkin',
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'no_identitas' => $request->no_identitas,
            'alamat' => $request->alamat,
        ]);

        $room = Room::with('type')->findOrFail($request->room_id);

        $lama = strtotime($request->checkout) - strtotime($request->checkin);
        $hari = $lama / (60 * 60 * 24);

        $total = $room->type->harga * $hari;

        Reservation::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'customer_id' => $customer->id,
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
            'total_harga' => $total,
            'status' => 'terisi',
        ]);

        return redirect()->route('riwayat')->with('success', 'Booking berhasil!');
    }

    public function riwayat()
    {
        $reservations = Reservation::with(['room', 'customer'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.riwayat', compact('reservations'));
    }
}
