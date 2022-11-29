<div class="form-check mb-3">
    <input type="checkbox" name="agree-rule" class="form-check-input @if ($errors->get('agree-rule')) is-invalid @endif"
        id="agree-rule">
    <label class="form-check-label" for="agree-rule">
        Я ознакомлен и согласен с <a data-bs-toggle="offcanvas" href="#offcanvas" role="button"
            aria-controls="offcanvas">
            правилами
        </a>
    </label>
    @if ($errors->get('agree-rule'))
    @foreach ($errors->get('agree-rule') as $message)
    <div class="invalid-feedback">{{$message}}</div>
    @endforeach
    @endif
</div>
@include('inc.widgets.rule_offcanvas')
