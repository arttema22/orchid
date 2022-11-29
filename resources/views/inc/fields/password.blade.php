<div class="form-floating mb-3">
    <input type="password" name="password" class="form-control @if ($errors->get('password')) is-invalid @endif"
        id="password" placeholder="Пароль" value="{{old('password')}}">
    <label for="first_name">Пароль</label>
    @if ($errors->get('password'))
    @foreach ($errors->get('password') as $message)
    <div class="invalid-feedback">{{$message}}</div>
    @endforeach
    @endif
</div>
