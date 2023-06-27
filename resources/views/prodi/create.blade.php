<x-app-layout>
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                @csrf
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Create Prodi') }}
                </h2>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="cart-title">Buat Prodi</h3>
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
                                        <a class="btn btn-success" href="{{ route('prodis.index') }}">
                                            Back</a>
                                    </div>
                                    <form method="post" action="{{ route('prodis.store') }}">
                                        @csrf
                                        <div>
                                            <x-input-label for="nama" :value="__('Nama')" />
                                            <x-text-input id="nama" name="nama" type="text"
                                                class="mt-1 block w-80" autofocus autocomplete="nama" />
                                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
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
