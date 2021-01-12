@extends('layouts/app')

@section('content')


        <form class="flex-form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="card">

                <h2 class="title"><span onclick="console.log('edit the username')">&#9998;</span>{{ $user->username }}</h2>

                <div class="form-group">
                    <label for="upload">
                        Avatar
                    </label>
                    <img width="256" height="256" src="{{ asset('img/avatar.jpeg') }}" />
                    <input id="upload" name="upload" type="file"  value="upload photo" />
                    @error('upload')
                    <small class="error input-error">{{ $message }}</small>
                    @enderror   
                </div>

                <div class="form-group">
                    <label for="email">
                        First Name
                    </label>
                    <input id="f_name" name="f_name" type="text"  value="{{ $user->f_name }}" autofocus />
                    @error('f_name')
                    <small class="error input-error">{{ $message }}</small>
                    @enderror   
                </div>

                <div class="form-group">
                    <label for="email">
                        Last Name
                    </label>
                    <input id="l_name" name="l_name" type="text"  value="{{ $user->l_name }}" autofocus />
                    @error('l_name')
                    <small class="error input-error">{{ $message }}</small>
                    @enderror   
                </div>

                <div class="form-group">
                    <label for="email">
                        Email
                    </label>
                    <input id="email" name="email" type="email"  value="{{ $user->email }}" autofocus />
                    @error('email')
                    <small class="error input-error">{{ $message }}</small>
                    @enderror   
                </div>

                <div class="form-group">
                    <input type="submit" value="Save Changes">
                </div>
            
        </div>


        <div class="card">

            <h2 class="title">Address</h2>

            <div class="form-group">
                <label for="email">
                    Street
                </label>
                <input id="Street" name="street" type="text"  value="{{ $user->address }}" autofocus />
                @error('f_name')
                <small class="error input-error">{{ $message }}</small>
                @enderror   
            </div>

            <div class="form-group">
                <label for="email">
                    Last Name
                </label>
                <input id="l_name" name="l_name" type="text"  value="{{ $user->l_name }}" autofocus />
                @error('l_name')
                <small class="error input-error">{{ $message }}</small>
                @enderror   
            </div>

            <div class="form-group">
                <label for="email">
                    Email
                </label>
                <input id="email" name="email" type="email"  value="{{ $user->email }}" autofocus />
                @error('email')
                <small class="error input-error">{{ $message }}</small>
                @enderror   
            </div>
            
            <div class="form-group">
                <label for="username">
                    Username
                </label>
                <input id="" name="username" type="text" value="{{ $user->username }}" autofocus />
                @error('username')
                <small class="error input-error">{{ $message }}</small>
                @enderror                  
            </div>

            <div class="form-group">
                <input type="submit" value="Save Changes">
            </div>

        </div>


    </form>
        {{-- @foreach($errors->all() as $message)
        <div class="card-status-bar error">
            <div class="message">{{ $message }}</div>
        </div>
        @endforeach --}}
@endsection