<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class=" me-3 my-3 text-end">
                <a class="btn bg-gradient-dark mb-0" href="javascript:;" wire:click="addUser()"><i
                        class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                    User</a>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    ID
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    PHOTO</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    NAME</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    EMAIL</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    ROLE</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    CREATION DATE
                                </th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($this->records))
                                @foreach ($this->records as $key => $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="mb-0 text-sm">{{ ++$key }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    @if ($user->image)
                                                        <img src="{{ asset('storage/' . $user->image) }}"
                                                            class="avatar avatar-sm me-3 border-radius-lg"
                                                            alt="user1">
                                                    @else
                                                        <img src="{{ asset('assets') }}/img/team-2.jpg"
                                                            class="avatar avatar-sm me-3 border-radius-lg"
                                                            alt="user1">
                                                    @endif
                                                </div>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $user->name }}</h6>

                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs text-secondary mb-0">{{ $user->email }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">User</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($user->created_at)->format('Y-m-d') }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="javascript:void(0)"
                                                wire:click="editUser({{ $user->id }})" title="">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </a>

                                            <button type="button" class="btn btn-danger btn-link"
                                                data-original-title="" title="">
                                                <i class="material-icons">close</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                            @endif
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $this->records->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
