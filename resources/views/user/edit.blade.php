@extends('layouts.app')

@section('content')
    <div class="content content-boxed">
        <!-- User Header -->
        <div class="block">
            <!-- Basic Info -->
            <div class="bg-image" style="background-image: url('assets/img/photos/photo3@2x.jpg');">
                <div class="block-content bg-primary-op text-center overflow-hidden">
                    @if($user->profile)
                    <div class="push-30-t push animated fadeInDown">
                        <a href="{{ route('user.edit') }}" ><img class="img-avatar img-avatar96 img-avatar-thumb" src="<?= $user->profile->user_image ? asset('storage/' . $user->profile->user_image->img_path) : asset('assets/img/avatars/avatar4.jpg') ?>" alt=""></a>
                    </div>
                    @else 
                    <div class="push-30-t push animated fadeInDown">
                        <a href="{{ route('user.edit') }}" ><img class="img-avatar img-avatar96 img-avatar-thumb" src="{{asset('assets/img/avatars/avatar4.jpg')}}" alt=""></a>
                    </div>
                    @endif
                    <div class="push-30 animated fadeInUp">
                        <h2 class="h4 font-w600 text-white push-5">{{ $user->name }}</h2>
                    <h3 class="h5 text-white-op"><?= $user->is_admin ? 'Админ' : 'Пользователь' ?></h3>
                    </div>
                </div>
            </div>
            <!-- END Basic Info -->

            <!-- Stats -->
            <div class="block-content text-center">
                <div class="row items-push text-uppercase">
                    <div class="col-xs-6 col-sm-3">
                        <div class="font-w700 text-gray-darker animated fadeIn">Группа</div>
                    <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)"><?= $user->group ? $user->group->title : 'Админ' ?></a>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <div class="font-w700 text-gray-darker animated fadeIn">Рейтинг</div>
                        <div class="text-warning push-10-t animated flipInX">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Stats -->
        </div>
        <!-- END User Header -->

        <!-- Main Content -->
    <form action="{{ route('profile.save') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="block">
                <ul class="nav nav-tabs nav-justified push-20" data-toggle="tabs">
                    <li class="active">
                        <a href="#tab-profile-personal"><i class="fa fa-fw fa-pencil"></i>Личные данные</a>
                    </li>
                    <li>
                        <a href="#tab-profile-password"><i class="fa fa-fw fa-asterisk"></i> Пароль</a>
                    </li>
                </ul>
                <div class="block-content tab-content">
                    <!-- Personal Tab -->
                    <div class="tab-pane fade in active" id="tab-profile-personal">
                        <div class="row items-push">
                            <div class="col-sm-6 col-sm-offset-3 form-horizontal">
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label>Роль</label>
                                        <div class="form-control-static font-w700"><?= $user->is_admin ? 'Админ' : 'Пользователь' ?></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="profile-email">E-mail</label>
                                    <input class="form-control input-lg" type="email" id="profile-email" name="email" placeholder="Enter your email.." value="{{ auth()->user()->email }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="profile-firstname">Имя</label>
                                        <input class="form-control input-lg" type="text" id="profile-firstname" name="name" placeholder="Enter your firstname.." value="{{ auth()->user()->name }}">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="profile-lastname">Фамилия</label>
                                        <input class="form-control input-lg" type="text" id="last_name" name="lastname" placeholder="Enter your lastname.." value="{{ auth()->user()->profile->last_name ?? '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="profile-bio">Bio</label>
                                        <textarea class="form-control input-lg" id="profile-bio" name="bio" rows="15" placeholder="Enter a few details about yourself..">"{{ auth()->user()->profile->bio ?? ''}}"</textarea>
                                    </div>
                                </div>
                                @if(!$user->is_admin)
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="profile-skills">Skills</label>
                                        <select class="form-control" id="profile-skills" name="skills" size="8" multiple="">
                                            @foreach($skills as $skill)
                                        <option value="{{ $skill->id }}" <?= $skill->id == $user->profile->skills_id ? 'selected' : '' ?>>{{ $skill->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label for="profile-city">Адрес</label>
                                        <input class="form-control input-lg" type="text" id="profile-city" name="address" placeholder="Enter your location.." value="{{ auth()->user()->profile->address ?? '' }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="profile-age">Возраст</label>
                                        <input class="form-control input-lg" type="text" id="profile-age" name="age" placeholder="Enter your age.." value="{{ auth()->user()->profile->age ?? '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12" for="example-file-multiple-input">Фото</label>
                                    <div class="col-xs-12">
                                        <input type="file" id="example-file-multiple-input" name="image" multiple="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12">Пол</label>
                                    <div class="col-xs-12">
                                        <label class="css-input css-radio css-radio-primary push-10-r">
                                            <input type="radio" name="gender" <?= isset(auth()->user()->profile->gender) && auth()->user()->profile->gender == 1 ? 'checked' : '' ?> value='1'><span></span> Муж
                                        </label>
                                        <label class="css-input css-radio css-radio-primary">
                                            <input type="radio" name="gender" <?= isset(auth()->user()->profile->gender) && auth()->user()->profile->gender == 0 ? 'checked' : '' ?> value='0'><span></span> Жен
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Personal Tab -->

                    <!-- Password Tab -->
                    <div class="tab-pane fade" id="tab-profile-password">
                        <div class="row items-push">
                            <div class="col-sm-6 col-sm-offset-3 form-horizontal">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="profile-password">Current Password</label>
                                        <input class="form-control input-lg" type="password" id="profile-password" name="profile-password">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="profile-password-new">New Password</label>
                                        <input class="form-control input-lg" type="password" id="profile-password-new" name="profile-password-new">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label for="profile-password-new-confirm">Confirm New Password</label>
                                        <input class="form-control input-lg" type="password" id="profile-password-new-confirm" name="profile-password-new-confirm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Password Tab -->

                    <!-- Privacy Tab -->
                    <div class="tab-pane fade" id="tab-profile-privacy">
                        <div class="row items-push">
                            <div class="col-sm-6 col-sm-offset-3 form-horizontal">
                                <div class="form-group">
                                    <div class="col-xs-8">
                                        <div class="font-s13 font-w600">Online Status</div>
                                        <div class="font-s13 font-w400 text-muted">Show your status to all</div>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                        <label class="css-input switch switch-sm switch-primary push-10-t">
                                            <input type="checkbox"><span></span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-xs-8">
                                        <div class="font-s13 font-w600">Auto Updates</div>
                                        <div class="font-s13 font-w400 text-muted">Keep up to date</div>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                        <label class="css-input switch switch-sm switch-primary push-10-t">
                                            <input type="checkbox"><span></span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-xs-8">
                                        <div class="font-s13 font-w600">Notifications</div>
                                        <div class="font-s13 font-w400 text-muted">Do you need them?</div>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                        <label class="css-input switch switch-sm switch-primary push-10-t">
                                            <input type="checkbox" checked=""><span></span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-xs-8">
                                        <div class="font-s13 font-w600">API Access</div>
                                        <div class="font-s13 font-w400 text-muted">Enable/Disable access</div>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                        <label class="css-input switch switch-sm switch-primary push-10-t">
                                            <input type="checkbox" checked=""><span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Privacy Tab -->
                </div>
                <div class="block-content block-content-full bg-gray-lighter text-center">
                    <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-check push-5-r"></i> Сохранить</button>
                    <button class="btn btn-sm btn-warning" type="reset"><i class="fa fa-refresh push-5-r"></i> Reset</button>
                </div>
            </div>
        </form>
        <!-- END Main Content -->
    </div>
@endsection