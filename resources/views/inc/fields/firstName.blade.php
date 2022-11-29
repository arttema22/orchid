<div class="form-floating mb-3">
    <input type="text" name="first_name" class="form-control @if ($errors->get('first_name')) is-invalid @endif"
        id="first_name" placeholder="Имя" value="{{old('first_name')}}">
    <label for="first_name">Имя</label>
    @if ($errors->get('first_name'))
    @foreach ($errors->get('first_name') as $message)
    <div class="invalid-feedback">{{$message}}</div>
    @endforeach
    @endif
</div>
