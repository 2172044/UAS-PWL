<x-app-layout>
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                @csrf
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Create Schedule') }}
                </h2>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="cart-title">Buat Jadwal</h3>
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
                                    <form method="post" action="{{ route('schedules.store') }}">
                                        @csrf
                                        <input type="hidden" name="matkul_kode_matkul" value="{{$kode_matkul}}">
                                        <div class="mt-4">
                                            <x-input-label for="hari" :value="__('Hari')" />
                                            <x-text-input id="hari" name="hari" type="text"
                                                class="mt-1 block w-80" autofocus autocomplete="hari" />
                                            <x-input-error class="mt-2" :messages="$errors->get('hari')" />
                                        </div>
                                        <div class="mt-4">
                                            <x-input-label for="jamMulai" :value="__('JamMulai')" />
                                            <x-text-input id="jamMulai" name="jamMulai" type="time"
                                                class="mt-1 block w-80" autofocus autocomplete="jamMulai" />
                                            <x-input-error class="mt-2" :messages="$errors->get('jamMulai')" />
                                        </div>
                                        <div class="mt-4">
                                            <x-input-label for="jamSelesai" :value="__('JamSelesai')" />
                                            <x-text-input id="jamSelesai" name="jamSelesai" type="time"
                                                class="mt-1 block w-80" autofocus autocomplete="jamSelesai" />
                                            <x-input-error class="mt-2" :messages="$errors->get('jamSelesai')" />
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
