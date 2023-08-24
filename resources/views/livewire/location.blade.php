<div>
    <div class="mb-4">
        <form wire:submit.prevent="addNew">
            <div class="form-group">
                <label for="c_country" class="text-black">Provinces <span class="text-danger">*</span></label>
                <select wire:model="provinceId" class="form-control">
                    <option value="1">Select a province</option>
                    @foreach($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                </select>

                @error('provinceId')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="c_country" class="text-black">Districts <span class="text-danger">*</span></label>
                <select wire:model="districtId" class="form-control">
                    <option value="1">Select a district</option>
                    @foreach($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                    @endforeach
                </select>
                @error('districtId')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="c_country" class="text-black">Ward <span class="text-danger">*</span></label>
                <select wire:model="wardId" id="ward" class="form-control">
                    <option value="1">Select a ward</option>
                    @foreach($wards as $ward)
                        <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                    @endforeach
                </select>

                @error('wardId')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                    <input wire:model="firstName" type="text" class="form-control" id="c_fname" name="firstName">

                    @error('firstName')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                    <input wire:model="lastName" type="text" class="form-control" id="c_lname" name="lastName">

                    @error('lastName')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                    <input wire:model="address" type="text" class="form-control" id="c_address" name="address" placeholder="Street address">

                    @error('address')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-5">
                <div class="col-md-6">
                    <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                    <input wire:model="email" type="text" class="form-control" id="email" name="c_email_address">

                    @error('email')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                    <input wire:model="phone" type="text" class="form-control" id="c_phone" name="phone" placeholder="Phone Number">

                    @error('phone')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary btn-lg py-3 btn-block">Add new</button>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="p-3 p-lg-5 border">
                <ol>
                    @foreach($addresses as $address)
                        <li>
                            {{ $address->address }}
                            ,{{ $address->email }}
                            , {{ $address->phone }}
                            , {{ $address->first_name }}
                            , {{ $address->last_name }}
                            , {{ $address->province->name }}
                            , {{ $address->district->name }}
                            , {{ $address->ward->name }}
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
