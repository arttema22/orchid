<div class="form-floating mb-3">
    <input type="text" name="ls" class="form-control
                            @if ($errors->get('ls')) is-invalid @endif" id="ls" placeholder="Лицевой счет"
        value="{{old('ls')}}">
    <label for="ls">Лицевой счет</label>
    @if ($errors->get('ls'))
    @foreach ($errors->get('ls') as $message)
    <div class="invalid-feedback">{{$message}}</div>
    @endforeach
    @endif
</div>

<script>
    $(document).ready(function(){
  $('#ls').inputmask('9999999999');
});
</script>
