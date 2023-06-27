<x-app-layout>
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                @csrf
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Ambil Matkul Management') }}
                </h2>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="cart-title">Daftar Matkul Yang Tersedia</h3>
                            </div>
                            <div class="card-tools">
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-white">{{ __('error.') }}</p>
                                    </div>
                                @endif
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success" x-data="{ show: true }" x-show="show" x-transition
                                        x-init="setTimeout(() => show = false, 2000)">
                                        <p class="text-sm text-white">{{ __($message) }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <br>
                                <form action="{{route("dkbs.store")}}" method="post">
                                    @csrf
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>SKS</th>
                                        <th>Semester</th>
                                        <th>Kode Program Studi</th>
                                    </tr>
                                    @foreach ($matkuls as $key => $matkul)
                                   
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $matkul->nama_matkul }}</td>
                                            <td>{{ $matkul->sks }}</td>
                                            <td>{{ $matkul->semester }}</td>
                                            <td>{{ $matkul->program_studi_kode_jurusan }}</td>
                                            <td><input type="checkbox" name="matkulAmbil[]" id="matkulAmbil" value="{{$matkul->kode_matkul}}"></td>
                                        </tr>
                                    </form>
                                    @endforeach
                                </table>
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
</x-app-layout>
