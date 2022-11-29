<div class="bg-white rounded shadow-sm p-4 py-4 d-flex flex-column">
    <div class="d-block m-0">
        <div class="card rounded w-100 mb-2">
            <div class="card-body">
                <h5 class="card-title">Дать ответ</h5>
                <p class="card-text">
                    <textarea name="message" class="form-control mw-100 @if ($errors->get('message')) is-invalid @endif"
                        id="message" rows="10">
                        @if ($draft != null){{$draft->message}}@endif
                        </textarea>
                    @if ($errors->get('message'))
                    @foreach ($errors->get('message') as $message)
                <div class="invalid-feedback">{{$message}}</div>
                @endforeach
                @endif
                </p>
                <a href="#" class="btn btn-primary d-inline">Кнопка</a>
                <a href="#" class="btn btn-primary d-inline">Перейти куда-нибудь</a>
            </div>
        </div>
    </div>
</div>
