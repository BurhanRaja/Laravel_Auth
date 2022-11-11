@extends('layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create Lead</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/leads/create" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <select name="country" id="country" class="form-control">
                    </select>
                    @error('country')
                        <div class="text-danger text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="form-group col">
                        <label for="state">State</label>
                        <input type="text" name="state" class="form-control" id="state"
                            value="{{ old('state') }}">
                        @error('state')
                            <div class="text-danger text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="city">City</label>
                        <input type="text" name="city" class="form-control" id="city"
                            value="{{ old('city') }}">
                        @error('city')
                            <div class="text-danger text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="country_code">Country Code</label>
                        <select name="country_code" id="country_code" class="form-control">
                        </select>
                        @error('name')
                            <div class="text-danger text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="mobile">Phone Number</label>
                        <input type="number" name="mobile" class="form-control" id="mobile"
                            value="{{ old('mobile') }}">
                        @error('mobile')
                            <div class="text-danger text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <textarea type="text" name="subject" class="form-control" id="subject">{{ old('mobile') }}</textarea>
                    @error('subject')
                        <div class="text-danger text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>
    </div>
    <!-- /.card -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script>
        const phoneInp = document.getElementById('country_code');
        const countryInp = document.getElementById('country')

        // Getting Desired Data
        let countryData = window.intlTelInputGlobals.getCountryData();

        // Adding Countries in the Option
        for (const country of countryData) {
            countryInp.insertAdjacentHTML("beforeend", `<option value="${country.name}" selected>${country.name}</option>`)
        }

        // Adding Country-Codes in the Option selecting the one
        for (const country_code of countryData) {
            if (country_code.name.includes(countryInp.value)) {
                phoneInp.insertAdjacentHTML('beforeend',
                    `<option value="+${country_code.dialCode}" data-country-code="${country_code.iso2}" selected>+${country_code.dialCode}</option>`
                )
            } else {
                phoneInp.insertAdjacentHTML('beforeend',
                    `<option value="+${country_code.dialCode}" data-country-code="${country_code.iso2}">+${country_code.dialCode}</option>`
                )
            }
        }

        // Checking and Getting value based on country Input
        countryInp.addEventListener('change', () => {
            for (const country of countryData) {
                if (country.name.includes(countryInp.value)) {
                    let selected = phoneInp.options
                    let optVal = Array.from(selected).find(opt => opt.value == `+${country.dialCode}`).index;
                    phoneInp.selectedIndex = optVal;
                }
            }
        });
    </script>
@endsection
