<x-app-layout>
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                @csrf
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Create Matkul') }}
                </h2>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="cart-title">Buat Matkul</h3>
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
                                        <a class="btn btn-success" href="{{ route('matkuls.index') }}">
                                            Back</a>
                                    </div>
                                    <form method="post" action="{{ route('matkuls.store') }}">
                                        @csrf
                                        <div class="mt-4">
                                            <x-input-label for="nama_matkul	" :value="__('Nama Matkul')" />
                                            <x-text-input id="nama_matkul" name="nama_matkul" type="text"
                                               class="mt-1 block w-80" autofocus autocomplete="nama_matkul" />
                                            <x-input-error class="mt-2" :messages="$errors->get('nama_matkul')" />
                                        </div>
                                        <div class="mt-4">
                                            <x-input-label for="sks" :value="__('SKS')" />
                                            <x-text-input id="sks" name="sks" type="number" min="1"
                                            min="1"  class="mt-1 block w-80" autofocus autocomplete="sks" />
                                            <x-input-error class="mt-2" :messages="$errors->get('sks')" />
                                        </div>
                                        <div class="mt-4">
                                            <x-input-label for="semester" :value="__('Semester')" />
                                            <x-text-input id="semester" name="semester" type="number" min="1"
                                                max="8" class="mt-1 block w-80" autofocus
                                                autocomplete="semester" />
                                            <x-input-error class="mt-2" :messages="$errors->get('semester')" />
                                        </div>
                                        <div class="mt-4">
                                            <x-input-label for="status" :value="__('Status')" />
                                            <select name="status" id="status" class="mt-1 block w-80">
                                                <option value="{{ 0 }}">praktikum</option>
                                                <option value="{{ 1 }}">teori</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                        </div>
                                        <div class="mt-4">
                                            <x-input-label for="prodi" :value="__('Prodi')" />
                                            <select name="prodi" id="prodi" class="mt-1 block w-80">
                                                @foreach ($prodis as $prodi)
                                                    <option value="{{ $prodi->kode_jurusan }}">{{ $prodi->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('prodi')" class="mt-2" />
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
