<x-app-layout>
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                @csrf
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Edit Role') }}
                </h2>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="cart-title">Edit Role</h3>
                            </div>
                            <div class="card-body">
                                <div>
                                <a class="bg-green-500 text-white border-none rounded-md py-2 px-4"
                                    href="{{ route('mk_Tawars.index') }}">
                                    Back</a>
                                </div>
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
                                <form method="post" action="{{ route('mk_Tawars.update', ['role' => $role->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <x-input-label for="name" :value="__('Name')" class="mt-4" />
                                        <x-text-input id="name" name="name" type="text"
                                            class="mt-1 block w-full" :value="old('name', $role['name'])" required autofocus
                                            autocomplete="name" />
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
                                        <table
                                            class="table-fixed border border-collapse border-black w-full rounded-mg">
                                            @foreach ($groupedPermissions as $groupName => $groupPermissions)
                                                <tr>
                                                    <td
                                                        class="mr-4 border border-solid border-slade-500 border-spacing-2 text-center">
                                                        {{ $groupName }}</td>
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
                                                        <td
                                                            class="mr-4 border border-solid border-slade-500 border-spacing-2">
                                                            @if ($permission['id'] == -1)
                                                                @continue
                                                            @else
                                                                <input type="checkbox" name="permission[]"
                                                                    value="{{ $permission['id'] }}" class="name"
                                                                    {{ in_array($permission['id'], $rolePermissions) ? 'checked' : '' }}>
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
                                    <x-primary-button class="mt-4">{{ __('Edit') }}</x-primary-button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
