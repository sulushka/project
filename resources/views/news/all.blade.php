@extends('layouts.app')

@section('content')
<div class="content content-narrow">

    <!-- Topics Block -->
    <div class="block">
        <div class="block-header bg-gray-lighter">
            <ul class="block-options">
                <li style="width:90%;">
                    <form class="form-horizontal" action="{{ route('search.news') }}" method="post">
                        @csrf
                        <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                            <input class="form-control" name="search" type="text" id="base-material-text" name="base-material-text" placeholder="Поиск...">
                            <span class="input-group-addon"><i class="si si-magnifier"></i></span>
                        </div>
                    </form>
                </li>
                <li>
                    <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                </li>
                <li>
                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                </li>
            </ul>
        </div>
        <div class="block-content">
            <!-- Topics -->
            <table class="table table-striped table-borderless table-vcenter">
                <thead>
                    <tr>
                        <th >Картинка</th>
                        <th >Название</th>
                        <th class="text-center hidden-xs hidden-sm" style="width: 100px;">Автор</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($details))
                        @foreach($details as $result)
                        <tr style="background-color:greenyellow">
                            <td class="text-center" style="width: 75px;">
                                <?= !is_null($result->image) ? '<img src="'.asset('storage/' .$result->image).'" style="width: 75px;">': '<i class="si si-pin fa-2x"></i>' ?>
                            </td>
                            <td>
                                <h4 class="h5 font-w600 push-5">
                                <a href="{{route('news.show',['news'=>$result->id])}}">{{$result->title}}</a>
                                </h4>
                                <div class="font-s13 text-muted">
                                    <a href="base_pages_profile.html"></a><em>{{$result->created_at->diffForHumans()}}</em>
                                </div>
                            </td>
                            <td class="hidden-xs hidden-sm">
                                <span class="font-s13"><a href="base_pages_profile.html">{{$result->author->name}}</a><br><i class="fa fa-check fa-2x"></i>
                                    <a href="{{ route('user.news.index') }}"><i class="fa fa-times fa-2x"></i></a></span>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    @foreach($news as $item)
                        <tr>
                            <td class="text-center" style="width: 75px;">
                                <?= !is_null($item->image) ? '<img src="'.asset('storage/' .$item->image).'" style="width: 75px;">': '<i class="si si-pin fa-2x"></i>' ?>
                            </td>
                            <td>
                                <h4 class="h5 font-w600 push-5">
                                <a href="{{route('news.show',['news'=>$item->id])}}">{{$item->title}}</a>
                                </h4>
                                <div class="font-s13 text-muted">
                                    <a href="base_pages_profile.html"></a><em>{{$item->created_at->diffForHumans()}}</em>
                                </div>
                            </td>
                            <td class="hidden-xs hidden-sm">
                                <span class="font-s13"><a href="base_pages_profile.html">{{$item->author->name}}</a><br>{{$item->created_at}}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- END Topics -->

            
        </div>
    </div>
    <!-- END Topics Block -->
</div>
@endsection