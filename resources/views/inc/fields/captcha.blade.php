<div class="form-floating mb-3">
    <input type="text" name="captcha" class="form-control @if ($errors->get('captcha')) is-invalid @endif" id="captcha"
        placeholder="Введите код">
    <label for="captcha">Введите код</label>
    @if ($errors->get('captcha'))
    @foreach ($errors->get('captcha') as $message)
    <div class="invalid-feedback">{{$message}}</div>
    @endforeach
    @endif
</div>
