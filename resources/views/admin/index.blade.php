@extends('layouts.app')

@section('content')
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">Пользователи</h3>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                    <button class="btn btn-xs btn-default pull-right" style="" type="subnit"  data-toggle="modal" data-target="#myModal" title="" data-original-title="Добавить пользователя"><i class="fa fa-plus "></i></button>
                <table class="table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th style="width: 120px;"><i class="si si-user fa-2x"></i></th>
                            <th>Имя</th>
                            <th style="width: 30%;">Email</th>
                            <th class="text-center" style="width: 100px;">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                            @if(isset($details))
                                @foreach($details as $user)
                                <tr style="background-color:greenyellow">
                                    <td class="text-center"></td>
                                    <td class="text-center" style="width: 75px;">
                                        @if($user->profile)
                                            <?= !is_null($user->profile->user_image) ? '<img style="margin-left:-70px;" class="img-circle" src="'.asset('storage/' .$user->profile->user_image->img_path).'" width="60px" height="60px">': '<i class="si si-user fa-2x"></i>' ?>
                                        @else
                                            <i style="margin-left:-70px" class="si si-user fa-2x"></i>
                                        @endif
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td class="text-center">
                                        <i class="fa fa-check fa-2x"></i>
                                    <a href="{{ route('admin.index') }}"><i class="fa fa-times fa-2x"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        @foreach($users as $user)
                        <tr>
                            <td class="text-center">{{ $user->id }}</td>
                            @if($user->profile)
                            <td>
                                <img style="margin-left:-15px" class="img-circle" src="{{asset('storage/' .$user->profile->user_image->img_path)}}" width="60px" height="60px">
                            </td>
                            @else 
                                <td><i class="si si-user fa-2x"></i></td>
                            @endif
                            <td class="font-w600">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <form action="{{ route('admin.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-xs btn-default" type="subnit" data-toggle="tooltip" title="" data-original-title="Remove Client"><i class="fa fa-times"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div style="margin-left: 43%">
        {{ $users->links()}}
        </div>
    </div>

    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Создать пользователя</h4>
            </div>
            <div class="modal-body">
                <form class="js-validation-register form-horizontal push-50-t push-50" action="{{route('admin.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material form-material-success">
                                <input class="form-control" type="text" id="register-username" name="name" placeholder="Введите имя пользователя">
                                <label for="register-username">Имя пользователя</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material form-material-success">
                                <input class="form-control" type="email" id="register-email" name="email" placeholder="Введите адрес элекронной почты">
                                <label for="register-email">Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material form-material-success">
                                <input class="form-control" type="password" id="register-password" name="password" placeholder="Выберите надежный пароль">
                                <label for="register-password">Пароль</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material floating">
                                <select class="form-control" id="material-select2" name="group" size="1">
                                    <option></option><!-- Empty value for demostrating material select box -->
                                    @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->title }}</option>
                                    @endforeach
                                </select>
                                <label for="material-select2">Выберите группу</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <label class="css-input css-checkbox css-checkbox-rounded css-checkbox-lg css-checkbox-default">
                            <input type="checkbox"  name='is_admin' ><span></span> Администратор?
                        </label>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12 col-sm-6 col-md-5">
                            <button class="btn btn-block btn-primary" type="submit"><i class="fa fa-plus pull-left"></i>Создать</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
      
        </div>
      </div>

@endsection