@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6"> 
        <div class="card shadow-sm border-0" style="border-radius: 15px;">
            <div class="card-header bg-primary text-white" style="border-radius: 15px 15px 0 0;">
                <h4 class="mb-0 text-center"><i class="fas fa-user-plus"></i> 🤵 Add New User</h4>
            </div>

            <div class="card-body" style="padding: 20px 25px;">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <div class="row g-2">
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-semibold">👤 Full Name *</label>
                            <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold">📧 Email *</label>
                            <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-2 mt-2">
                        
                        <div class="col-md-6">
                            <label for="phone" class="form-label fw-semibold">📱 Phone *</label>
                            <input type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror"
                                   id="phone" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        
                        <div class="col-md-6">
                            <label for="role" class="form-label fw-semibold">🎯 Role *</label>
                            <select class="form-select form-select-sm @error('role') is-invalid @enderror"
                                    id="role" name="role" required>
                                <option value="member" {{ old('role') == 'member' ? 'selected' : '' }}>Member</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    
                    <div class="mb-3 mt-2">
                        <label for="address" class="form-label fw-semibold">🏠 Address</label>
                        <textarea class="form-control form-control-sm @error('address') is-invalid @enderror"
                                  id="address" name="address" rows="2">{{ old('address') }}</textarea>
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary px-3">
                            <i class="fas fa-arrow-left"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-sm btn-primary px-3">
                            <i class="fas fa-save"></i> Create User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
