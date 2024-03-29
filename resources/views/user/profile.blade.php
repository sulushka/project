@extends('layouts.app')

@section('content')
    <div class="content content-boxed">
        <!-- User Header -->
        <div class="block">
            <!-- Basic Info -->
            <div class="bg-image" style="background-image: url('assets/img/photos/photo6@2x.jpg');">
                <div class="block-content bg-primary-dark-op text-center overflow-hidden">
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
                    <h2 class="h4 font-w600 text-white push-5">{{ Auth::user()->name }}</h2>
                        <h3 class="h5 text-gray"><?= $user->is_admin ? 'Админ' : 'Пользователь' ?></h3>
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
        <div class="row">
            <div class="col-sm-10">
                <!-- Timeline -->
                <div class="block block-opt-refresh-icon6">
                    <div class="block-header">
                        <ul class="block-options">
                            <li>
                                <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                            </li>
                            <li>
                                <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title"><i class="fa fa-newspaper-o"></i>Обновлено</h3>
                    </div>
                    <div class="block-content">
                        <!-- Facebook Notification -->
                        <div class="block block-transparent pull-r-l">
                            <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">{{ $user->updated_at }}</h3>
                            </div>
                            <div class="block-content">
                                <p class="font-s15">Последние обновления было {{ $user->updated_at->diffForHumans() }}!</p>
                            </div>
                        </div>
                        <!-- END Facebook Notification -->

                        <!-- System Notification -->
                        <div class="block block-transparent pull-r-l">
                            <div class="block-header bg-gray-lighter">
                                <ul class="block-options">
                                    <li>
                                        <span><em class="text-muted"></em></span>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-database text-smooth"></i></span>
                                    </li>
                                </ul>
                                <h3 class="block-title">ДАННЫЕ ПОЛЬЗОВАТЕЛЯ</h3>
                            </div>
                            <div class="block-content">
                            <p class="font-s15">{{$user->name}} <a href="javascript:void(0)">{{ $user->profile->last_name  ?? '' }}</a>.</p>
                            <p class="font-s15">{{$user->group->title ?? '' }} <a href="javascript:void(0)">группа</a>.</p>
                            <p class="font-s15"><a href="javascript:void(0)">Город</a> {{$user->profile->address ?? '' }} .</p>
                            <p class="font-s15"><a href="javascript:void(0)">Возраст</a> {{$user->profile->age ?? '' }} .</p>
                            <p class="font-s15"><a href="javascript:void(0)">Skills: </a> {{$user->profile->age ?? '' }} .</p>

                            </div>
                        </div>
                        <!-- END System Notification -->

                        <!-- END System Notification -->
                    </div>
                </div>
                <!-- END Timeline -->
            </div>
        </div>
        <!-- END Main Content -->
    </div>
@endsection