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
                                <h3 class="cart-title">Edit Prodi</h3>
                            </div>
                            <div class="card-body">
                                <div>
                                <a class="bg-green-500 text-white border-none rounded-md py-2 px-4"
                                    href="{{ route('prodis.index') }}">
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
                                <form method="post" action="{{ route('prodis.update', ['prodi' => $prodi->kode_jurusan]) }}">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <x-input-label for="nama" :value="__('Nama')" class="mt-4" />
                                        <x-text-input id="nama" name="nama" type="text"
                                            class="mt-1 block w-full" :value="old('nama', $prodi->nama)" required autofocus
                                            autocomplete="name" />
                                        <x-input-error class="mt-2" :messages="$errors->get('nama')" />
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
