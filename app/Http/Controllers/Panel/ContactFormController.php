<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ContactFormController extends Controller
{
    public function index():View
    {
        $contacts = ContactForm::query()->get();
        return \view('panel.contact_form.index',compact('contacts'));
    }

    public function show(ContactForm $contactForm):View
    {
        return \view('panel.contact_form.show',compact('contactForm'));
    }

    public function destroy(ContactForm $contactForm):RedirectResponse
    {
        try {
            $contactForm->delete();
            toast('Mesaj silme işlemi başarılı','success');
            return back();
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            toast('Mesaj silme işlemi sırasında hata oldu','error');
            return back();
        }
    }
}
