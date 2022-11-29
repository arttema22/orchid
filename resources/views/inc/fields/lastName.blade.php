<div class="form-floating mb-3">
    <input type="text" name="last_name" class="form-control @if ($errors->get('last_name')) is-invalid @endif"
        id="last_name" placeholder="Фамилия" value="{{old('last_name')}}">
    <label for="last_name">Фамилия</label>
    @if ($errors->get('last_name'))
    @foreach ($errors->get('last_name') as $message)
    <div class="invalid-feedback">{{$message}}</div>
    @endforeach
    @endif
</div>
