@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-5 text-center">Laravel Social Share Buttons Example - ItSolutionStuff.com</h2>

    <div class="social-btn-sp">
        {!! $shareButtons !!}
    </div>

    <table class="table">
        <tr>
            <th>List Of Posts</th>
        </tr>
        @foreach($posts as $post)
        <tr>
            <td>
                {{ $post->title }}
                {!! Share::page(url('/post/'. $post->slug))->facebook()->twitter()->whatsapp() !!}
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection