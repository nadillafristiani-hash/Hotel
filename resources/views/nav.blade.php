<div class="nav bg-dark">
    <a href="" class="nav-link active text-white" aria-current="page">aaaaaaa</a>

    @if(Auth::user()->role == 'admin')
        <a href="{{ route('adminhome') }}" class="nav-link active text-white">home</a>
        <a href="{{ route('rooma') }}" class="nav-link active text-white">Room</a>
    @elseif(Auth::user()->role == 'customer')

        <a href="{{ route('home') }}" class="nav-link active text-white">home</a>
        <a href="{{ route('riwayat') }}" class="nav-link active text-white">Riwayat</a>
    @endif
    <form action="{{ route('logout') }}" method="GET" class="ms-auto">
        @csrf
        <button type="submit" class="nav-link active text-white">logout</button>

    </form>
</div>