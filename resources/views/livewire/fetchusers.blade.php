<div>
    @if (session('success'))
        <div class="container-fluid px-2 px-md-4">
            <div class="alert alert-success alert-dismissible text-white" role="alert">
                <span class="text-sm">{{ Session::get('success') }}</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    @if ($formMode)
        @include('pages.users.add-edit')
    @else
        @include('pages.users.list')
    @endif
</div>