<div class="container mt-4">
    <form action="{{ route('home') }}" method="GET">
        <div class="row">
            <div class="col-md-4">
                <label>Check-in</label>
                <input type="date" name="checkin" class="form-control"
                    value="{{ request('checkin') }}" required>
            </div>

            <div class="col-md-4">
                <label>Check-out</label>
                <input type="date" name="checkout" class="form-control"
                    value="{{ request('checkout') }}" required>
            </div>

            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">
                    Cari Kamar
                </button>
            </div>
        </div>
    </form>
</div>