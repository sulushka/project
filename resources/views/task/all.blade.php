@extends('layouts.app')

@section('content')
<div class="content content-boxed">
    <div class="row font-s13">
        <div class="col-lg-4">
        <form class="form-horizontal" action="{{ route('search.tasks') }}" method="post">
            @csrf
            <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                <input class="form-control" name="search" type="text" id="base-material-text" name="base-material-text" placeholder="Поиск...">
                <span class="input-group-addon"><i class="si si-magnifier"></i></span>
            </div>
        </form>
        @if(isset($details))
            @foreach($details as $result)
            <!-- Article -->
            <div class="block">
            <div class="block-content block-content-full">
                <div style="margin-left:6%">
                    <?php
                    if(!is_null($result->resources)) {
                        $extention = $result->resources;
                        $explode = explode('.', $extention);
                        if($explode[1] == 'jpg' || $explode[1] == 'png' || $explode[1] == 'jpeg') {
                        ?>
                            <img src="{{asset('storage/'.$result->resources)}}" style="width: 60px; height:40px;">
                        <?php
                        } 
                        else {
                            echo '<i class="si si-doc fa-3x"></i>';
                        }
                    } else {
                        echo '<i class="si si-doc fa-3x"></i>';
                    }
                    ?>
                </div>
                <div class="block-content block-content-full">
                        <h2 class="h4 push-10">{{Str::limit($result->title, 25)}}</h2>
                        <p class="text-gray-dark">{{Str::limit($result->description, 80)}}.</p>
                    <a class="btn btn-sm btn-default" href="{{ route('tasks.show', $result->id) }}">Подробнее</a>
                </div>
            </div>
            </div>
            @endforeach
        @endif
        </div>
        @foreach($tasks as $task)
        <div class="col-lg-4">
            <!-- Article -->
            <div class="block">
                <div class="block-content block-content-full">
                <a class="font-w600" href="javascript:void(0)">{{ $task->author->name }}</a> {{$task->created_at->diffForHumans()}}.
                </div>
                <div style="margin-left:6%">
                    <?php
                    if(!is_null($task->resources)) {
                        $extention = $task->resources;
                        $explode = explode('.', $extention);
                        if($explode[1] == 'jpg' || $explode[1] == 'png' || $explode[1] == 'jpeg') {
                        ?>
                            <img src="{{asset('storage/'.$task->resources)}}" style="width: 60px; height:40px;">
                        <?php
                        } 
                        else {
                            echo '<i class="si si-doc fa-3x"></i>';
                        }
                    } else {
                        echo '<i class="si si-doc fa-3x"></i>';
                    }
                    ?>
                </div>
                <div class="block-content block-content-full">
                    <h2 class="h4 push-10">{{Str::limit($task->title, 25)}}</h2>
                    <p class="text-gray-dark">{{Str::limit($task->description, 80)}}.</p>
                <a class="btn btn-sm btn-default" href="{{ route('tasks.show', $task->id) }}">Подробнее</a>
                </div>
            </div>
            <!-- END Article --> 
        </div>
        @endforeach
    </div>
</div>
@endsection