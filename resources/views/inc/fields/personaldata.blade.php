<div class="form-check mb-3">
    <input type="checkbox" name="personal-date"
        class="form-check-input @if ($errors->get('personal-date')) is-invalid @endif" id="personal-date">
    <label class="form-check-label" for="personal-date">
        Даю согласие на обработку персональных данных
    </label>
    @if ($errors->get('personal-date'))
    @foreach ($errors->get('personal-date') as $message)
    <div class="invalid-feedback">{{$message}}</div>
    @endforeach
    @endif
</div>
