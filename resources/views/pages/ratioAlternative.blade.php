{{-- @dd($data) --}}
@extends('layouts.app')

@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Perbandingan Kriteria</h1>
                    </div>
                    @foreach ($data as $criteria => $value)
                    {{-- @dd($value) --}}
                        <div class="row">

                            <div class="col-lg-6 mb-4">
                                <!-- Illustrations -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">List Perbandingan Kriteria {{$criteria}} </h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                @foreach ($value['ratio'] as $key => $props)
                                                @if ($key != 'sumCol')
                                                <th class="text-center" scope="col">{{ $key;  }}</th>
                                                @endif
                                                @endforeach
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($value['ratio'] as $key => $prop)
                                            <tr>
                                                @if ($key != 'sumCol')
                                                <th scope="col">{{ $key; }}
                                                    @else
                                                    <th scope="col">Jumlah
                                                @endif
                                                @foreach ($prop as $key => $props)
                                                        <td class="text-center" >{{  $props; }}</td>
                                                @endforeach 
                                            </th>
                                            </tr>
                                        @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6 mb-4">
                                <!-- Illustrations -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Eigen Table Kriteria {{$criteria}} </h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                @foreach ($value['eigen'] as $key => $props)
                                                
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
                                            @foreach ($value['eigen'] as $keyName => $prop)
                                            <tr>
                                                @if ($keyName != 'sumEigen')
                                                <th scope="col">{{ $keyName; }}
                                                @else
                                                <th scope="col">Jumlah
                                                @endif
                                                        @foreach ($prop as $key => $props)
                                                        @if ($key == 'totalEigen')
                                                        <td class="text-center" >{{  round($props, 2); }}</td>
                                                        <td class="text-center" >{{  round( $props / $value['eigen']['sumEigen']['totalEigen'], 3); }}</td>
                                                        @else
                                                        <td class="text-center" >{{  round($props, 2); }}</td>
                                                        @endif
                                                        @endforeach 
                                                    </th>
                                            </tr>
                                            @endforeach
                                            <tr class="text-center">
                                                <td colspan='4'>Principe Eigen Vector</td>
                                                <td class="text-right" colspan='2'>{{ round($value['lamda']['sumLamda'], 4);}}</td>
                                            </tr>
                                            <tr class="text-center">
                                                <td colspan='4'>Consistency Index</td>
                                                <td class="text-right" colspan='2'>{{ round($value['lamda']['CI'], 4);}}</td>
                                            </tr>
                                            <tr class="text-center">
                                                <td colspan='4'>Consistency Status</td>
                                                <td class="text-right" colspan='2'>
                                                    @if ($value['lamda']['constant'] < 0.1)
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

                    @endforeach
                </div>
                <!-- /.container-fluid -->
@endsection