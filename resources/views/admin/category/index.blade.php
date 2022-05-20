@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Category</h4>
            <a style="btn" ></a>
            <div class="card">
                <h5 class="card-header">Table Category</h5>
                <div class="table-responsive text-nowrap mb-3">
                    <a href="{{ url('add-category') }}" class="btn btn-danger">Add Category</a>
                    <table class="table mb-3">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        @foreach($category as $item)
                        <tbody class="table-border-bottom-0">
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $item->id }}</strong>
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class=" pull-up" title=""
                                        data-bs-original-title="Lilian Fuller">
                                        <img src="assets/upload/category/{{ $item->img }}" alt="Avatar" class="img-thumbnail-zoom-in w-px-50 h-px-50">
                                    </li>
                                </ul>
                            </td>
                            @if($item->status == 1)
                                 <td><span class="badge bg-label-primary me-1">Show</span></td>
                            @elseif($item->status == 0)
                                <td><span class="badge bg-label-primary me-1">Hide</span></td>
                            @endif
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ url('edit-cat/'.$item->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="bx bx-trash me-1"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
