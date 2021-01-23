@extends('layouts.app')
@section('title', 'Finance')
@section('content')

    <div class="d-flex justify-content-between">
        <h1 class="col font-weight-bold">Finance List {{$program->name}}</h1>
        @auth()
            <div class="clearfix">
                {{-- auth to limit content, it cannot be accessed until login --}}
                <div class="float-right">
                    {{--                <a href="{{route('action.create')}}" class="btn btn-primary btn-block" role="button" aria-pressed="true">New action</a>--}}
                    <a role="button" aria-pressed="true"
                       title="Add Finance"
                       data-toggle="modal"
                       data-target="#addFinance">
                        <svg
                            aria-hidden="true"
                            focusable="false"
                            data-prefix="fad"
                            data-icon="angle-double-right"
                            role="img"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"
                            class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x iconplus float-right"
                        >
                            <g>
                                <path
                                    fill="#000000"
                                    d="m408,184h-136c-4.418,0 -8,-3.582 -8,-8v-136c0,-22.09 -17.91,-40 -40,-40s-40,17.91 -40,40v136c0,4.418 -3.582,8 -8,8h-136c-22.09,0 -40,17.91 -40,40s17.91,40 40,40h136c4.418,0 8,3.582 8,8v136c0,22.09 17.91,40 40,40s40,-17.91 40,-40v-136c0,-4.418 3.582,-8 8,-8h136c22.09,0 40,-17.91 40,-40s-17.91,-40 -40,-40zM408,184"
                                    class="fa-secondary">
                                </path>
                            </g>
                        </svg>
                    </a>

                </div>
            </div>
        @endauth
    </div>

    {{--            modal add finance--}}
    <div class="modal fade" id="addFinance">
        <div class="modal-dialog">
            <div class="modal-content card-bg-change">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold">Add Finance </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" style="text-align: left;">
                    <form action="{{route ('coordinator.finance.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <input type="hidden" name="program" value="{{$program->id}}">
                            <div class="form-group">
                                <label>Name: </label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Type: </label>
                                <select name="type" class="custom-select">
                                    <option hidden>Select Type</option>
                                    <option value="0">Income</option>
                                    <option value="1">Expenditure</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Value: </label>
                                <input type="text" class="form-control" name="value" required>
                            </div>
                            <div class="form-group">
                                <label>Proof of Payment: </label>
                                <i class="fa fa-clipboard"></i>
                                <input type="file" class="form-control" name="proof_of_payment" required>
                            </div>

                        </div>
                        <div class="form-group">
                            <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Add Finance</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100 ver1">

                <div class="">
                    <div class="table100-nextcols boxScroll">
                        <table>
                            <thead>
                            <tr class="row100 head">
                                <th class="cell100 column2">Name</th>
                                <th class="cell100 column6">Type</th>
                                <th class="cell100 column6">Value</th>
                                <th class="cell100 column6">Attachment</th>
                                <th class="cell100 column3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($finances as $finance)
                                <tr class="row100 body">
                                    <td class="cell100 column2">
                                        {{$finance->name}}
                                    </td>
                                    <td class="cell100 column3">
                                        @if($finance->type == '0')
                                            <div class="text-success">Income</div>
                                        @elseif($finance->type == '1')
                                            <div class="text-danger">Expenditure</div>
                                        @endif
                                    </td>
                                    <td class="cell100 column6">
                                        @if($finance->type == '0')
                                            <div class="text-success">+ Rp. {{$finance->value}}</div>
                                        @elseif($finance->type == '1')
                                            <div class="text-danger">- Rp. {{$finance->value}}</div>
                                        @endif
                                    </td>
                                    <td class="cell100 column4">
                                        <a data-toggle="modal"
                                           data-target="#imgview-{{$finance->id}}"
                                           class="btn btn-primary titlelogin">See Detail</a>
                                    </td>
                                    <td class="cell100 column9 d-flex">

                                        {{--                                    edit--}}

                                        <button class="btnA circular purplestar purple-hover iconAct mr-1 p-1" title="Edit"
                                                data-toggle="modal"
                                                data-target="#editFinance-{{$finance->id}}">
                                            <i class="fa fa-pencil"></i>
                                        </button>

                                        {{--                                    delete--}}
                                        <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Delete"
                                                data-toggle="modal"
                                                data-target="#deleteFinance-{{$finance->id}}">
                                            <i class="fa fa-close"></i>
                                        </button>

                                    </td>
                                </tr>

                                {{--        Delete Finance--}}

                                <div class="modal fade" id="deleteFinance-{{ $finance->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Are you sure want to delete this {{ $finance->name }} ?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body d-inline-block text-center" style="text-align: left;">
                                                <form action="{{ route('coordinator.finance.destroy', $finance) }}" method="post" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover widthSubmitButton">Yes</button>
                                                </form>
                                                <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover widthSubmitButton" data-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--            modal edit finance--}}
                                <div class="modal fade" id="editFinance-{{$finance->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content card-bg-change">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold">Edit {{$finance->name}} </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                    <form action="{{route ('coordinator.finance.update',$finance)}}" method="POST" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_method" value="PATCH">
                                                            <div class="form-group">
                                                                <label>Name: </label>
                                                                <input type="text" class="form-control" name="name" value="{{$finance->name}}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Type: </label>
                                                                <select name="type" class="custom-select">

                                                                        @if($finance->type == '0')
                                                                        <option hidden value="0">Income</option>
                                                                        @elseif($finance->type == '1')
                                                                        <option hidden value="1">Expenditure</option>
                                                                        @endif
                                                                    <option value="0">Income</option>
                                                                    <option value="1">Expenditure</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Value: </label>
                                                                <input type="text" class="form-control" name="value" value="{{$finance->value}}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Proof of Payment: </label>
                                                                <input type="file" class="form-control" name="proof_of_payment">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Edit Finance</button>
                                                        </div>
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--                    modal image--}}
                                <div class="modal fade" id="imgview-{{$finance->id}}">
                                    <div class="modal-dialog">
                                        <div class="modalpic-content">
                                            <!-- Modal body -->
                                            <div class="modalpic-body text-center">
                                                <button type="button" class="close btn-modal" data-dismiss="modal">&times;</button>
                                                <img src="/files/finance/{{$finance->proof_of_payment}}" alt="image" class="card-img">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
