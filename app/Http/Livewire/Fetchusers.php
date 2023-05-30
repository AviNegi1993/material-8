<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;


class Fetchusers extends Component
{
    use WithPagination, WithFileUploads;
    protected $records;
    public $userId;
    public $user;
    public $formMode = false;
    public $listMode = true;
    public $name;
    public $email;
    public $phone;
    public $location;
    public $about;
    public $password;
    public $password_confirmation;
    public $image;
    public $formTitle = 'Add User';

    protected function rules()
    {
        return [
            'name'       => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users,email,' . $this->userId,
            'image'      => 'image|mimes:jpg,jpeg,png,svg,gif|max:3072', 
            'password'   => [
                Rule::requiredIf($this->userId == null),
                'confirmed'
            ]
        ];
    }


    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|mimes:jpg,jpeg,png,svg,gif', 

        ]);
    }
    public function fetchbyid()
    {
        $this->records = User::where('id', $this->userId)->first();
    }

    public function resetUser()
    {
        $this->name = $this->email = $this->location = $this->about = $this->phone = $this->password = $this->password_confirmation = '';
    }

    public function addUser()
    {
        self::resetUser();
        $this->userId    = null;
        $this->formTitle = 'Add User';
        $this->listMode  = false;
        $this->formMode  = true;
    }

    public function editUser($id)
    {
        self::resetUser();
        $this->formTitle  = 'Update User';
        $this->userId     = $id;
        $this->formMode   = true;
        $this->listMode   = false;
        $this->user       = User::find($id);
        $this->name       = $this->user->name;
        $this->email      = $this->user->email;
        $this->location   = $this->user->location;
        $this->about      = $this->user->about;
        $this->phone      = $this->user->phone;
        // $this->image      = $this->user->image;
    }

    public function submit()
    {
        $validatedData = $this->validate();
        $userData      = [
            'name'     => $this->name,
            'phone'    => $this->phone,
            'about'    => $this->about,
            'location' => $this->location
        ];

        if($this->password) {
            $userData['password'] = Hash::make($this->password);
        }
       
        if($this->image) {
            $imageName = $this->image->store('photo');
            $userData['image'] = $imageName;
        }


        $user = User::updateOrCreate([
            'email' => $this->email
        ], $userData);

        if($this->password) {
            self::resetUser();
        }
        session()->flash('success', 'Form is submitted');
    }

    public function showUsersList()
    {
        $this->formMode = false;
        $this->listMode = true;
    }


    public function render()
    {
        $this->records = User::where('id', '!=', auth()->user()->id)->orderBy('id', 'desc')->paginate(10);

        return view('livewire.fetchusers');
    }
}
