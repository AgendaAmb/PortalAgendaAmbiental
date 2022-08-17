<script>
  const user = @json($user);
  const users = @json($users);
  // console.log(user);
  // console.log(users);
</script>

@extends('templates.base')

@push('stylesheets')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@section('navbarModulos')
@include('templates.navbar')
@endsection

@section('ContenidoPrincipal')
@endsection

<script src="{{ asset('js/20admin.js') }}" defer></script>
