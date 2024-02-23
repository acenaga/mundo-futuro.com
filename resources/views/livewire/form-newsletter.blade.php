<div>
    <form wire:submit="subscribe" class="row g-3">
        <div class="col">
            <label for="emal" class="visually-hidden">Suscrbirme</label>
            @if (session('status'))
                <div class="alert alert-success mb-3">
                    {{ session('status') }}
                </div>
            @endif
            <input wire:model="email" type="email" class="form-control" required id="emal" placeholder="jon@doe.cm">
            @error('email')
                <div class="alert alert-danger mt-3" role="alert">
                    <span class="error">{{ $message }}</span>
                </div>
            @enderror
        </div>
        <div class="col">
            <button
                type="submit"
                data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}"
                data-callback='handle'
                data-action='submit'
                class="g-recaptcha btn bg-primary-blue mb-3 text-white">Suscribirme</button>
        </div>
        <script src="https://www.google.com/recaptcha/api.js?render={{env('GOOGLE_RECAPTCHA_SITE_KEY')}}"></script>
    <script>
        function handle(e) {
            grecaptcha.ready(function () {
                grecaptcha.execute('{{env('GOOGLE_RECAPTCHA_SITE_KEY')}}', {action: 'submit'})
                    .then(function (token) {
                        @this.set('captcha', token);
                    });
            })
        }
    </script>
    </form>
</div>
