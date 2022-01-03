{{-- @dd($data) --}}
@extends('layouts.app')

@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Perbandingan Kriteria</h1>
                    </div>
                    {{-- @dd($value) --}}
                    <div class="row">

                        <div class="col-lg-6 mb-4">
                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">List Perbandingan Kriteria </h6>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">Peringkat</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Poin</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($data as $rank => $value)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td >{{$rank}}</td>
                                                <td >{{round($value,3)}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
@endsection