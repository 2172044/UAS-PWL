<x-app-layout>
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                @csrf
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Edit Matkul') }}
                </h2>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="cart-title">Edit Matkul</h3>
                            </div>
                            <div class="card-body">
                                <div>
                                    <a class="bg-green-500 text-white border-none rounded-md py-2 px-4"
                                        href="{{ route('matkuls.index') }}">
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
                                <form method="post"
                                    action="{{ route('matkuls.update', ['matkul' => $matkul->kode_matkul]) }}">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <x-input-label for="nama_matkul" :value="__('Nama Matkul')" class="mt-4" />
                                        <x-text-input id="nama_matkul" name="nama_matkul" type="text"
                                            class="mt-1 block w-full" :value="old('nama_matkul', $matkul['nama_matkul'])" required autofocus
                                            autocomplete="nama_matkul" />
                                        <x-input-error class="mt-2" :messages="$errors->get('nama_matkul')" />
                                    </div>
                                    <div>
                                        <x-input-label for="sks" :value="__('SKS')" class="mt-4" />
                                        <x-text-input id="sks" name="sks" type="number" min="1"
                                            min="1" class="mt-1 block w-full" :value="old('sks', $matkul['sks'])" required
                                            autofocus autocomplete="sks" />
                                        <x-input-error class="mt-2" :messages="$errors->get('sks')" />
                                    </div>
                                    <div>
                                        <x-input-label for="semester" :value="__('Semester')" class="mt-4" />
                                        <x-text-input id="semester" name="semester" type="number" min="1"
                                            max="8" class="mt-1 block w-full" :value="old('semester', $matkul['semester'])" required
                                            autofocus autocomplete="semester" />
                                        <x-input-error class="mt-2" :messages="$errors->get('semester')" />
                                    </div>
                                    {{-- Ini Status ama Prodi belon --}}
                                    <div class="mt-4">
                                        <x-input-label for="status" :value="__('Status')" />
                                        <select name="status" id="status" class="mt-1 block w-80">
                                            <option value="0" <?php echo $matkul['status'] == 0 ? 'selected' : ''; ?>>praktikum</option>
                                            <option value="1" <?php echo $matkul['status'] == 1 ? 'selected' : ''; ?>>teori</option>
                                        </select>                                        
                                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                    </div>
                                    <div class="mt-4">
                                        <x-input-label for="prodi" :value="__('Prodi')" />
                                        <select name="prodi" id="prodi" class="mt-1 block w-80">
                                            @foreach ($prodis as $prodi)
                                                <option value="{{ $prodi->kode_jurusan }}" {{ $matkul['program_studi_kode_jurusan'] == $prodi->kode_jurusan ? 'selected' : '' }}>
                                                    {{ $prodi->nama }}
                                                </option>
                                            @endforeach
                                        </select>                                        
                                        <x-input-error :messages="$errors->get('prodi')" class="mt-2" />
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
