@extends ('layouts.app')

@section ('content')
    <div class="block">
        <div class="block-header">
            <ul class="block-options">
                <li>
                    <button type="button"><i class="si si-settings"></i></button>
                </li>
            </ul>
            <h3 class="block-title">Static Labels</h3>
        </div>
        <div class="block-content block-content-narrow">
            <form class="form-horizontal push-10-t" action="{{route('news.update', $news->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material">
                            <input class="form-control" type="text" id="material-text" name="title" value="{{$news->title}}">
                            <label for="material-text">Название</label>
                        </div>
                    </div>
                </div>
            
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material">
                            <textarea class="form-control" id="material-textarea-large" name="description" rows="8" >{{$news->description}}</textarea>
                            <label for="material-textarea-large">Описание</label>
                        </div>
                    </div>
                </div>
                @if($news->image)
                    <img src="{{ asset('storage/' .$news->image) }}" style="width: 100px;">
                @endif
                <div class="form-group">
                    <label class="col-xs-12" for="example-file-multiple-input">Фото</label>
                    <div class="col-xs-12">
                        <input type="file" id="example-file-multiple-input" name="image" multiple="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9">
                        <button class="btn btn-sm btn-primary" type="submit">Изменить!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection