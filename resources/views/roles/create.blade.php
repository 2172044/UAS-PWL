<x-app-layout>
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                @csrf
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Create Role') }}
                </h2>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="cart-title">Buat Role</h3>
                            </div>
                            <div class="card-tools">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <div>
                                        <a class="btn btn-success" href="{{ route('roles.index') }}">
                                            Back</a>
                                    </div>
                                    <form method="post" action="{{ route('roles.store') }}">
                                        @csrf
                                        <div>
                                            <x-input-label for="name" :value="__('Name')" />
                                            <x-text-input id="name" name="name" type="text"
                                                class="mt-1 block w-80" autofocus autocomplete="name" />
                                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                        </div>
                                        <div>
                                            <x-input-label for="permission[]" :value="__('Permission')" class="mt-2" />
                                            @php
                                                $groupedPermissions = [];
                                                foreach ($permission as $value) {
                                                    $groupName = explode('-', $value->name)[0];
                                                    if (!array_key_exists($groupName, $groupedPermissions)) {
                                                        $groupedPermissions[$groupName] = [];
                                                    }
                                                    $groupedPermissions[$groupName][] = $value;
                                                }
                                            @endphp
                                            <table class="table table-bordered">
                                                @foreach ($groupedPermissions as $groupName => $groupPermissions)
                                                    <tr>
                                                        <td> {{ $groupName }}</td>
                                                        @php
                                                            $groupPermissions = collect($groupPermissions);
                                                            $permissionOrder = ['create', 'delete', 'edit', 'list'];
                                                            $newGroupPermissions = [];
                                                            $prefix = '';
                                                            
                                                            if (!empty($groupPermissions->first())) {
                                                                $prefix = explode('-', $groupPermissions->first()['name'])[0];
                                                            }
                                                            
                                                            foreach ($permissionOrder as $action) {
                                                                $permissionName = $prefix . '-' . $action;
                                                            
                                                                if ($groupPermissions->contains('name', $permissionName)) {
                                                                    $newGroupPermissions[] = $groupPermissions->firstWhere('name', $permissionName);
                                                                } else {
                                                                    $newGroupPermissions[] = ['id' => '-1', 'name' => 'default-value'];
                                                                }
                                                            }
                                                            $sortedPermissions = $newGroupPermissions;
                                                        @endphp
                                                        @foreach ($sortedPermissions as $permission)
                                                            <td>
                                                                @if ($permission['id'] == -1)
                                                                    @continue
                                                                @else
                                                                    <input type="checkbox" name="permission[]"
                                                                        value="{{ $permission['id'] }}" class="name">
                                                                @endif
                                                                @php
                                                                    $namePermission = explode('-', $permission['name']);
                                                                    $permissionName = $namePermission[1];
                                                                @endphp
                                                                {{ $permissionName }}
                                                                <x-input-error class="mt-2" :messages="$errors->get('permission')" />
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                        <div>
                                            <x-primary-button class="mt-4">{{ __('Create') }}</x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
