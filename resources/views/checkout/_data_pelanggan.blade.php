<h4 class="mb-30">Informasi pelanggan @auth <a href="{{ route('edit.profile') }}" class="fal fa-user-edit icon"></a> @endauth</h4>
@auth
    <div class="cust-info mb-20">
        <div style="font-weight: 600;">
            {!! Auth()->user()->name ?? '<a href="edit-profile" class="text-danger">Nama harus diisi</a>' !!}
        </div>
        <div>
            {!! Auth()->user()->phone ?? '<a href="edit-profile" class="text-danger">Nomor telepon harus diisi</a>' !!}
            /
            {!! Auth()->user()->email ?? '<a href="edit-profile" class="text-danger">E-mail belum diisi</a>' !!}
        </div>
        <div>
            {!! $alamat->address ?? '<a href="edit-address" class="text-danger">Alamat belum diisi</a>' !!}
        </div>
    </div>
@endauth
@guest
    <input type="hidden" name="tanpa_login" value="1">
    <div class="row">
        <div class="form-group col-lg-12">
            <input type="text" required="" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap *">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-12">
            <input type="number" name="phone" required="" value="{{ old('phone') }}" placeholder="No Telp *">
        </div>
    </div>
@endguest
