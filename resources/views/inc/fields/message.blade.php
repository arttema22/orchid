<div class="form-floating mb-3">
    <textarea name="message" class="form-control @if ($errors->get('message')) is-invalid @endif" id="message"
        placeholder="Опишите вопрос (задачу)" rows="10" style="height:20vh;">{{old('message')}}</textarea>
    <label for="message">Опишите вопрос (задачу)</label>
    @if ($errors->get('message'))
    @foreach ($errors->get('message') as $message)
    <div class="invalid-feedback">{{$message}}</div>
    @endforeach
    @endif
</div>
