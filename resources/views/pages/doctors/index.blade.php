@extends('layouts.app')
@section('content')

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">MyTurn</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li>
                                <li class="breadcrumb-item active">CRM</li>
                            </ol>
                        </div>
                        <h4 class="page-title">CRM</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-5">
                                    <a href="{{route('doctors.create')}}" class="btn btn-soft-info mb-2"><i
                                            class="mdi mdi-plus-circle me-2"></i>Ajouter Medcine</a>
                                </div>
                            </div>

                            <div class="tab-pane show active" id="basic-datatable-preview">
                                <table id="alternative-page-datatable"
                                       class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Nom</th>
                                        <th>Specialty</th>
                                        <th>Téléphone</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @forelse($items as $item)
                                        <tr>
                                            @if ($item->image)
                                                <td><img src="{{asset($item->image)}}" height="60"
                                                         width="30" alt="Image"></td>
                                            @else
                                                <td><img src="{{ asset('uploads/No_image_available.svg.png') }}"
                                                         height="30"
                                                         width="30"
                                                         alt="Image"></td>
                                            @endif
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->specialty }}</td>
                                            <td>{{ $item->phone_number }}</td>
                                            <td class="{{ $item->status ? 'text-success' : 'text-danger' }}">
                                                {{ $item->status ? 'Active' : 'Inactive' }}
                                            </td>

                                            <td>
                                                <a href="{{ route('doctors.show', $item->id) }}" class="action-icon"> <i
                                                        class="mdi mdi-eye"></i></a>

                                                <a href="{{ route('doctors.edit', $item->id) }}" class="action-icon"> <i
                                                        class="mdi mdi-square-edit-outline"></i></a>

                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                   data-bs-target="#delete{{$item->id}}" class="action-icon"> <i
                                                        class="mdi mdi-delete"></i></a></td>
                                            </td>
                                        </tr>
                                        @include('pages.doctors.modal.delete')
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Aucun Medcine trouvé</td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
        </div>
    </div>

@endsection
