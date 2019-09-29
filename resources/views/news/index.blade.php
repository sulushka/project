@extends('layouts.app')

@section('content')
    <div class="block">
        <div class="block-header">
            <div class="block-options">
            <button class="btn btn-success btn-rounded push-5-r push-10" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Создать</button>
            </div>
            <h3 class="block-title">Новости</h3>
        </div>
        <div class="block-content">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>Название</th>
                        <th >Описание</th>
                        <th >Дата создания</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($news as $item)
                    <tr id="{{$item->id}}">
                        <td class="text-center">{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td >{{$item->description}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-xs btn-default" href="{{route('news.edit', $item->id)}}" data-toggle="tooltip" title="" data-original-title="Edit Client"><i class="fa fa-pencil"></i></a>
                                <form action="{{ route('news.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-xs btn-default" type="submit" data-toggle="tooltip" title="" data-original-title="Remove Client"><i class="fa fa-times"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="margin-left: 43%">
        {{ $news->links()}}
        </div>
    </div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Создать пост!</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal push-10-t" action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <input class="form-control" type="text" id="material-text" name="title" placeholder="Введите название поста...">
                        <label for="material-text">Название</label>
                    </div>
                </div>
            </div>
        
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material">
                        <textarea class="form-control" id="material-textarea-large" name="description" rows="8" placeholder="Введите описание поста..."></textarea>
                        <label for="material-textarea-large">Описание</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="example-file-multiple-input">Фото</label>
                <div class="col-xs-12">
                    <input type="file" id="example-file-multiple-input" name="image" multiple="">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-9">
                    <button class="btn btn-sm btn-primary" type="submit">Сохранить</button>
                </div>
            </div>
        </form>
      </div>
    </div>

  </div>
</div>
@endsection
