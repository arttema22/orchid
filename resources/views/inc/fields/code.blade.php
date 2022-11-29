<div class="form-floating mb-3">
    <input type="text" name="code" data-tel-input class="form-control
                            @if ($errors->get('code')) is-invalid @endif" id="code" placeholder="Секретный код"
        value="{{old('code')}}">
    <label for="code">Секретный код</label>
    @if ($errors->get('code'))
    @foreach ($errors->get('code') as $message)
    <div class="invalid-feedback">{{$message}}</div>
    @endforeach
    @endif
</div>

{{-- <script>
    $(document).ready(function(){
  $('#code').inputmask('AAAAAAAA');
});
</script> --}}
