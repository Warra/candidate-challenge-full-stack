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
    public $messageCount;

    protected $rules = [
        'email' => 'required|email',
        'mobile' => 'required|numeric|digits:10',
        'message' => 'required|max:300',
    ];

    public function mount()
    {
        $this->email = '';
        $this->mobile = '';
        $this->message = '';
        $this->saved = false;
        $this->messageCount = 300;
    }

    public function updatedMessage()
    {
        $this->messageCount = 300 - strlen($this->message);
    }

    public function saveContact($listingId)
    {
        $this->validate();

        $contact = new Contact();
        $contact['listing_id'] = (int) $listingId;
        $contact['email'] = $this->email;
        $contact['mobile'] = $this->mobile;
        $contact['message'] = $this->message;
        $contact->save();

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
        $this->messageCount = 300;
    }

    public function render()
    {
        return view('livewire.contact-section');
    }
}
