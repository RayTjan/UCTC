@extends('layouts.app')
@section('title', 'fund')
@section('content')

    <div class="d-flex justify-content-between">
        <h1 class="col font-weight-bold">Request Pencairan fund ist</h1>
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
                            @foreach($requestedfunds as $fund)
                                <tr class="row100 body">
                                    <td class="cell100 column2">
                                        {{$fund->name}}
                                    </td>
                                    <td class="cell100 column3">
                                        Apa ini
                                    </td>
                                    <td class="cell100 column6">
                                        {{$fund->value}}
                                    </td>
                                    <td class="cell100 column4">
                                        <a data-toggle="modal"
                                           data-target="#imgview-{{$fund->id}}"
                                           class="btn btn-primary titlelogin">See Detail</a>
                                    </td>
                                    <td class="cell100 column3">
                                        @if($fund->status == '0')
                                            <div class="text-primary">Pending</div>
                                        @elseif($fund->status == '1')
                                            <div class="text-danger">Approved</div>
                                        @elseif($fund->status == '2')
                                            <div class="text-danger">Rejected</div>
                                        @endif
                                    </td>
                                    <td class="cell100 column9 d-flex">

                                        @if($fund->note != null)
                                            {{--                                    approve--}}
                                            {{ csrf_field() }}
                                            <button class="btnA circular greenstar green-hover iconAct mr-1 p-1 "
                                                    title="Approve"
                                                    data-toggle="modal"
                                                    data-target="#rejectNote-{{$fund->id}}">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        @endif

                                        @if($fund->status == '0' || $fund->status == '3')
                                            {{--                                    approve--}}
                                            <form action="{{route('coordinator.fund.approve', $fund->id)}}" class="p-0 m-0"
                                                  method="POST">
                                                {{ csrf_field() }}
                                                <button class="btnA circular greenstar green-hover iconAct mr-1 p-1 " title="Approve">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </form>
                                        @endif

                                        @if($fund->status != '2' && $fund->status != '3')
                                            {{--                                    reject--}}
                                            <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Reject"
                                                    data-toggle="modal"
                                                    data-target="#rejectNote-{{$fund->id}}">
                                                <i class="fa fa-stop"></i>
                                            </button>
                                            </form>
                                        @endif

                                        {{--                                    edit--}}

                                        <button class="btnA circular purplestar purple-hover iconAct mr-1 p-1" title="Edit"
                                                data-toggle="modal"
                                                data-target="#editfund-{{$fund->id}}">
                                            <i class="fa fa-pencil"></i>
                                        </button>

                                        {{--                                    delete--}}
                                        <form action="{{route('coordinator.fund.destroy', $fund)}}"
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
                                <div class="modal fade" id="rejectNote-{{$fund->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content card-bg-change">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold">Edit {{$fund->name}} </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                <form action="{{route('coordinator.fund.reject', $fund->id)}}" class="p-0 m-0"
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
                                                        <button class="btnA circular redstar font-weight-bold p-2 red-hover" type="submit">Reject fund</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--            modal note--}}
                                <div class="modal fade" id="note-{{$fund->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content card-bg-change">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold">Note From Coor </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                <p>{{$fund->note}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--            modal edit fund--}}
                                <div class="modal fade" id="editfund-{{$fund->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content card-bg-change">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold">Edit {{$fund->name}} </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                <form action="{{route ('coordinator.fund.update',$fund)}}" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="PATCH">
                                                        <div class="form-group">
                                                            <label>Name: </label>
                                                            <input type="text" class="form-control" name="name" value="{{$fund->name}}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Value: </label>
                                                            <input type="text" class="form-control" name="value" value="{{$fund->value}}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Date: </label>
                                                            <input type="date" class="form-control" name="date" value="{{ $fund->date }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description: </label>
                                                            <textarea type="text" class="form-control" name="description" required>{{ $fund->description }}</textarea>
                                                        </div>
                                                    <div class="form-group text-center">
                                                        <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Edit fund</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--                    modal image--}}
                                <div class="modal fade" id="imgview-{{$fund->id}}">
                                    <div class="modal-dialog">
                                        <div class="modalpic-content">
                                            <!-- Modal body -->
                                            <div class="modalpic-body text-center">
                                                <button type="button" class="close btn-modal" data-dismiss="modal">&times;</button>
                                                <img src="/files/fund/{{$fund->proof_of_payment}}" alt="image" class="card-img">
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
