{{-- @dd($data) --}}
@extends('layouts.app')

@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Perbandingan Kriteria</h1>
                    </div>

                    <div class="row">

                        <div class="col-lg-12 mb-4">
                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">List Perbandingan Kriteria </h6>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            @foreach ($data->matrix as $key => $props)
                                            @if ($key != 'sumCol')
                                            <th class="text-center" scope="col">{{ $key;  }}</th>
                                            @endif
                                            @endforeach
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data->matrix as $key => $value)
                                        <tr>
                                            @if ($key != 'sumCol')
                                            <th scope="col">{{ $key; }}
                                                @else
                                                <th scope="col">Jumlah
                                            @endif
                                            @foreach ($value as $key => $values)
                                                    <td class="text-center" >{{  $values; }}</td>
                                            @endforeach 
                                        </th>
                                        </tr>
                                    @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-12 mb-4">
                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Eigen Table </h6>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                            @foreach ($data->eigen as $key => $props)
                                            
                                            @if ($key == 'sumEigen')
                                            <th class="text-center" scope="col">Tot. Eigen</th>
                                            <th class="text-center" scope="col">Avg. Eigen</th>
                                            @else
                                            <th class="text-center" scope="col">{{ $key;  }}</th>
                                            @endif
                                            @endforeach
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data->eigen as $keyName => $value)
                                        <tr>
                                            @if ($keyName != 'sumEigen')
                                            <th scope="col">{{ $keyName; }}
                                            @else
                                                @continue
                                            @endif
                                                    @foreach ($value as $key => $valueMatrix)
                                                    @if ($key == 'totalEigen')
                                                    <td class="text-center" >{{  round($valueMatrix, 2); }}</td>
                                                    <td class="text-center" >{{  round( $valueMatrix / $data->eigen['sumEigen']['totalEigen'], 3); }}</td>
                                                    @else
                                                    <td class="text-center" >{{  round($valueMatrix, 2); }}</td>
                                                    @endif
                                                    @endforeach 
                                            </th>
                                        </tr>
                                        @endforeach
                                        <tr class="text-center">
                                            <td colspan='6'>Principe Eigen Vector</td>
                                            <td colspan='1'>{{$data->lamda['sumLamda']}}</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td colspan='6'>Consistency Index</td>
                                            <td colspan='1'>{{$data->lamda['CI']}}</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td colspan='6'>Consistency Status</td>
                                            <td colspan='1'>
                                                @if ($data->lamda['constant'] < 0.1)
                                                Consistent
                                                @else
                                                inConsistent
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->
@endsection