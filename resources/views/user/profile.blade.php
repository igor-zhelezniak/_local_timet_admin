@extends('layouts.app')

@section('content')
    <section class="content">

        <div class="row">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="false">×</button>
                </div>
            @endif

                <div class="alert alert-danger alert-dismissible" style="display: none">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="false">×</button>
                </div>
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        @if(!empty(UserInfo::getUserProfilePhoto(Auth::user()->id)))
                        <img class="profile-user-img img-responsive img-circle" src="{{asset('uploads/users/profile')
                            . '/' . Auth::user()->company_id . '/' . Auth::user()->id . '/'
                            . UserInfo::getUserProfilePhoto(Auth::user()->id)}}?{{ rand() }}"
                             alt="{{UserInfo::getUserName(Auth::user()->id)}}">
                        @else
                            <img src="{{asset('uploads/users/profile/no-profile-photo.png')}}"
                                 class="profile-user-img img-responsive img-circle"
                                 alt="{{UserInfo::getUserName(Auth::user()->id)}}">
                        @endif

                        <h3 class="profile-username text-center">{{UserInfo::getUserName(Auth::user()->id)}}</h3>

                        <p class="text-muted text-center">{{UserInfo::getUserDepartment(Auth::user()->id)}}</p>

                        {{--
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Hours today</b> <a class="pull-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Hours weekly</b> <a class="pull-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Hours total</b> <a class="pull-right">13,287</a>
                                </li>
                            </ul>
                        --}}
                        {!! Form::open(['url' => 'uploadUserPhoto', 'files'=>true, 'id' => 'userPhoto']) !!}
                        {{ Form::hidden('userId', Auth::user()->id) }}
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::file('userProfileFile') !!}
                            </div>
                        </div>
                        <br>
                            {!! Form::submit('Upload', array('class'=>'btn btn-primary btn-block text-bold')) !!}
                        {!! Form::close() !!}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                {{--
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted">Malibu, California</p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                        <p>
                            <span class="label label-danger">UI Design</span>
                            <span class="label label-success">Coding</span>
                            <span class="label label-info">Javascript</span>
                            <span class="label label-warning">PHP</span>
                            <span class="label label-primary">Node.js</span>
                        </p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.box-body -->
                </div>--}}
                <!-- /.box -->
            </div>


            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        {{--
                        <li class=""><a href="#activity" data-toggle="tab" aria-expanded="false">Activity</a></li>
                        <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Timeline</a></li>
                        --}}
                        <li class="active"><a href="#settings" data-toggle="tab" aria-expanded="true">Settings</a></li>
                        @if(Auth::user()->hasRole(1))
                            <li><a href="#company_settings" data-toggle="tab" aria-expanded="true">Company Settings</a></li>
                        @endif
                    </ul>
                    <div class="tab-content">
                        {{--
                        <div class="tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                    <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                                    <span class="description">Shared publicly - 7:30 PM today</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore the hate as they create awesome
                                    tools to help create filler text for everyone from bacon lovers
                                    to Charlie Sheen fans.
                                </p>
                                <ul class="list-inline">
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                    </li>
                                    <li class="pull-right">
                                        <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                            (5)</a></li>
                                </ul>

                                <input class="form-control input-sm" type="text" placeholder="Type a comment">
                            </div>
                            <!-- /.post -->

                            <!-- Post -->
                            <div class="post clearfix">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                                    <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                                    <span class="description">Sent you a message - 3 days ago</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore the hate as they create awesome
                                    tools to help create filler text for everyone from bacon lovers
                                    to Charlie Sheen fans.
                                </p>

                                <form class="form-horizontal">
                                    <div class="form-group margin-bottom-none">
                                        <div class="col-sm-9">
                                            <input class="form-control input-sm" placeholder="Response">
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.post -->

                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                                    <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                                    <span class="description">Posted 5 photos - 5 days ago</span>
                                </div>
                                <!-- /.user-block -->
                                <div class="row margin-bottom">
                                    <div class="col-sm-6">
                                        <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
                                                <br>
                                                <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">
                                                <br>
                                                <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <ul class="list-inline">
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                    </li>
                                    <li class="pull-right">
                                        <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                            (5)</a></li>
                                </ul>

                                <input class="form-control input-sm" type="text" placeholder="Type a comment">
                            </div>
                            <!-- /.post -->
                        </div>
                        --}}
                        <!-- /.tab-pane -->
                            {{--
                        <div class="tab-pane" id="timeline">
                            <!-- The timeline -->
                            <ul class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-envelope bg-blue"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                        <div class="timeline-body">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                            quora plaxo ideeli hulu weebly balihoo...
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs">Read more</a>
                                            <a class="btn btn-danger btn-xs">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-user bg-aqua"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                        <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                                        </h3>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-comments bg-yellow"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                        <div class="timeline-body">
                                            Take me to your leader!
                                            Switzerland is small and neutral!
                                            We are more like Germany, ambitious and misunderstood!
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-camera bg-purple"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                        <div class="timeline-body">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <li>
                                    <i class="fa fa-clock-o bg-gray"></i>
                                </li>
                            </ul>
                        </div>
                            --}}
                        <!-- /.tab-pane -->


                            <script>
                                $(document).ready(function() {
                                    $('#profile-settings').submit(function (e) {
                                        e.preventDefault();

                                        var dataString = $('#profile-settings').serialize();

                                        console.log(dataString);
                                        $.ajax({
                                            type: 'POST',
                                            url: '/updateProfile',
                                            data: dataString,
                                            dataType: 'json',
                                            success: function (result) {
                                                console.log(result);
                                                if(result.type === 'success'){
                                                    $(".alert.alert-danger.alert-dismissible").removeClass()
                                                        .addClass('alert alert-success alert-dismissible').show()
                                                        .html(result.message).fadeIn().delay(5000).fadeOut();
                                                } else {
                                                    $(".alert.alert-danger.alert-dismissible").show()
                                                        .html(result.message).fadeIn().delay(5000).fadeOut();
                                                }
                                            }
                                        });

                                    });
                                });
                            </script>
                        <div class="tab-pane active" id="settings">

                            <form class="form-horizontal" id="profile-settings" method="post" action="">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" value="{{ $user->name }}" placeholder="Name" name="inputName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" value="{{ $user->email }}" placeholder="Email" name="inputEmail">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience" placeholder="Experience" name="inputExperience"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills" name="inputSkills">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @if(Auth::user()->hasRole(1))
                            <div class="tab-pane" id="company_settings">

                                <form class="form-horizontal" id="company-settings" method="post" action="/admin/updateCompany" enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <div class="form-group">

                                        <div class="col-sm-10">
                                            @if($errors->any())
                                                @foreach ($errors->all() as $error)
                                                    <div class="alert alert-error">{{ $error }}</div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

{{--                                    <div class="form-group">
                                        <label for="inputSkills" class="col-sm-2 control-label">Country</label>

                                        <div class="col-sm-10">
                                            {{ Form::select('country', [null => 'Select Country'] + $countries, $company->country, ['class' => 'form-control']) }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSkills" class="col-sm-2 control-label">City</label>

                                        <div class="col-sm-10">
                                            {{ Form::select('city', $cities, $company->city, ['class' => 'form-control']) }}
                                        </div>
                                    </div>--}}

                                    <div class="form-group">
                                        <label for="inputSkills" class="col-sm-2 control-label">Address</label>

                                        <div class="col-sm-10">
                                            <input type="text" name="adress" value="{{ $company->adress }}" class="form-control" placeholder="Adress">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSkills" class="col-sm-2 control-label">Timezone</label>

                                        <div class="col-sm-10">
                                            {{ Form::select('timezone', ['Select Timezone'] + $timezones->all(), $company->timezone, ['class' => 'form-control']) }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSkills" class="col-sm-2 control-label">Phone Number</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $company->phone_number }}" placeholder="Phone number" name="phone_number">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSkills" class="col-sm-2 control-label">Company Logo</label>

                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" value="{{ $company->company_logo }}" name="companyLogo">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSkills" class="col-sm-2 control-label">Nominal</label>

                                        <div class="col-sm-10">
                                            <div class="radio">
                                                <label><input type="radio" value="1" {{ $company->nominal == 1 ? 'checked' : '' }} name="nominal">Decimal Notation</label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    Select this if you want (for instance) <strong>one hour and fifteen minutes</strong> presented as <strong>1.25</strong>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" value="2" {{ $company->nominal == 2 ? 'checked' : '' }} name="nominal">Hour Notation</label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    Select this if you want (for instance) <strong>one hour and fifteen minutes</strong> presented as <strong>1:25</strong>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <div id="imageResize" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Image resize</h4>
                </div>
                <div class="modal-body">
                    <img id="image" src="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script>

        function ajaxGetCityByCountry() {
            var el = $(this).find(':selected').val();
            $('select[name=city]').empty();
            $.get('/ajaxGetCity/' + el,function (data) {
                var json = JSON.parse(data);
                $.each(json, function(i, value) {
                    $('select[name=city]').append($('<option>').text(value).attr('value', value));
                });
            })

        }

        $(function(){
            $('select[name=country]').on('change', ajaxGetCityByCountry);
        });
    </script>
@endsection