@extends('layouts.chat')
@section('title')
    Chat
@endsection

@section('content')
    @include('layouts.inc.chatsf.layout')
@endsection

@section('scripts')
    <script>
        $('#message').keyup(function(e) {


        var message = $(this).val();

        if (e.which == 13) {

            $.post('?action=SendMessage&message=' + message, function(response) {

                loadChat();
                $('#message').val('');

            });

        }

        });
        });
    </script>
@endsection
