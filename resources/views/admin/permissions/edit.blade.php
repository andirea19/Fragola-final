@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('Zugriff bearbeiten')}}</h1>
                    <a href="{{ route('admin.permissions.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Zurück') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">Titel</label>
                        <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ old('title', $permission->title) }}" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Speichern')}}</button>
                </form>
            </div>
        </div>
    

</div>
@endsection