<?php

namespace App\Livewire;

use App\Models\Newsletter;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormNewsletter extends Component
{
    public $email;
    public $captcha = 0;

    public function updatedCaptcha($token)
    {
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . env('GOOGLE_RECAPTCHA_SECRET_KEY') . '&response=' . $token);
        $this->captcha = $response->json()['score'];
        if (!$this->captcha > .3) {
            $this->subscribe();
        } else {
            return session()->flash('success', 'Google thinks you are a bot, please refresh and try again');
        }
    }

    public function subscribe()
    {
        $this->validate(['email' => 'required|email|unique:newsletters,email']);
        Newsletter::create(['email' => $this->email]);
        $this->reset();
        session()->flash('status', '¡Gracias por unirte a la familia de Mundo Futuro!');
    }
    public function render()
    {
        return view('livewire.form-newsletter');
    }
}
