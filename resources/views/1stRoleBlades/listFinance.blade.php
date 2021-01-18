@extends('layouts.app')
@section('title', 'Finance')
@section('content')

    <div class="d-flex justify-content-between">
        <h1 class="col font-weight-bold">Finance List</h1>
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
                                <th class="cell100 column6">Status</th>
                                <th class="cell100 column3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($requestedFinances as $finance)
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
                                    <td class="cell100 column3">
                                        @if($finance->status == '0')
                                            <div class="text-primary">Pending</div>
                                        @elseif($finance->type == '1')
                                            <div class="text-danger">Approved</div>
                                        @elseif($finance->type == '2')
                                            <div class="text-danger">Rejected</div>
                                        @endif
                                    </td>
                                    <td class="cell100 column9 d-flex">

                                        @if($finance->status == '0' || $finance->status == '3')
                                            {{--                                    approve--}}
                                            <form action="{{route('admin.finance.approve', $finance->id)}}" class="p-0 m-0"
                                                  method="POST">
                                                {{ csrf_field() }}
                                                <button class="btnA circular greenstar green-hover iconAct mr-1 p-1 " title="Approve">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </form>
                                        @endif

                                        @if($finance->status != '2' && $finance->status != '3')
                                            {{--                                    reject--}}
                                                <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Reject"
                                                        data-toggle="modal"
                                                        data-target="#rejectNote-{{$finance->id}}">
                                                    <i class="fa fa-stop"></i>
                                                </button>
                                            </form>
                                        @endif

                                        {{--                                    edit--}}

                                        <button class="btnA circular purplestar purple-hover iconAct mr-1 p-1" title="Edit"
                                                data-toggle="modal"
                                                data-target="#editFinance-{{$finance->id}}">
                                            <i class="fa fa-pencil"></i>
                                        </button>

                                        {{--                                    delete--}}
                                        <form action="{{route('admin.finance.destroy', $finance)}}"
                                              method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Delete">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>

{{--                                modal reject--}}
                                <div class="modal fade" id="rejectNote-{{$finance->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content card-bg-change">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold">Edit {{$finance->name}} </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                <form action="{{route('admin.finance.reject', $finance->id)}}" class="p-0 m-0"
                                                      method="POST">
                                                    <div class="form-group">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="PATCH">
                                                        <div class="form-group">
                                                            <label>Note: </label>
                                                            <textarea type="text" class="form-control" name="note" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button class="btnA circular redstar font-weight-bold p-2 red-hover" type="submit">Reject Finance</button>
                                                    </div>
                                                </form>
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
                                                <form action="{{route ('admin.finance.update',$finance)}}" method="POST" enctype="multipart/form-data">
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
                                                            <input type="file" class="form-control" name="proof_of_payment" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-center">
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
