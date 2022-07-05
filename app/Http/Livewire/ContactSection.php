<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactSection extends Component
{
    public $email;
    public $mobile;
    public $message;
    public $listingId;
    public $saved;

    public function mount()
    {
        $this->email = '';
        $this->mobile = '';
        $this->message = '';
        $this->saved = false;
    }

    public function saveContact($listingId)
    {
        // $contact = new Contact();
        // $contact['listing_id'] = (int) $listingId;
        // $contact['email'] = $this->email;
        // $contact['mobile'] = $this->mobile;
        // $contact['message'] = $this->message;
        // $contact->save();

        $this->saved = true;
    }

    public function redirectToHome()
    {
        return redirect()->to('/');
    }

    public function closeModal()
    {
        $this->email = '';
        $this->mobile = '';
        $this->message = '';
        $this->saved = false;
    }

    public function render()
    {
        return view('livewire.contact-section');
    }
}
