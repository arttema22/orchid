<div class="form-floating mb-3">
    <input type="text" name="address" class="form-control
                            @if ($errors->get('address')) is-invalid @endif" id="address" placeholder="Адрес объекта"
        value="{{old('address')}}">
    <label for="name">Адрес объекта</label>
    @if ($errors->get('address'))
    @foreach ($errors->get('address') as $message)
    <div class="invalid-feedback">{{$message}}</div>
    @endforeach
    @endif
</div>
