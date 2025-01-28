@extends('layouts.admin')

@section('title', 'Dashboard - Admin')

@section('content')
<div class="py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Dashboard Administrativo</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <x-dashboard-stat-card icon="fa-hourglass-half" title="Proyectos Pendientes" :value="$pendingProjectsCount ?? 0" color="text-yellow-500" iconBg="bg-yellow-100" :link="route('admin.projects.index', ['status' => 'En evaluación'])" />
            <x-dashboard-stat-card icon="fa-check" title="Proyectos Aprobados" :value="$approvedProjectsCount ?? 0" color="text-green-500" iconBg="bg-green-100" :link="route('admin.projects.index', ['status' => 'Aprobado'])" />
            <x-dashboard-stat-card icon="fa-times" title="Proyectos Rechazados" :value="$rejectedProjectsCount ?? 0" color="text-red-500" iconBg="bg-red-100" :link="route('admin.projects.index', ['status' => 'Rechazado'])" />
            <x-dashboard-stat-card icon="fa-folder" title="Total de Proyectos" :value="$allProjectsCount ?? 0" color="text-blue-500" iconBg="bg-blue-100" :link="route('admin.projects.index')" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Proyectos</h2>
                <p class="text-gray-600">Accede y gestiona todos los proyectos.</p>
                <a href="{{ route('admin.projects.index') }}" class="mt-4 inline-block bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-md">
                    Ver Todos Los Proyectos
                </a>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Stages</h2>
                <p class="text-gray-600">Administra y supervisa todos los stages. ({{ $allStagesCount ?? 0 }}) en total</p>
                <a href="{{ route('admin.stages.index') }}" class="mt-4 inline-block bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-md">
                    Administrar Stages
                </a>
            </div>
        </div>
    </div>
</div>
@endsection