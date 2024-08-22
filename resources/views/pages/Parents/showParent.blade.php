@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Grades_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('main_trans.Grades') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">






<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('main_trans.Add_Parent') }}
            </button>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('Parent_trans.Name_Father') }}</th>
                            <th>{{ trans('Parent_trans.Email') }}</th>
                            <th>{{ trans('Parent_trans.Address_Father') }}</th>
                            <th>{{ trans('Parent_trans.Job_Father') }}</th>
                            <th>{{ trans('Parent_trans.National_ID_Father') }}</th>
                            <th>{{ trans('Parent_trans.Phone_Father') }}</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Parents as $parent)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $parent->Name_Father }}</td>
                                <td>{{ $parent->email }}</td>
                                <td>{{ $parent->Address_Father }}</td>
                                <td>{{ $parent->Job_Father }}</td>
                                <td>{{ $parent->National_ID_Father }}</td>
                                <td>{{ $parent->Phone_Father }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $parent->id }}"
                                        title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $parent->id }}"
                                        title="{{ trans('Grades_trans.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                            
                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $parent->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('Grades_trans.edit_Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('Parents.update','test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                              
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">{{ trans('Parent_trans.Name_Father') }}
                                                                :</label>
                                                            <input id="Name_Father" value="{{ $parent->getTranslation('Name_Father', 'ar') }}" type="text" name="Name_Father" class="form-control">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">{{ trans('Parent_trans.Name_Father_en') }}
                                                                </label>
                                                            <input id="Name_Father_en"  value="{{ $parent->getTranslation('Name_Father', 'en') }}" type="text" name="Name_Father_en" class="form-control">
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $parent->id }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">{{ trans('Parent_trans.Email') }}
                                                                :</label>
                                                            <input id="Email" type="email" value="{{ $parent->Email }}" name="Email" class="form-control">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">{{ trans('Parent_trans.Password') }}
                                                                :</label>
                                                            <input id="Password" value= "{{ $parent->Password }}"  type="Password" name="Password" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">{{ trans('Parent_trans.Job_Father') }}
                                                                :</label>
                                                            <input id="Job_Father" value="{{ $parent->getTranslation("Job_Father","ar") }}"   type="text" name="Job_Father" class="form-control">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">{{ trans('Parent_trans.Job_Father_en') }}
                                                                :</label>
                                                            <input id="Job_Father_en" type="text" name="Job_Father_en" class="form-control" value="{{ $parent->getTranslation("Job_Father","en") }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                       
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">{{ trans('Parent_trans.National_ID_Father') }}
                                                                :</label>
                                                            <input id="National_ID_Father" value="{{ $parent->National_ID_Father }}" type="text" name="National_ID_Father" class="form-control">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en" class="mr-sm-2">{{ trans('Parent_trans.Phone_Father') }}
                                                                :</label>
                                                            <input type="Phone_Father" value="{{ $parent->Phone_Father }}" class="form-control" name="Phone_Father">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">{{ trans('Parent_trans.Address_Father') }}
                                                            :</label>
                                                        <textarea class="form-control" value="{{ $parent->Address_Father }}" name="Address_Father" id="exampleFormControlTextarea1"
                                                            rows="3"></textarea>
                                                    </div>
                                               
                            
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $parent->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('Grades_trans.delete_Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('Parents.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('Grades_trans.Warning_Grade') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $parent->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('Grades_trans.submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


<!-- add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('main_trans.Add_Parent') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('Parents.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('Parent_trans.Name_Father') }}
                                :</label>
                            <input id="Name_Father" type="text" name="Name_Father" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('Parent_trans.Name_Father_en') }}
                                :</label>
                            <input id="Name_Father_en" type="text" name="Name_Father_en" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('Parent_trans.Email') }}
                                :</label>
                            <input id="Email" type="email" name="Email" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('Parent_trans.Password') }}
                                :</label>
                            <input id="Password" type="Password" name="Password" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('Parent_trans.Job_Father') }}
                                :</label>
                            <input id="Job_Father" type="text" name="Job_Father" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('Parent_trans.Job_Father_en') }}
                                :</label>
                            <input id="Job_Father_en" type="text" name="Job_Father_en" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                       
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('Parent_trans.National_ID_Father') }}
                                :</label>
                            <input id="National_ID_Father" type="text" name="National_ID_Father" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('Parent_trans.Phone_Father') }}
                                :</label>
                            <input type="Phone_Father" class="form-control" name="Phone_Father">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('Parent_trans.Address_Father') }}
                            :</label>
                        <textarea class="form-control" name="Address_Father" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                <button type="submit" class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
            </div>
            </form>

        </div>
    </div>
</div>

</div>

<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
