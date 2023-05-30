<div class="container-fluid px-2 px-md-4">
    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-3">{{ $formTitle }}</h6>
                </div>
                <div class="col-md-4 my-3 text-end ">
                    <button type="button" class="btn bg-gradient-dark" wire:click="showUsersList()">Back</button>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <form method='POST' wire:submit.prevent="submit()">
                @csrf
                <div class="row">

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control border border-2 p-2"
                            wire:model="email">
                        @error('email')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control border border-2 p-2" wire:model="name">
                        @error('name')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Phone</label>
                        <input type="number" name="phone" class="form-control border border-2 p-2"
                            wire:model="phone">
                        @error('phone')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control border border-2 p-2"
                            wire:model="location">
                        @error('location')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="floatingTextarea2">About</label>
                        <textarea class="form-control border border-2 p-2" placeholder=" Say something about yourself" id="floatingTextarea2"
                            name="about" rows="4" cols="50" wire:model="about"></textarea>
                        @error('about')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>
                    @if (!$userId)
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control border border-2 p-2"
                                wire:model="password">
                            @error('password')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control border border-2 p-2"
                                wire:model="password_confirmation">
                            @error('password_confirmation')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                    @endif
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Profile Photo</label>
                        <input type="file" wire:model="image" class="form-control border border-2 p-2">
                        @error('image')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                        {{-- @if ($image)
                            Photo Preview:
                            <img class="avatar avatar-lg me-3 border-radius-lg m-3" src="{{ $image->temporaryUrl() }}">
                        @endif --}}
                    </div>
                </div>
                <button type="submit" class="btn bg-gradient-dark">Submit</button>
            </form>

        </div>
    </div>
</div>
