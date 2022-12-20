<div class="form-floating mb-3">
    <input type="tel" name="phone" data-tel-input class="form-control
                            @if ($errors->get('phone')) is-invalid @endif" id="phone"
        placeholder="Контактный номер телефона" value="{{old('phone')}}">
    <label for="phone">Контактный номер телефона</label>
    @if ($errors->get('phone'))
    @foreach ($errors->get('phone') as $message)
    <div class="invalid-feedback">{{$message}}</div>
    @endforeach
    @endif
</div>

<script>
    $(document).ready(function(){
  $('#phone').inputmask('+7 (999) 999-99-99');
});
</script>
