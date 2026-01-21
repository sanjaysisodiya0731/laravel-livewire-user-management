<div>
    <h1>Registration Here</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <form wire:submit.prevent="submit">
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
        <input type="password" wire:model.live="password" placeholder="Enter here">
        @error('password')
        <span class="error">
            {{$message}}
        </span>
        @enderror
        <br><br>

        <input type="file" wire:model="photo"><br><br>

        <button type="submit">Register</button>
        <button onclick="window.location.href='{{ route('users.list') }}'">Users</button>
    </form>
</div>
