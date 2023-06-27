<x-app-layout>
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                @csrf
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Role Management') }}
                </h2>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="cart-title">Daftar Role</h3>
                            </div>
                            <div class="card-tools">
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-white">{{ __('error.') }}</p>
                                    </div>
                                @endif
                                @if ($message = Session::get('success'))
                                    <div  class="alert alert-success" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
                                        <p  class="text-sm text-white">{{ __($message) }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <div>
                                    @can('role-create')
                                        <a class="btn btn-success" href="{{ route('roles.create') }}">
                                            Create New Role</a>
                                    @endcan
                                </div>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td>{{ $key +1 }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-info"
                                                        href="{{ route('roles.show', $role->id) }}">Show</a>
                                                    @can('role-edit')
                                                        <a class="btn btn-primary"
                                                            href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                                    @endcan
                                                    @can('role-delete')
                                                        <form method="POST"
                                                            action="{{ route('roles.destroy', $role->id) }}"
                                                            style="display:inline">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="submit" value="Delete" class="btn btn-block btn-outline-danger">
                                                        </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
