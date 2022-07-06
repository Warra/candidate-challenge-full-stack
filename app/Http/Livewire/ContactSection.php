<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactSection extends Component
{
    public $email = '';

    public $mobile = '';

    public $message = '';

    public $saved = false;

    public $messageCount = 300;

    //remember not to reset this variable as it's passed in from the parent component
    public $listingId;

    protected $rules = [
        'email' => 'required|email',
        'mobile' => 'required|numeric|digits:10',
        'message' => 'required|max:300',
    ];

    public function mount($listingId)
    {
        $this->listingId = $listingId;
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
        $this->resetExcept('listingId');
    }

    public function render()
    {
        return view('livewire.contact-section');
    }
}
