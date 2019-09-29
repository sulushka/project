@extends ('layouts.app')

@section ('content')
    <div class="block">
        <div class="block-header">
            <ul class="block-options">
                <li>
                    <button type="button"><i class="si si-settings"></i></button>
                </li>
            </ul>
            <h3 class="block-title">Изменить задачу</h3>
        </div>
        <div class="block-content block-content-narrow">
            <form class="form-horizontal push-10-t" action="{{route('tasks.update', $tasks->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material">
                            <input class="form-control" type="text" id="material-text" name="title" value="{{$tasks->title}}">
                            <label for="material-text">Название</label>
                        </div>
                    </div>
                </div>
            
                <div class="form-group">
                    <div class="col-xs-12">
                        <div class="form-material">
                            <textarea class="form-control" id="material-textarea-large" name="description" rows="8" >{{$tasks->description}}</textarea>
                            <label for="material-textarea-large">Описание</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12" for="example-file-multiple-input">Выберите файл</label>
                    <div class="col-xs-12">
                        <input type="file" id="example-file-multiple-input" name="image" multiple="">
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
                            <label for="material-select2">Please Select</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <button class="btn btn-sm btn-primary" type="submit">Изменить!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection