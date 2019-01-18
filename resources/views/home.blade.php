@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="cratePost">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Post something here</label>

                            <div class="col-md-6">
                                <textarea name="post"></textarea>
                            </div>
                            <div><?php if(isset($msg) && $msg != ""){echo $msg;} ?></div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit post') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-group row">
                            <?php if(!empty($allPosts)){
     foreach ($allPosts as $post){
         echo $post['postdescription'];
     }
                            };?>
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection
