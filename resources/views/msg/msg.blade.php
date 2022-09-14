@if(session('success'))
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(session('deleted'))
<div class="alert alert-danger">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ session('deleted') }}
                </div>
                @endif
                @if(session('info'))
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="alert alert-secondary">
                                    {{ session('info') }}
                                </div>
                                @endif