@extends('layout.master')

@section('popup')


<div class="form-group add-edu frame-blk">
    <form method="post" action="/profile/{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}">
        {{ csrf_field() }}
        <h1>Add Education</h1>
        <i class="fa exit fa-times fa-fw"></i>
        <div class="all-edus">
            <div class="new-edu">
                <label>Field of study:</label>
                <input type="text" name="major" class="form-control" placeholder="Ex: Computer Science">
                <label>Degree:</label>
                <input type="text" name="degree" class="form-control" placeholder="Ex: Bachelor's">
                <label>School:</label>
                <input type="text" name="school" class="form-control" placeholder="Ex: al-albayt university">
                <div class="form-row">
                    <div class="col">
                        <label>From year:</label>
                        <input type="month" name="fyear" class="form-control">
                    </div>
                    <div class="col">
                        <label>To year (optional=present):</label>
                        <input type="month" name="tyear" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" name="subEdus" value="Save Change" class="btn-sub">
    </form>
</div>

<!-- start Edit education section -->
@if(isset($edus))
@foreach($edus->all() as $edu)
<div class="form-group frame-blk" id="edt-edu{{ $edu->id }}">
    <form method="post" action="/profile/{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <h1>Edit Education</h1>
        <i class="fa exit fa-times fa-fw"></i>
        <div class="all-edus">
            <div class="new-edu">
                <label>Field of study:</label>
                <input type="text" name="major" class="form-control" placeholder="Ex: Computer Science" value="{{ $edu->major }}">
                <label>Degree:</label>
                <input type="text" name="degree" class="form-control" placeholder="Ex: Bachelor's" value="{{ $edu->degree }}">
                <label>School:</label>
                <input type="text" name="school" class="form-control" placeholder="Ex: al-albayt university" value="{{ $edu->school }}">
                <div class="form-row">
                    <div class="col">
                        <label>From year:</label>
                        <input type="month" name="fyear" class="form-control" value="{{ $edu->fyear }}">
                    </div>
                    <div class="col">
                        <label>To year (optional=present):</label>
                        <input type="month" name="tyear" class="form-control" value="{{ $edu->tyear }}">
                    </div>
                </div>
            </div>
        </div>
        <input type="text" hidden name="iid" value="{{ $edu->id }}">
        <input type="submit" name="editEdu" value="Save Change" class="btn-sub" id="{{ $edu->id }}">
    </form>
</div>
@endforeach
@endif
<!-- end Edit education section -->



<!-- Start Edit Experience section -->
@if(isset($exps))
@foreach($exps->all() as $exp)
<div class="form-group frame-blk" id="edt-exp{{$exp->id}}">
    <form method="post" action="/profile/{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <h1>Edit Experience</h1>
        <i class="fa exit fa-times fa-fw"></i>
        <div class="all-exps">
            <div class="new-exp">
                <label>Title:</label>
                <input type="text" name="title" value="{{ $exp->title }}" class="form-control" placeholder="Ex: Web Developer">
                <label>Company:</label>
                <input type="text" name="company" value="{{ $exp->company }}" class="form-control" placeholder="Ex: ProgressSoft">
                <div class="form-row">
                    <div class="col">
                        <label>From year:</label>
                        <input type="month" name="fyear" value="{{ $exp->fyear }}" class="form-control">
                    </div>
                    <div class="col">
                        <label>To year (optional=present):</label>
                        <input type="month" name="tyear" value="{{ $exp->tyear }}" class="form-control">
                    </div>
                </div>
                <label>Description (optional):</label>
                <textarea name="desc" class="form-control">{{ $exp->desc }}</textarea>
            </div>
        </div>
        <input type="text" hidden name="iid" value="{{ $exp->id }}">
        <input type="submit" name="editExp" value="Save Change" class="btn-sub" id="{{ $exp->id }}">
    </form>
</div>
@endforeach
@endif
<!-- End Edit Experience section -->



<!-- Start Edit Language section -->
@if(isset($langs))
@foreach($langs->all() as $lang)
<div class="form-group frame-blk" id="edt-lang{{ $lang->id }}">
    <form method="post" action="/profile/{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}"> 
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <h1>Edit language</h1>
        <i class="fa exit fa-times fa-fw"></i>
        <div class="all-langs">
            <div class="new-lang">
                <label>Language</label>
                <input type="text" name="language" value="{{ $lang->language }}" class="form-control">
                <label>Proficiency</label>
                <select class="form-control" name="level">
                    @foreach($levels as $prof)
                        @if($lang->level == $prof)
                            <option selected>{{ $prof }}</option>
                        @else
                            <option>{{ $prof }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <input type="text" hidden name="iid" value="{{ $lang->id }}">
        <input type="submit" name="editLang" value="Save Change" class="btn-sub">
    </form>
</div>
@endforeach
@endif
<!-- End Edit Language section -->


<!-- Start Edit Skills section -->

@if(isset($skills))
<div class="form-group frame-blk" id="edt-skills">
    <form method="post" action="/profile/{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <h1>Edit Skills</h1>
        <i class="fa exit fa-times fa-fw"></i>
        <label style="display: block">Type a skill then press enter</label>
        <input type="text" class="form-control" id="input-skills">
        <i class="fa fa-plus-circle"></i>
        <div class="clearfix"></div>
        <div class="tags">
            @foreach($skills as $skl)
                <span class="tag-span">
                    <i class="fa fa-times"></i> {{ $skl->skill }}
                    <input hidden type="text" value="{{ $skl->skill }}" name="skills[]">
                </span>
            @endforeach
        </div>
        <input type="text" hidden name="iid" value="{{ $skills[0]->user_id }}">
        <input type="submit" name="editSkills" value="Save" class="btn-sub">
    </form>
</div>
@endif
<!-- End Edit Skills section -->


<div class="form-group add-exp frame-blk">
    <form method="post" action="/profile/{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}">
        {{ csrf_field() }}
        
        <h1>Add Experience</h1>
        <i class="fa exit fa-times fa-fw"></i>
        <div class="all-exps">
            <div class="new-exp">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" placeholder="Ex: Web Developer">
                <label>Company:</label>
                <input type="text" name="company" class="form-control" placeholder="Ex: ProgressSoft">
                <div class="form-row">
                    <div class="col">
                        <label>From year:</label>
                        <input type="month" name="fyear" class="form-control">
                    </div>
                    <div class="col">
                        <label>To year (optional=present):</label>
                        <input type="month" name="tyear" class="form-control">
                    </div>
                </div>
                <label>Description (optional):</label>
                <textarea name="desc" class="form-control"></textarea>
            </div>
        </div>
        <input type="submit" name="subExps" value="Save Change" class="btn-sub">
    </form>
</div>


<div class="form-group add-lang frame-blk">
    <form method="post" action="/profile/{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}"> 
        {{ csrf_field() }}
        <h1>Add language</h1>
        <i class="fa exit fa-times fa-fw"></i>
        <div class="all-langs">
            <div class="new-lang">
                <label>Language</label>
                <input type="text" name="language" class="form-control">
                <label>Proficiency</label>
                <select class="form-control" name="level">
                    @foreach($levels as $prof)
                        <option>{{ $prof }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <input type="submit" name="subLangs" value="Save Change" class="btn-sub">
    </form>
</div>


<div class="form-group add-skill frame-blk">
    <form method="post" action="/profile/{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}">
        {{ csrf_field() }}
        <h1>Add Skills</h1>
        <i class="fa exit fa-times fa-fw"></i>
        <label style="display: block">Type a skill then press enter</label>
        <input type="text" class="form-control" id="input-skills">
        <i class="fa fa-plus-circle"></i>
        <div class="clearfix"></div>
        <div class="tags">

        </div>
        <input type="submit" name="subSkills" value="Save" class="btn-sub">
    </form>
    
</div>
@endsection

@section('content')
    <header>
        <div class="main-info">
            <div class="left-blk">
                @if(isset($user))
                <h1>{{ $user->fname }} {{ $user->lname }}</h1>
                <p>Your next desired role?</p>
                <ul class="fa-ul">
                    <li>
                        <i class="fa-li fa fa-phone"></i>
                        <span>{{ $user->phone }}</span>
                    </li>
                    <li>
                        <i class="fa-li fa fa-at"></i>
                        <span>{{ $user->email }}</span>
                    </li>
                    <li>
                        <i class="fa-li fa fa-link"></i>
                        <span>{{ $user->website }}</span>
                    </li>
                    <li>
                        <i class="fa-li fa fa-map-marker"></i>
                        <span>{{ $user->location }}</span> 
                    </li>
                @endif
                </ul>
            </div>
            <div class="profile-pic">
                <img src="/storage/images/{{ $user->image }}">
            </div>
        </div>
    </header>
    <div class="clear-fix"></div>
    <hr class="fs">
    <div class="education">
        <h2>Education</h2>
        
        @if(isset($edus))
            @foreach($edus->all() as $edu)
                <?php
                static $c = 0;
                if($c++ > 0)
                    echo "<div class='border-dotted'></div>";
                ?>

                <div  onmouseover="getHover(this)" onmouseout="leaveHover(this)" class="edt-edu{{ $edu->id }} blk-edu">
                <p class="major">{{ $edu->degree }} {{ $edu->major }}</p>
                @if(Auth::check())
                    @if($user->id === Auth::user()->id)
                        <div style="margin-top: 17px" onclick="fun(this)" for="edt-edu{{ $edu->id }}" class="plus-add pencil-edit">
                            <i class="fa fa-pencil"></i>
                        </div>
                    @endif
                @endif
                <p class="uni">{{ $edu->school }}</p>
                <i class="fa fa-calendar"></i>
                <span class="start">{{ $edu->fyear }} - </span>
                <span class="end">{{ $edu->tyear }}</span>
                </div>
                
            @endforeach
        @endif

        @if(Auth::check())
            @if($user->id === Auth::user()->id)
                <div class="ins-edu plus-add">
                    <i class="fa fa-plus"></i>
                </div>
            @endif
        @endif
    </div>
    <div class="skills">
        <h2>Skills</h2>
        
        @if(isset($skills))
            @foreach($skills as $skl)
                <span>{{ $skl->skill }}</span>
            @endforeach
        @endif

        @if(Auth::check())
            @if($user->id === Auth::user()->id)
                <div style="display: inline-block;" onclick="fun(this)" for="edt-skills" class="plus-add pencil-edit">
                    <i class="fa fa-pencil"></i>
                </div>
            @endif
        @endif

        @if(Auth::check())
            @if($user->id === Auth::user()->id)
                <div style="margin-top: 65px; margin-right: -17px;" class="ins-skill plus-add">
                    <i class="fa fa-plus"></i>
                </div>
            @endif
        @endif
    </div>
    
    <div class="clear-fix"></div>
    
    <div class="exp">
        <h2>Experience</h2>
        <!--
        <p class="title">Digital Marketer</p>
        <p class="cname">CrossDot Inc.</p>
        <i class="fa fa-calendar"></i>
        <span class="start">9/2017 - </span>
        <span class="end">present</span>
        <p class="desc">Designing and implementing engaging content for the biggest amateur football leagues in Europe.</p>
    -->
        @if(isset($exps))
            @foreach($exps->all() as $exp)
                <?php
                static $a = 0;
                if($a)
                    echo "<div class='border-dotted'></div>";
                    $a++;
                ?>
                <div  onmouseover="getHover(this)" onmouseout="leaveHover(this)" class="edt-exp{{ $exp->id }}">
                    <p class="title">{{ $exp->title }}</p>
                    @if(Auth::check())
                        @if($user->id === Auth::user()->id)
                            <div onclick="fun(this)" for="edt-exp{{ $exp->id }}" class="plus-add pencil-edit">
                                <i class="fa fa-pencil"></i>
                            </div>
                        @endif
                    @endif
                    <p class="cname">{{ $exp->company }}</p>
                    <i class="fa fa-calendar"></i>
                    <span class="start">{{ $exp->fyear }} - </span>
                    <span class="end">{{ $exp->tyear }}</span>
                    <p class="desc">{{ $exp->desc }}</p>
                </div>
                

            @endforeach
        @endif

        @if(Auth::check())
            @if($user->id === Auth::user()->id)
                <div class="ins-exp plus-add">
                    <i class="fa fa-plus"></i>
                </div>
            @endif
        @endif
    </div>
    
    <div class="langs">
        <h2>Languages</h2>
        
        @if(isset($langs))
            @foreach($langs->all() as $lang)
                <?php
                static $b = 0;
                if($b++ > 0){
                    echo "<div class='clearfix'></div>";
                    echo "<div class='border-dotted'></div>";
                    }
                ?>
                <div onmouseover="getHover(this)" onmouseout="leaveHover(this)" class="edt-lang{{ $lang->id }} lang">
                    <p class="lg">{{ $lang->language }}</p>
                    @if(Auth::check())
                        @if($user->id === Auth::user()->id)
                            <div style="margin-top: 5px" onclick="fun(this)" for="edt-lang{{ $lang->id }}" class="plus-add pencil-edit">
                                <i class="fa fa-pencil"></i>
                            </div>
                        @endif
                    @endif
                    <br><br>
                    <span class="lvl">{{ $lang->level }}</span>
                </div>
                
            @endforeach
        @endif

        @if(Auth::check())
            @if($user->id === Auth::user()->id)
                <div class="ins-lang plus-add">
                    <i class="fa fa-plus"></i>
                </div>
            @endif
        @endif
    </div>
    <div class="clear-fix"></div>
    <footer>
        <p>All Rights Reserved. Copyright © 2018</p>
    </footer>
</div>

@endsection