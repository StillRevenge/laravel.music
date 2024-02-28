@extends ('layout')

@section('page_title','страница входа')

@section('content')
<section>
    <div class="container">
     <div class="row">
      <div class="col-12 col-md-6 offset-md-3" >
        <x-card>
            <div class="card-body">
                <h4 class="m-0">
                    {{__('Вход')}}

                </h4>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="required">{{__('Почта')}}</label>
                        <input type="email" class="form-control" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="required">{{__('Пароль')}}</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="remember" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Запомни меня
                            </label>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">{{__('Войти')}}</button>
                </form>
            </div>
        </x-card>
      </div>
    </div>
</div>  
</section>
@endsection