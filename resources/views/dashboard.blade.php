@extends('layout.master')
@section('konten')
<div class="container mt-5" id="db">
    <div class="row">
        <div style="text-align: center" class="title">
            <h2>C-D-V</h2>
            
            {{-- @if(session()->has('selected_category'))
                <p>Kategori yang dipilih: {{ session('selected_category') }}</p>
            @endif --}}
            {{-- @unless(session()->has('selected_category'))
            <p>Belum ada kategori yang dipilih.</p>
            @endunless         --}}
        </div>
    </div>
    
</div>                 
@endsection
@section('footer')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

