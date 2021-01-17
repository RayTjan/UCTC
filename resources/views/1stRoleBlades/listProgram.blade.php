@extends('layouts.app')
@section('title', 'Program')
@section('content')

    <div class="row">
        <h1 class="col font-weight-bold">Program List</h1>
    </div>

    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100 ver1">
                <div class="table100-firstcol">
                    <table>

                        <thead>
                        <tr class="row100 head">
                            <th class="cell100 column1">Program</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($programs as $program)
                        <tr class="row100 body">
                            <td class="cell100 column1"> {{$program->name}} </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="wrap-table100-nextcols js-pscroll boxScroll">
                    <div class="table100-nextcols">
                        <table>
                            <thead>
                            <tr class="row100 head">
                                <th class="cell100 column2">Status</th>
                                <th class="cell100 column3">PIC</th>
{{--                                <th class="cell100 column4">Client</th>--}}
{{--                                <th class="cell100 column5">Committee</th>--}}
                                <th class="cell100 column6">Program Date</th>
                                <th class="cell100 column7">Type</th>
                                <th class="cell100 column8">Category</th>
                                <th class="cell100 column9">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($programs as $program)
                            <tr class="row100 body">
                                <td class="cell100 column2">
                                    @if($program->status == '0')
                                        <div class="text-primary">Pending</div>
                                    @elseif($program->status == '1')
                                        <div class="text-info">Ongoing</div>
                                    @elseif($program->status == '2')
                                        <div class="text-success">Finished</div>
                                    @elseif($program->status == '3')
                                        <div class="text-danger">Suspended</div>
                                    @endif
                                </td>
                                <td class="cell100 column3">{{$program->creator->identity->name}}</td>
{{--                                <td class="cell100 column4">--}}
{{--                                    <select name="category" class="custom-select">--}}
{{--                                        @foreach($clients as $client)--}}
{{--                                            <option value="">{{$client->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </td>--}}
{{--                                <td class="cell100 column5">--}}
{{--                                    <select name="category" class="custom-select">--}}
{{--                                        @foreach($committees as $committee)--}}
{{--                                            <option value="">{{$committee->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </td>--}}
                                <td class="cell100 column6">{{ str_replace("-","/",date("d-m-Y", strtotime($program->program_date))) }}</td>
                                <td class="cell100 column7">{{$program->classified->name}}</td>
                                <td class="cell100 column8">{{$program->categorized->name}}</td>
                                <td class="cell100 column9 d-flex">
{{--                                    detail--}}
                                    <form action="{{route('admin.program.show', $program)}}" class="p-0 m-0"
                                          method="GET">
                                        {{ csrf_field() }}
                                        <button class="btnA circular bluestar blue-hover iconAct mr-1 p-1" title="Detail">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>

                                    @if($program->status == '0' || $program->status == '3')
{{--                                    approve--}}
                                    <form action="{{route('admin.program.approve', $program->id)}}" class="p-0 m-0"
                                          method="POST">
                                        {{ csrf_field() }}
                                        <button class="btnA circular greenstar green-hover iconAct mr-1 p-1 " title="Approve">
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </form>
                                    @endif

                                    @if($program->status != '2' && $program->status != '3')
{{--                                    suspend--}}
                                    <form action="{{route('admin.program.suspend', $program->id)}}" class="p-0 m-0"
                                          method="POST">
                                        {{ csrf_field() }}
                                        <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Suspend">
                                            <i class="fa fa-stop"></i>
                                        </button>
                                    </form>
                                    @endif

{{--                                    delete--}}
                                    <form action="{{route('admin.program.suspend', $program->id)}}" class="p-0 m-0"
                                          method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btnA circular redstar red-hover iconAct mr-1 p-1" title="Delete">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
