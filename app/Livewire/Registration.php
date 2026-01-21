<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;

class Registration extends Component
{
    use WithFileUploads;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $photo;

    public function render()
    {
        return view('livewire.registration');
    }

    // component lifecycle hooks
    public function updated($field)
    {
        $this->validateOnly($field,[
            'first_name' => 'required|min:2|max:25',
            'last_name' => 'required|min:2|max:25',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);
    }

    public function submit()
    {
        $this->validate([
            'first_name' => 'required|min:2|max:25',
            'last_name' => 'required|min:2|max:25',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data = [
            'name' => $this->first_name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => $this->password,
        ];
        User::create($data);

        session()->flash('success','User created successfully.');

        //file upload
        $this->photo->store('photos');

        //Reset form fiedls
        $this->reset(['first_name','last_name','email','password']);
    }

    public function redirectUsers()
    {
        redirect()->route('users.list');
    }
}
