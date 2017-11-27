@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">

            <div class="panel-body">
                <h2 class="text-center">
                    <i class="glyphicon glyphicon-edit"></i> Topic /
                    @if($topic->id)
                        编辑话题 #{{$topic->id}}
                    @else
                        新建话题
                    @endif
                </h2>

                @include('common.error')

                @if($topic->id)
                    <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                	<input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $topic->title ) }}" />
                </div>

                <div class="form-group">
                    <select name="category_id" required class="form-control">
                        <option value="" hidden disabled selected>请选择分类</option>
                        @foreach($categories as $value)
                        <option value="{{$value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                	<textarea name="body" id="editor" placeholder="请填入至少三个字符的内容。" class="form-control" rows="3">{{ old('body', $topic->body ) }}</textarea>
                </div>

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection