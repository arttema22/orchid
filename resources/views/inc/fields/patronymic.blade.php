<div class="form-floating mb-3">
    <input type="text" name="patronymic" class="form-control @if ($errors->get('patronymic')) is-invalid @endif"
        id="patronymic" placeholder="Отчество" value="{{old('patronymic')}}">
    <label for="patronymic">Отчество</label>
    @if ($errors->get('patronymic'))
    @foreach ($errors->get('patronymic') as $message)
    <div class="invalid-feedback">{{$message}}</div>
    @endforeach
    @endif
</div>
