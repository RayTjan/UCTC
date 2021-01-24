@extends('layouts.app')
@section('title', 'Fund')
@section('content')

    <div class="d-flex justify-content-between">
        <h1 class="col font-weight-bold">Fund List {{$program->name}}</h1>

                @if($addAvailability == true)
            <div class="clearfix">
                {{-- auth to limit content, it cannot be accessed until login --}}
                <div class="float-right">
                    {{--                <a href="{{route('action.create')}}" class="btn btn-primary btn-block" role="button" aria-pressed="true">New action</a>--}}
                    <a role="button" aria-pressed="true"
                       title="Add fund"
                       data-toggle="modal"
                       data-target="#addfund">
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
                                    fill="#fff"
                                    d="m408,184h-136c-4.418,0 -8,-3.582 -8,-8v-136c0,-22.09 -17.91,-40 -40,-40s-40,17.91 -40,40v136c0,4.418 -3.582,8 -8,8h-136c-22.09,0 -40,17.91 -40,40s17.91,40 40,40h136c4.418,0 8,3.582 8,8v136c0,22.09 17.91,40 40,40s40,-17.91 40,-40v-136c0,-4.418 3.582,-8 8,-8h136c22.09,0 40,-17.91 40,-40s-17.91,-40 -40,-40zM408,184"
                                    class="fa-secondary">
                                </path>
                            </g>
                        </svg>
                    </a>

                </div>
            </div>
                @endif
    </div>

    {{--            modal add fund--}}
    <div class="modal fade" id="addfund">
        <div class="modal-dialog">
            <div class="modal-content card-bg-change">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold">Add fund </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" style="text-align: left;">
                    <form action="{{route ('coordinator.fund.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <input type="hidden" name="program" value="{{$program->id}}">
                            <input type="hidden" name="status" value="0">
                            <div class="form-group">
                                <label>Name: </label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Value: </label>
                                <input type="number" class="form-control" name="value" required>
                            </div>
                            <div class="form-group">
                                <label>Date: </label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <div class="form-group">
                                <label>Description: </label>
                                <textarea type="text" class="form-control" name="description" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Add fund</button>
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
                                <th class="cell100 column6">Value</th>
                                <th class="cell100 column6">Description</th>
                                <th class="cell100 column6">Status</th>
                                <th class="cell100 column6">Note</th>
                                <th class="cell100 column3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($funds as $fund)
                                <tr class="row100 body">
                                    <td class="cell100 column2">
                                        {{$fund->name}}
                                    </td>
                                    <td class="cell100 column6">
                                        Rp. {{$fund->value}}
                                    </td>

                                    <td class="cell100 column3">
                                        <a data-toggle="modal"
                                           data-target="#desc-{{$fund->id}}"
                                           class="btn btn-primary titlelogin">
                                            Desc
                                        </a>
                                    </td>
                                    <td class="cell100 column3">
                                        @if($fund->status == '0')
                                            <div class="text-primary">Pending</div>
                                        @elseif($fund->status == '1')
                                            <div class="text-success">Approved</div>
                                        @elseif($fund->status == '2')
                                            <div class="text-danger">Rejected</div>
                                        @endif
                                    </td>
                                    <td class="cell100 column3">
                                        @if($fund->status == '2')
                                            <a data-toggle="modal"
                                               data-target="#note-{{$fund->id}}"
                                               class="btn btn-danger titlelogin">
                                                Coor's Note
                                            </a>
                                        @else
                                            &nbsp;
                                        @endif
                                    </td>

                                    @if($edit == true)
                                    @if($fund->status == '0')
                                        <td class="cell100 column9 d-flex">

                                            {{--                                    edit--}}

                                            <button class="btnA circular purplestar purple-hover iconAct mr-1 p-1" title="Edit"
                                                    data-toggle="modal"
                                                    data-target="#editfund-{{$fund->id}}">
                                                <i class="fa fa-pencil"></i>
                                            </button>

                                            {{--                                    delete--}}
                                            <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Delete"
                                                    data-toggle="modal"
                                                    data-target="#deletefund-{{$fund->id}}">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </td>
                                    @endif
                                    @endif
                                </tr>

{{--                                delete fund--}}
                                <div class="modal fade" id="deletefund-{{ $fund->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Are you sure want to delete this {{ $fund->name }} ?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body d-inline-block text-center" style="text-align: left;">
                                                <form action="{{ route('coordinator.fund.destroy', $fund) }}" method="post" class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btnA circular redstar font-weight-bold p-2 red-hover widthSubmitButton">Yes</button>
                                                </form>
                                                <button type="button" class="btnA circular bluestar font-weight-bold p-2 blue-hover widthSubmitButton" data-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{--            modal desc--}}
                                <div class="modal fade" id="desc-{{$fund->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content card-bg-change">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold">Description </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                <p>{{$fund->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--            modal note--}}
                                <div class="modal fade" id="note-{{$fund->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-change-red">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold titlelogin">Note From Coor </h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body" style="text-align: left;">
                                                <p class="titlelogin">{{$fund->note}}</p>
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
                                                            <input type="number" class="form-control" name="value" value="{{$fund->value}}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Date: </label>
                                                            <input type="date" class="form-control" name="date" value="{{ $fund->date }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description: </label>
                                                            <textarea type="text" class="form-control" name="description" required>{{ $fund->description }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btnA circular bluestar font-weight-bold p-2 blue-hover" type="submit">Edit fund</button>
                                                    </div>
                                                </form>
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
