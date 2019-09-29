@extends('layouts.app')

@section('content')
    <div class="block">
        <div class="block-header bg-gray-lighter">
            <ul class="block-options">
                <li>
                <button data-toggle="scroll-to" data-target="#forum-reply-form" type="button"><a href="{{ route('user.tasks.index') }}"><i class="fa fa-reply"></i></a></button>
                </li>
                <li>
                    <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                </li>
                <li>
                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                </li>
            </ul>
            <h3 class="block-title">Задача</h3>
        </div>
        <div class="block-content">
            <!-- Discussion -->
            <table class="table table-striped table-borderless">
                <tbody>
                    <tr>
                        <td class="hidden-xs"></td>
                        <td class="font-s13 text-muted">
                            <a href="#">{{$task->author->name}}</a> {{$task->created_at->diffForHumans()}}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center hidden-xs" style="width: 140px;">
                            <div class="push-10">
                                <a href="#">
                                        <?php
                                            if(!is_null($task->resources)) {
                                                $extention = $task->resources;
                                                $explode = explode('.', $extention);
                                                if($explode[1] == 'jpg' || $explode[1] == 'png' || $explode[1] == 'jpeg') {
                                            ?>
                                                    <a href='{{asset("storage/".$task->resources)}}' target="_blank"><img src="{{asset('storage/'.$task->resources)}}" style="width: 80px;"></a>
                                                <?php
                                                } 
                                                else {
                                                ?>
                                                    <a href='{{asset("storage/".$task->resources)}}' target="_blank"><i class="si si-doc fa-3x"></i></a>
                                                <?php
                                                }
                                            } else {
                                                echo '<i class="si si-doc fa-3x"></i>';
                                            }
                                        ?>
                                </a>
                            </div>
                        <small>{{ $task->title }}</small>
                        </td>
                        <td>
                        <p>{{ $task->description }}</p>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <!-- END Discussion -->
        </div>
    </div>
@endsection