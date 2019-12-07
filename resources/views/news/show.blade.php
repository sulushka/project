@extends('layouts.app')

@section('content')
    <div class="block">
        <div class="block-header bg-gray-lighter">
            <ul class="block-options">
               
                <li>
                    <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                </li>
                <li>
                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                </li>
            </ul>
            <h3 class="block-title">Новости</h3>
        </div>
        <div class="block-content">
            <!-- Discussion -->
            <table class="table table-striped table-borderless">
                <tbody>
                    <tr>
                        <td class="hidden-xs"></td>
                        <td class="font-s13 text-muted">
                            <a href="#">{{$news->author->name}}</a> {{$news->created_at->diffForHumans()}}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center hidden-xs" style="width: 140px;">
                            <div class="push-10">
                                <a href="#">
                                        <?= !is_null($news->image) ? '<img src="'.asset('storage/' .$news->image).'" style="width: 75px;">': '<i class="si si-pin fa-2x"></i>' ?>
                                </a>
                            </div>
                        <small>{{ $news->title }}</small>
                        </td>
                        <td>
                        <p>{{ $news->description }}</p>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <!-- END Discussion -->
        </div>
    </div>
@endsection