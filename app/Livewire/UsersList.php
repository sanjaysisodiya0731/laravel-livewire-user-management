<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;
    public $usersList;

    //for edit users
    public $userData;
    public $userAction="add";

    public $edit_id;
    public $first_name;
    public $last_name;
    public $email;

    public function mount()
    {
        $this->usersList = User::select("*")->orderby('id','desc')->get();
    }

    public function render()
    {
        return view('livewire.users-list',[
            "users" => User::paginate(5),
        ]);
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        //Refresh list
        $this->mount();
    }

    public function editUser($id)
    {
        $this->userData = User::find($id);
        $this->userAction = "edit";
        $this->edit_id = $this->userData->id;
        $this->first_name = $this->userData->first_name;
        $this->last_name = $this->userData->last_name;
        $this->email = $this->userData->email;
    }

    public function redirectAddUser()
    {
        redirect()->to('registration');
    }
}
