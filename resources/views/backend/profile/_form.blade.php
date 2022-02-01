<div class="row">
    <div class="col-md-6 col-sms=-12">
        <div class="mb-3">
            <label class="mb-1" for="name">{{ __('Nama') }}</label>
            <input type="text" name="name" id="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}">
            @error('name')
            <small class="invalid-feedback" role="alert">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label class="mb-1" for="email">{{ __('Email') }}</label>
            <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email) }}" readonly>
                @error('email')
                <small class="invalid-feedback" role="alert">{{ $message }}</small>
                @enderror
        </div>
        <div class="mb-3">
            <label class="mb-1" for="phone_number">{{ __('No. Hp') }}</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control  @error('phone_number') is-invalid @enderror"
                value="{{ old('phone_number', $user->phone_number) }}">
                @error('phone_number')
                <small class="invalid-feedback" role="alert">{{ $message }}</small>
                @enderror
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="mb-3">
            <label class="mb-1" for="address">{{ __('Alamat') }}</label>
            <textarea name="address" id="address" cols="30" rows="4" class="form-control  @error('address') is-invalid @enderror"
                value="{{ old('phone_number', $user->phone_number) }}">{{ old('address', $user->address) }}</textarea>
                @error('address')
                <small class="invalid-feedback" role="alert">{{ $message }}</small>
                @enderror
        </div>
    </div>
</div>
