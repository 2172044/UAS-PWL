<x-app-layout>
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                @csrf
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Show Role') }}
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
                                @can("prodi-create")
                                <a class="btn btn-primary" href="{{ route('schedules.create', $matkul->kode_matkul) }}">
                                    Create New Schedule</a>
                                @endcan
                                <div>
                                    <div class="form-group">
                                        <strong>Nama Matkul:</strong>
                                        <span>{{ $matkul->nama_matkul }}</span>
                                    </div>
                                    <div class="form-group">
                                        <strong>Sks:</strong>
                                        <span>{{ $matkul->sks }}</span>
                                    </div>
                                    <div class="form-group">
                                        <strong>Semester:</strong>
                                        <span>{{ $matkul->semester }}</span>
                                    </div>
                                    <div class="form-group">
                                        <strong>Status:</strong>
                                        @if ($matkul->status == 1)
                                            <span>Teori</span>
                                        @else
                                            <span>Praktikum</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <strong>Kode Program Studi:</strong>
                                        <span>{{ $matkul->program_studi_kode_jurusan }}</span>
                                    </div>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Jam Mulai</th>
                                            <th>Jam Selesai</th>
                                            <th>Hari</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                        @foreach ($mk_Tawars as $key => $matkul)
                                            <tr>
                                                <td>{{ $matkul->jamMulai }}</td>
                                                <td>{{ $matkul->jamSelesai }}</td>
                                                <td>{{ $matkul->hari }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        {{-- <a class="btn btn-info"
                                                            href="{{ route('schedules.show', $matkul->kode_matkul) }}">Show</a> --}}
                                                        {{-- @can('role-edit') --}}
                                                        {{-- <a class="btn btn-primary"
                                                            href="{{ route('schedules.edit', $matkul->kode_matkul) }}">Edit</a> --}}
                                                        {{-- @endcan --}}
                                                        {{-- @can('role-delete') --}}
                                                        {{-- <form method="POST"
                                                            action="{{ route('schedules.destroy', $matkul->kode_matkul) }}"
                                                            style="display:inline">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="submit" value="Delete"
                                                                class="btn btn-block btn-outline-danger">
                                                        </form> --}}
                                                        {{-- @endcan --}}
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
    </div>
</x-app-layout>
