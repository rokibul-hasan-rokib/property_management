@extends('frontend.layouts.app')
@section('title')
    Register
@endsection

@section('content')

    <style>

        .registration-form {
            max-width: 600px;
            margin: 2rem auto;
            background: #ffffff;
            padding: 2rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .form-header h2 {
            font-weight: 700;
            color: #343a40;
        }
        .btn-custom {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>


<div class="container">
    <div class="registration-form">
        <div class="form-header">
            <h2>Tenant Registration</h2>
        </div>
        <form method="POST" action="{{route('register.store')}}">
            <!-- CSRF Token -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!-- Name -->
            <div class="mb-3">
                <x-required />
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name">
                <x-validation-error :error="$errors->first('name')" />
            </div>

            <!-- Email -->
            <div class="mb-3">
                <x-required />
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                <x-validation-error :error="$errors->first('email')" />
            </div>

            <!-- Phone Number -->
            <div class="mb-3">
                <x-required />
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter your phone number">
                <x-validation-error :error="$errors->first('phone_number')" />
            </div>

            <!-- Current Address -->
            <div class="mb-3">
                <x-required />
                <label for="current_address" class="form-label">Current Address</label>
                <input type="text" class="form-control" id="current_address" name="current_address" placeholder="Enter your current address">
                <x-validation-error :error="$errors->first('current_address')" />

            </div>

            <!-- Employment Status -->
            <div class="mb-3">
                <label for="employment_status" class="form-label">Employment Status</label>
                <input type="text" class="form-control" id="employment_status" name="employment_status" placeholder="Your job title or employment status">
                <x-validation-error :error="$errors->first('employe_status')" />

            </div>

            <!-- Monthly Income -->
            <div class="mb-3">
                <x-required />
                <label for="monthly_income" class="form-label">Monthly Income</label>
                <input type="number" class="form-control" id="monthly_income" name="monthly_income" placeholder="Enter your monthly income" step="0.01">
                <x-validation-error :error="$errors->first('monthly_income')" />

            </div>

            <!-- NID -->
            <div class="mb-3">
                <x-required />
                <label for="nid" class="form-label">National ID (NID)</label>
                <input type="text" class="form-control" id="nid" name="nid" placeholder="Enter your National ID">
                <x-validation-error :error="$errors->first('nid')" />
            </div>

            <!-- Emergency Contact -->
            <div class="mb-3">
                <x-required />
                <label for="emergency_contact" class="form-label">Emergency Contact</label>
                <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" placeholder="Enter emergency contact">
                <x-validation-error :error="$errors->first('emergency_contact')" />
            </div>

            <!-- Preferred Move-in Date -->
            <div class="mb-3">
                <label for="preferred_move_in_date" class="form-label">Preferred Move-in Date</label>
                <input type="date" class="form-control" id="preferred_move_in_date" name="preferred_move_in_date">
                <x-validation-error :error="$errors->first('preferred_move_in_date')" />
            </div>

            <!-- Pets -->
            <div class="mb-3">
                <label for="has_pets" class="form-label">Do you have pets?</label>
                <select class="form-select" id="has_pets" name="has_pets">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>

            <!-- Rental Budget -->
            <div class="mb-3">
                <label for="rental_budget" class="form-label">Rental Budget</label>
                <input type="number" class="form-control" id="rental_budget" name="rental_budget" placeholder="Enter your rental budget" step="0.01">
                <x-validation-error :error="$errors->first('rental_budget')" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <x-required />
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" >
                <x-validation-error :error="$errors->first('password')" />
            </div>


            <!-- Submit Button -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-custom">Register</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- /.untree_co-section -->
@endsection
