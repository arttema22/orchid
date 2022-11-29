<div class="form-floating mb-3">
    <input type="text" name="name" class="form-control
                            @if ($errors->get('name')) is-invalid @endif" id="name"
        placeholder="Наименование организации / ФИО для физического лица" value="{{old('name')}}">
    <label for="name">Наименование организации / ФИО для физического лица</label>
    @if ($errors->get('name'))
    @foreach ($errors->get('name') as $message)
    <div class="invalid-feedback">{{$message}}</div>
    @endforeach
    @endif
</div>
