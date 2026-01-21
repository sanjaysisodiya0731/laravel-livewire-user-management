<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    //For Edit
    public $userData;
    public $edit_id;
    public $first_name;
    public $last_name;
    public $email;
    public $isMove=false;

    public function render()
    {
        return view('livewire.edit-user');
    }

    public function updateUser()
    {
        $this->validate([
            'first_name' => 'required|min:2|max:25',
            'last_name' => 'required|min:2|max:25',
            'email' => 'required|email',
        ]);

        $data = [
            'name' => $this->first_name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
        ];

        User::where('id',$this->edit_id)->update($data);

        //for success message
        session()->flash('success','User update successfully');

        $this->isMove=true;
    }
}
