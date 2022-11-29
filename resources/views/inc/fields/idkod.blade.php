<div class="form-floating mb-3">
    <input type="text" name="id_kod" class="form-control
                            @if ($errors->get('id_kod')) is-invalid @endif" id="id_kod"
        placeholder="Идентификационный номер обращения" value="{{old('id_kod')}}">
    <label for="id_kod">Идентификационный номер обращения</label>
    @if ($errors->get('id_kod'))
    @foreach ($errors->get('id_kod') as $message)
    <div class="invalid-feedback">{{$message}}</div>
    @endforeach
    @endif
</div>
