<x-app-layout>
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                @csrf
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Show Matkul') }}
                </h2>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="cart-title">{{ $matkul->nama_matkul }}</h3>
                            </div>
                            <div class="card-body">
                                <div>
                                    <a class="btn btn-success" href="{{ route('matkuls.index') }}">
                                        Back</a>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <span>{{ $matkul->nama_matkul }}</span>
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
