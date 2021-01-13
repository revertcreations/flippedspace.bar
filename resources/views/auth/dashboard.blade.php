@extends('layouts/app')

@section('content')


    <form class="dashboard" method="POST" action="{{ route('dashboard') }}">
        @csrf
        <div class="card">

            <h2 class="title"><span onclick="console.log('edit the username')">&#9787;</span>{{ $user->username }}</h2>

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
    
        </div>


        <div class="card collapsed" onclick="toggle_form_groups(this)">

            <h2 class="title">&#8962; Address <span class="click">&#43;</span></h2>

            <div class="form-group">
                <label for="name">
                    Name
                </label>
                <input type="text" value="{{ $user->address }}" name="address-name">
            </div>

            <div class="form-group">
                <label for="country">
                    Country
                </label>
                <select name="country" id="country">
                    <option value="0">United States</option>
                </select>
                @error('country')
                <small class="error input-error">{{ $message }}</small>
                @enderror  
            </div>

            <div class="form-group">
                <label for="email">
                    Street
                </label>
                <input id="street" name="street" type="text"  value="{{ $user->address }}" autofocus />
                <input id="street_extended" name="street-extended" type="text"  value="{{ $user->address }}" autofocus />
                @error('f_name')
                <small class="error input-error">{{ $message }}</small>
                @enderror   
            </div>

            <div class="form-group">
                <label for="city">
                    City
                </label>
                <input id="city" name="city" type="text"  value="{{ $user->city }}" autofocus />
                @error('city')
                <small class="error input-error">{{ $message }}</small>
                @enderror   
            </div>

            <div class="form-group">
                <label for="state">
                    State/Region
                </label>
                <select name="state" id="state">
                    <option value="0">New Mexico</option>
                </select>
                @error('state')
                <small class="error input-error">{{ $message }}</small>
                @enderror   
            </div>
            
            <div class="form-group">
                <label for="phone">
                    Phone
                </label>
                <input id="" name="phone" type="text" value="{{ $user->phone }}" autofocus />
                @error('phone')
                <small class="error input-error">{{ $message }}</small>
                @enderror                  
            </div>

        </div>

        <div class="card">
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