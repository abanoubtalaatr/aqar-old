@extends('admin.app')
@section('title', __('dashboard.Profile'))

@section('styles')
    <style>
        .avatar-preview {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-size: cover;
            background-position: center;
            margin-bottom: 15px;
            border: 3px solid #ddd;
        }
        .avatar-upload {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .avatar-upload label {
            cursor: pointer;
            display: inline-block;
            margin-bottom: 0;
        }
        .avatar-upload input[type="file"] {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.Profile')</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-4">
                                <div class="avatar-upload">
                                    <div class="avatar-preview" 
                                         style="background-image: url('{{ $user->avatar_url }}');"
                                         id="avatarPreview"></div>
                                    <label for="avatar" class="btn btn-primary">
                                        <i class="fas fa-upload"></i> @lang('dashboard.Change Avatar')
                                    </label>
                                    <input type="file" name="avatar" id="avatar" accept="image/*">
                                    @error('avatar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name">@lang('dashboard.Name')</label>
                                    <input type="text" name="name" class="form-control" 
                                           value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">@lang('dashboard.Email')</label>
                                    <input type="email" name="email" class="form-control" 
                                           value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone">@lang('dashboard.mobile')</label>
                                    <input type="text" name="phone" class="form-control" 
                                           value="{{ old('phone', $user->phone) }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">@lang('dashboard.Password')</label>
                                    <input type="password" name="password" class="form-control">
                                    <small class="text-muted">@lang('dashboard.Leave blank to keep current password')</small>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">@lang('dashboard.Confirm Password')</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('dashboard.Update Profile')
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Avatar preview
            const avatarInput = document.getElementById('avatar');
            const avatarPreview = document.getElementById('avatarPreview');
            
            avatarInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        avatarPreview.style.backgroundImage = `url('${e.target.result}')`;
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection