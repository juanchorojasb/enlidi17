@extends('layouts.admin')

@section('title', 'Dashboard - Admin')

@section('content')
    <div class="graphs">
        <div class="col_3">
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-pie-chart icon-rounded"></i>
                    <div class="stats">
                        <h5><strong>{{ $pendingProjectsCount ?? 0 }}</strong></h5>
                        <span>Proyectos Pendientes</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
                    <div class="stats">
                        <h5><strong>{{ $approvedProjectsCount ?? 0 }}</strong></h5>
                        <span>Proyectos Aprobados</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 widget widget1">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-money user2 icon-rounded"></i>
                    <div class="stats">
                        <h5><strong>{{ $rejectedProjectsCount ?? 0 }}</strong></h5>
                        <span>Proyectos Rechazados</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 widget">
                <div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar icon-rounded"></i>
                    <div class="stats">
                        <h5><strong>{{ $allProjectsCount ?? 0 }}</strong></h5>
                        <span>Total de Proyectos</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Todos los Proyectos</h5>
                        <p class="card-text">
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Ver Todos Los Proyectos</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestionar Stages</h5>
                        <p class="card-text">
                            <a href="{{ route('admin.stages.index') }}" class="btn btn-secondary">Administrar Stages ({{ $allStagesCount ?? 0 }})</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection