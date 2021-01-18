@extends('layouts.app')
@section('title', 'dana')
@section('content')

    <div class="d-flex justify-content-between">
        <h1 class="col font-weight-bold">Request Pencairan Dana ist</h1>
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
                            @foreach($requesteddanas as $dana)
                                <tr class="row100 body">
                                    <td class="cell100 column2">
                                        {{$dana->name}}
                                    </td>
                                    <td class="cell100 column3">
                                        Apa ini
                                    </td>
                                    <td class="cell100 column6">
                                        {{$dana->value}}
                                    </td>
                                    <td class="cell100 column4">
                                        <a data-toggle="modal"
                                           data-target="#imgview-{{$dana->id}}"
                                           class="btn btn-primary titlelogin">See Detail</a>
                                    </td>
                                    <td class="cell100 column3">
                                        @if($dana->status == '0')
                                            <div class="text-primary">Pending</div>
                                        @elseif($dana->status == '1')
                                            <div class="text-danger">Approved</div>
                                        @elseif($dana->status == '2')
                                            <div class="text-danger">Rejected</div>
                                        @endif
                                    </td>
                                    <td class="cell100 column9 d-flex">

                                        @if($dana->note != null)
                                            {{--                                    approve--}}
                                            {{ csrf_field() }}
                                            <button class="btnA circular greenstar green-hover iconAct mr-1 p-1 "
                                                    title="Approve"
                                                    data-toggle="modal"
                                                    data-target="#rejectNote-{{$dana->id}}">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        @endif

                                        @if($dana->status == '0' || $dana->status == '3')
                                            {{--                                    approve--}}
                                            <form action="{{route('admin.dana.approve', $dana->id)}}" class="p-0 m-0"
                                                  method="POST">
                                                {{ csrf_field() }}
                                                <button class="btnA circular greenstar green-hover iconAct mr-1 p-1 " title="Approve">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </form>
                                        @endif

                                        @if($dana->status != '2' && $dana->status != '3')
                                            {{--                                    reject--}}
                                            <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Reject"
                                                    data-toggle="modal"
                                                    data-target="#rejectNote-{{$dana->id}}">
                                                <i class="fa fa-stop"></i>
                                            </button>
                                            </form>
                                        @endif

                                        {{--                                    edit--}}

                                        <button class="btnA circular purplestar purple-hover iconAct mr-1 p-1" title="Edit"
                                                data-toggle="modal"
                                                data-target="#editdana-{{$dana->id}}">
                                            <i class="fa fa-pencil"></i>
                                        </button>

                                        {{--                                    delete--}}
                                        <form action="{{route('admin.dana.destroy', $dana)}}"
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
                                <div class="modal fade" id="rejectNote-{{$dana->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content card-bg-change">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold">Edit {{$dana->name}} </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                <form action="{{route('admin.dana.reject', $dana->id)}}" class="p-0 m-0"
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
                                                        <button class="btnA circular redstar font-weight-bold p-2 red-hover" type="submit">Reject dana</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--            modal note--}}
                                <div class="modal fade" id="note-{{$dana->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content card-bg-change">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold">Note From Coor </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                <p>{{$dana->note}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--            modal edit dana--}}
                                <div class="modal fade" id="editdana-{{$dana->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content card-bg-change">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold">Edit {{$dana->name}} </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                <form action="{{route ('admin.dana.update',$dana)}}" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="PATCH">
                                                        <div class="form-group">
                                                            <label>Name: </label>
                                                            <input type="text" class="form-control" name="name" value="{{$dana->name}}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Value: </label>
                                                            <input type="text" class="form-control" name="value" value="{{$dana->value}}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Date: </label>
                                                            <input type="date" class="form-control" name="date" value="{{ $dana->date }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description: </label>
                                                            <textarea type="text" class="form-control" name="description" required>{{ $dana->description }}</textarea>
                                                        </div>
                                                    <div class="form-group text-center">
                                                        <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Edit dana</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--                    modal image--}}
                                <div class="modal fade" id="imgview-{{$dana->id}}">
                                    <div class="modal-dialog">
                                        <div class="modalpic-content">
                                            <!-- Modal body -->
                                            <div class="modalpic-body text-center">
                                                <button type="button" class="close btn-modal" data-dismiss="modal">&times;</button>
                                                <img src="/files/dana/{{$dana->proof_of_payment}}" alt="image" class="card-img">
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
