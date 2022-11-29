<div class="form-floating mb-3">
    <input type="text" name="title" class="form-control @if ($errors->get('title')) is-invalid @endif" id="title"
        placeholder="Тема" value="{{old('title')}}">
    <label for="title">Тема</label>
    @if ($errors->get('title'))
    @foreach ($errors->get('title') as $message)
    <div class="invalid-feedback">{{$message}}</div>
    @endforeach
    @endif
</div>
