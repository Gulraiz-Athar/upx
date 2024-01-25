@extends('layouts.app')
@section('content')

<div class="row">
<div style="margin-top: 100px;" >
    <div class="content" style="text-align: center;">


        <i class="fa fa-ban" style="font-size:120px;color:#FF5959;margin-bottom:30px;"></i>
        <div class="title" style="font-size: 72px; margin-bottom: 40px; color: #444;">Unauthorized access</div>
        <a href="{{ route('dashboard') }}">Dashboard.</a> | 
        <a href="javascript:history.back()">Go Back</a>
        
        
    </div>
</div>
</div>
@endsection