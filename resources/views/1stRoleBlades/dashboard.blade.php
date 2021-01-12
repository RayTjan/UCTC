@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <h1 class="font-weight-bold">DASHBOARD</h1>

        <div class="big">
            <div class="smol1">
                <div class="position-relative">
                    <h3 class="font-weight-bold">Recents</h3>
                    <a href="{{ route('admin.program.index') }}" class="seeall">see all</a>
                </div>
                <div class="d-flex boxScroll">
                    @foreach($programs as $program)
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box inner-bg-change">
                            <div class="inner inner-bg-change">
                                <h2 class="font-weight-bold">{{$program->name}}</h2>

                                <p>{{ str_replace("-","/",date("m-d-Y", strtotime($program->program_date))) }}</p>
                            </div>
                            <a href="{{route('admin.program.show',$program)}}" class="small-box-footer blackhex">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


        <p  class="smol3">
            Sartorial kogi taxidermy, kickstarter synth yr irony ennui everyday carry
            retro helvetica stumptown cloud bread squid echo park. Etsy cloud bread
            sartorial quinoa tacos beard mumblecore shaman tumblr pop-up. Twee retro
            fingerstache af helvetica pabst 8-bit leggings taiyaki portland ramps tbh
            tumblr vinyl. Neutra humblebrag bushwick portland subway tile plaid, offal
            scenester flexitarian cliche squid small batch palo santo. Palo santo meh
            adaptogen +1 3 wolf moon, listicle brunch ethical fanny pack everyday
            carry fam. Offal fingerstache taxidermy, man bun venmo PBR&amp;B helvetica
            thundercats everyday carry tote bag artisan cray wolf jianbing.
        </p>


            <div class="smol2">
                <div class="{{--card-header--}}">
{{--                    <h3 class="card-title">--}}
{{--                        <i class="ion ion-clipboard mr-1"></i>--}}
{{--                        Tasks List--}}
{{--                    </h3>--}}

                    <div class="position-relative">
                        <h3 class="font-weight-bold">Request List</h3>
                        <a href="{{ route('admin.proposal.index') }}" class="seeall">see all</a>
                    </div>

{{--                    <div class="card-tools">--}}
{{--                        <ul class="pagination pagination-sm">--}}
{{--                            <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>--}}
{{--                            <li class="page-item"><a href="#" class="page-link">1</a></li>--}}
{{--                            <li class="page-item"><a href="#" class="page-link">2</a></li>--}}
{{--                            <li class="page-item"><a href="#" class="page-link">3</a></li>--}}
{{--                            <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
                <!-- /.card-header -->
                <div class="card card-body card-bg-change" style="height: 250px;">
                    <div class="scrollWebkit p-0">
                    <ul class="todo-list">

                        <li>
                            <!-- drag handle -->
                            <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                            <!-- checkbox -->
                            <input type="checkbox" value="" name="">
                            <!-- todo text -->
                            <span class="text">Proposal gan</span>
                            <div class="float-right">
                                <p class="">05/11/2020</p>
                            </div>
                        </li>

                        <li>
                            <!-- drag handle -->
                            <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                            <!-- checkbox -->
                            <input type="checkbox" value="" name="">
                            <!-- todo text -->
                            <span class="text">Unch</span>
                            <div class="float-right">
                                <p class="">05/11/2020</p>
                            </div>
                        </li>

                        <li>
                            <!-- drag handle -->
                            <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                            <!-- checkbox -->
                            <input type="checkbox" value="" name="">
                            <!-- todo text -->
                            <span class="text">Proposal gan</span>
                            <div class="float-right">
                                <p class="">05/11/2020</p>
                            </div>
                        </li>

                        <li>
                            <!-- drag handle -->
                            <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                            <!-- checkbox -->
                            <input type="checkbox" value="" name="">
                            <!-- todo text -->
                            <span class="text">Proposal gan</span>
                            <div class="float-right">
                                <p class="">05/11/2020</p>
                            </div>
                        </li>

                        <li>
                            <!-- drag handle -->
                            <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                            <!-- checkbox -->
                            <input type="checkbox" value="" name="">
                            <!-- todo text -->
                            <span class="text">Proposal gan</span>
                            <div class="float-right">
                                <p class="">05/11/2020</p>
                            </div>
                        </li>

                        <li>
                            <!-- drag handle -->
                            <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                            <!-- checkbox -->
                            <input type="checkbox" value="" name="">
                            <!-- todo text -->
                            <span class="text">Proposal gan</span>
                            <div class="float-right">
                                <p class="">05/11/2020</p>
                            </div>
                        </li>

                        <li>
                            <!-- drag handle -->
                            <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                            <!-- checkbox -->
                            <input type="checkbox" value="" name="">
                            <!-- todo text -->
                            <span class="text">Proposal gan</span>
                            <div class="float-right">
                                <p class="">05/11/2020</p>
                            </div>
                        </li>

                        <li>
                            <!-- drag handle -->
                            <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                            <!-- checkbox -->
                            <input type="checkbox" value="" name="">
                            <!-- todo text -->
                            <span class="text">Proposal gan</span>
                            <div class="float-right">
                                <p class="">05/11/2020</p>
                            </div>
                        </li>

                    </ul>
                    </div>
                </div>
                <!-- /.card-body -->
{{--                <div class="card-footer clearfix">--}}
{{--                    <button type="button" class="btn btn-info float-right"><i class="fa fa-plus"></i> Add item</button>--}}
{{--                </div>--}}
            </div>
            <!-- /.card -->
            </section>


        </div>
    </div>
@endsection
