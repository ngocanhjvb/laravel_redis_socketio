@extends('index')

@section('content')
    <div id="data">
        @foreach($chats as $chat)
            <p><strong>{{$chat->author}}: </strong>{{ $chat->content }}</p>
        @endforeach
    </div>
    <br>
    <div id="main">
        <form action="{{ route('chats.store') }}" method="post">
            {{ csrf_field() }}
            <section class="pageProductConfirm">
                <div class="container">
                    <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                        <label for="content">{{ auth()->user()->name }}</label>
                        <input type="text" class="form-control" id="content" name="content"
                               placeholder="Nhập tin nhắn..."
                               value="{{ old('content') }}">
                        <span class="help-block">{{ $errors->first('content') }}</span>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </div>
                </div>
            </section>
        </form>
    </div><!-- #main -->
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" integrity="sha512-v8ng/uGxkge3d1IJuEo6dJP8JViyvms0cly9pnbfRxT6/31c3dRWxIiwGnMSWwZjHKOuY3EVmijs7k1jz/9bLA==" crossorigin="anonymous"></script>
<script>
    var socket = io('http://localhost:6001')
    socket.on('laravel_database_private-global-room', function (data) {
        console.log(data)
        if ($('#' + data.id).length === 0) {
            $('#data').append('<p><strong>' + data.author + '</strong>: ' + data.content + '</p>')
        } else {
            console.log('Đã có tin nhắn');
        }
    })
</script>