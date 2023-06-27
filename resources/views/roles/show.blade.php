<x-app-layout>
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                @csrf
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Show Role') }}
                </h2>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="cart-title">{{ $role->name }}</h3>
                            </div>
                            <div class="card-body">
                                <div>
                                    <a class="btn btn-success" href="{{ route('roles.index') }}">
                                        Back</a>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <span>{{ $role->name }}</span>
                                    </div>
                                    <div class="form-group">
                                        <strong>Permission:</strong>
                                        @if (!empty($rolePermissions))
                                            @foreach ($rolePermissions as $v)
                                                <span
                                                    class="inline-block px-2 py-1 rounded bg-green-500 mr-1 mb-1 text-white">{{ $v->name }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
