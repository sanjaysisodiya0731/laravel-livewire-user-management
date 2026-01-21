<div>
    @if($isMove==false)
        <h1>Edit User</h1>
        <form wire:submit.prevent="updateUser">
            <input type="text" wire:model.live="first_name" placeholder="Enter here">
            @error('first_name')
            <span class="error">
                {{$message}}
            </span>
            @enderror
            <br><br>
            <input type="text" wire:model.live="last_name" placeholder="Enter here">
            @error('last_name')
            <span class="error">
                {{$message}}
            </span>
            @enderror
            <br><br>
            <input type="text" wire:model.live="email" placeholder="Enter here">
            @error('email')
            <span class="error">
                {{$message}}
            </span>
            @enderror
            <br><br>
            <button type="submit">Update</button>
        </form>
    @else
        <livewire:users-list />
    @endif
</div>
