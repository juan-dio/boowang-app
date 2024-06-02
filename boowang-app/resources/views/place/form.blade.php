<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="nama" class="form-label">{{ __('Nama') }}</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $place?->nama) }}" id="nama" placeholder="Nama">
            {!! $errors->first('nama', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="category_id" class="form-label">{{ __('Category') }}</label>
            <select class="form-select" name="category_id" id="category_id">
                @foreach ($categories as $category)
                    @if(old('category_id', $place?->category_id) == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->nama }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->nama }}</option>
                    @endif
                @endforeach
            </select>
            {!! $errors->first('category_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="alamat" class="form-label">{{ __('Alamat') }}</label>
            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $place?->alamat) }}" id="alamat" placeholder="Alamat">
            {!! $errors->first('alamat', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="gmaps_link" class="form-label">{{ __('Link Gmaps') }}</label>
            <input type="text" name="gmaps_link" class="form-control @error('gmaps_link') is-invalid @enderror" value="{{ old('gmaps_link', $place?->gmaps_link) }}" id="gmaps_link" placeholder="Link Gmaps">
            {!! $errors->first('gmaps_link', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="deskripsi" class="form-label">{{ __('Deskripsi') }}</label>
            <input id="deskripsi" value="{{ old('deskripsi', $place?->deskripsi) }}" type="hidden" name="deskripsi">
            <div class="form-control @error('deskripsi') is-invalid @enderror">
                <trix-editor input="deskripsi"></trix-editor>
            </div>
            {!! $errors->first('deskripsi', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="image" class="form-label">{{ __('Image') }}</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image">
            {!! $errors->first('image', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="harga_tiket" class="form-label">{{ __('Harga Tiket') }}</label>
            <input type="number" name="harga_tiket" class="form-control @error('harga_tiket') is-invalid @enderror" value="{{ old('harga_tiket', $place?->harga_tiket) }}" id="harga_tiket" placeholder="Harga Tiket">
            {!! $errors->first('harga_tiket', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="jam_buka" class="form-label">{{ __('Jam Buka') }}</label>
            <input type="text" name="jam_buka" class="form-control @error('jam_buka') is-invalid @enderror" value="{{ old('jam_buka', date("H:i", strtotime($place?->jam_buka))) }}" id="jam_buka" placeholder="Jam Buka">
            {!! $errors->first('jam_buka', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="jam_tutup" class="form-label">{{ __('Jam Tutup') }}</label>
            <input type="text" name="jam_tutup" class="form-control @error('jam_tutup') is-invalid @enderror" value="{{ old('jam_tutup', date("H:i", strtotime($place?->jam_tutup))) }}" id="jam_tutup" placeholder="Jam Tutup">
            {!! $errors->first('jam_tutup', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="jumlah_tiket_weekday" class="form-label">{{ __('Jumlah Tiket Weekday') }}</label>
            <input type="number" name="jumlah_tiket_weekday" class="form-control @error('jumlah_tiket_weekday') is-invalid @enderror" value="{{ old('jumlah_tiket_weekday', $place?->jumlah_tiket_weekday) }}" id="jumlah_tiket_weekday" placeholder="Jumlah Tiket Weekday">
            {!! $errors->first('jumlah_tiket_weekday', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="jumlah_tiket_weekend" class="form-label">{{ __('Jumlah Tiket Weekend') }}</label>
            <input type="number" name="jumlah_tiket_weekend" class="form-control @error('jumlah_tiket_weekend') is-invalid @enderror" value="{{ old('jumlah_tiket_weekend', $place?->jumlah_tiket_weekend) }}" id="jumlah_tiket_weekend" placeholder="Jumlah Tiket Weekend">
            {!! $errors->first('jumlah_tiket_weekend', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", (e) => {
            flatpickr("#jam_buka", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true
            });
            flatpickr("#jam_tutup", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true
            });
            document.addEventListener('trix-file-accept', function(e) {
                e.preventDefault();
            });
        });
</script>