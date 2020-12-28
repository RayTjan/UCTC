@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <h1>DASHBOARD</h1>

        <div class="big">
            <div class="smol1">
                <div class="position-relative">
                    <h3 class="font-weight-bold">Recents</h3>
                    <a href="{{ route('program.index') }}" class="seeall">see all</a>
                </div>
                <div class="row">
                    @foreach($programs as $program)
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box inner-bg-change">
                            <div class="inner inner-bg-change">
                                <h2 class="font-weight-bold">{{$program->name}}</h2>

                                <p>{{$program->program_date}}</p>
                            </div>
                            <a href="{{route('program.show',$program)}}" class="small-box-footer blackhex">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                        <h3 class="font-weight-bold">Tasks List</h3>
                        <a href="{{ route('task.index') }}" class="seeall">see all</a>
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
                <div class="card card-body direct-chat-messages card-bg-change">
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
                            <span class="text">Design a nice theme</span>
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
                            <span class="text">Design a nice theme</span>
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
                            <span class="text">Design a nice theme</span>
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
                            <span class="text">Design a nice theme</span>
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
                            <span class="text">Design a nice theme</span>
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
                            <span class="text">Design a nice theme</span>
                            <div class="float-right">
                                <p class="">05/11/2020</p>
                            </div>
                        </li>

                    </ul>
                </div>
                <!-- /.card-body -->
{{--                <div class="card-footer clearfix">--}}
{{--                    <button type="button" class="btn btn-info float-right"><i class="fa fa-plus"></i> Add item</button>--}}
{{--                </div>--}}
            </div>
            <!-- /.card -->
            </section>


        </div>
        <p>
            Post-ironic hot chicken salvia yr yuccie ugh cold-pressed keffiyeh franzen
            viral taxidermy mustache slow-carb crucifix vape. Taiyaki yuccie hell of
            tacos PBR&amp;B, kitsch meggings tbh truffaut kickstarter mixtape af kogi.
            Fingerstache vegan tofu waistcoat gentrify cray. Drinking vinegar 3 wolf
            moon health goth craft beer master cleanse. Letterpress health goth 8-bit
            chillwave craft beer brooklyn. Chicharrones master cleanse 8-bit,
            mumblecore copper mug messenger bag poutine lomo kale chips flannel. Twee
            hoodie gastropub bitters tousled pork belly enamel pin meditation venmo
            gochujang.
        </p>
        <p>
            Next level selfies cronut ethical. Tofu tumblr you probably haven't heard
            of them, man braid literally forage swag chillwave. Pug yr flannel
            tumeric. Coloring book yr chillwave snackwave, shoreditch shaman gentrify
            typewriter tumeric DIY copper mug small batch. Scenester waistcoat YOLO
            hexagon kombucha poke 8-bit meditation. Selvage scenester forage
            williamsburg. Hoodie fingerstache tacos mustache, hashtag quinoa next
            level sartorial craft beer retro disrupt lo-fi.
        </p>
        <p>
            YOLO twee keytar farm-to-table flexitarian cardigan polaroid lumbersexual
            adaptogen drinking vinegar echo park dreamcatcher. Brunch shoreditch
            dreamcatcher iPhone knausgaard plaid edison bulb letterpress ethical yr
            fanny pack. Typewriter portland woke glossier cronut, post-ironic migas
            gentrify letterpress cray brunch lyft 8-bit master cleanse. Pitchfork
            thundercats organic pour-over unicorn lomo.
        </p>
        <p>
            Ugh yr tacos aesthetic everyday carry, tumeric selvage cliche skateboard.
            Wolf truffaut enamel pin vexillologist poutine. Hoodie roof party pabst,
            cardigan letterpress af disrupt +1 subway tile chillwave live-edge
            meggings next level readymade. Master cleanse gentrify hashtag, stumptown
            fam single-origin coffee occupy dreamcatcher air plant viral vexillologist
            enamel pin meggings. Tumblr chambray pickled microdosing austin scenester
            green juice.
        </p>
        <p>
            Austin four dollar toast church-key, vaporware hoodie edison bulb jean
            shorts sustainable williamsburg plaid helvetica scenester lomo humblebrag.
            Meditation tumblr kickstarter ennui williamsburg taiyaki pabst pour-over.
            8-bit godard cred, chillwave enamel pin skateboard you probably haven't
            heard of them. Meditation before they sold out single-origin coffee swag
            try-hard jianbing slow-carb shaman leggings. Palo santo shabby chic
            whatever man bun. Master cleanse wayfarers single-origin coffee pork belly
            cronut, normcore cliche jianbing before they sold out tousled shabby chic
            af pop-up gentrify. Direct trade la croix vexillologist jianbing,
            flexitarian selvage try-hard stumptown polaroid shaman wayfarers poke
            ramps food truck swag.
        </p>
        <p>
            Pok pok lumbersexual wayfarers, direct trade leggings poutine truffaut
            kitsch. Seitan aesthetic master cleanse squid coloring book banh mi YOLO
            vegan locavore vexillologist readymade next level pop-up edison bulb.
            Selvage knausgaard literally, quinoa photo booth 3 wolf moon microdosing
            freegan yuccie. Truffaut gentrify lomo put a bird on it waistcoat. Ugh
            austin distillery, tbh actually pork belly snackwave artisan mixtape
            quinoa vexillologist pok pok polaroid listicle readymade.
        </p>
        <p>
            Hammock letterpress prism dreamcatcher truffaut shabby chic vice
            cold-pressed. Franzen pug fashion axe before they sold out, tumblr irony
            kogi actually af bushwick banh mi. Snackwave bicycle rights tofu
            dreamcatcher tote bag pour-over meditation raw denim fanny pack. Pop-up
            retro taiyaki meditation twee gastropub VHS etsy. Semiotics gochujang
            street art normcore, edison bulb farm-to-table pour-over taxidermy
            brooklyn.
        </p>
    </div>
@endsection
