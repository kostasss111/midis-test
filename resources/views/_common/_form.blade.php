<!DOCTYPE HTML>
<form action="/" method="POST">
    <div class="form-group">
        <label for="name">{{ __('formInputs.labelName') }}</label>
        <input class="form-control"
               placeholder="{{ __('formInputs.namePlaceholder') }}"
               name="name"
               value="{{ old('name') }}"
               type="text" required />
        <div class="text-danger">{{ $errors->first('name') }}</div>
    </div>
    <div class="form-group">
        <label for="email">{{ __('formInputs.labelEmail') }}</label>
        <input class="form-control"
               placeholder="{{ __('formInputs.emailPlaceholder') }}"
               name="email"
               value="{{ old('email') }}"
               type="email" required />
        <div class="text-danger">{{ $errors->first('email') }}</div>
    </div>
    <div class="form-group">
        <label for="email">{{ __('formInputs.labelUrl') }}</label>
        <input class="form-control"
               placeholder="{{ __('formInputs.urlPlaceholder') }}"
               name="url-link"
               value="{{ old('url-link') }}"
               type="text" />
    </div>
    <div class="form-group">
        <label for="message">{{ __('formInputs.labelMessage') }}</label>
        <textarea class="form-control"
                  rows="5"
                  placeholder="{{ __('formInputs.messagePlaceholder') }}"
                  name="message"
                  value="{{ old('message') }}"
                  cols="50" required ></textarea>
        <div class="text-danger">{{ $errors->first('message') }}</div>
    </div>
    <div class="form-group">
        {!! NoCaptcha::renderJs() !!}
        {!! NoCaptcha::display() !!}
        <span class="text-danger">
            {{ $errors->first('g-recaptcha-response') ? 
            __('formInputs.reCaptchaError') : ''  
            }}
        </span>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" 
               type="submit" 
               value="{{ __('formInputs.buttonAdd') }}" />
    </div>
    @csrf
</form>
<hr>

