<section id="appointment" class="appointment section-bg">
    <div class="container">

        <div class="section-title">
            <h2>Make an Appointment</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <form action="{{ url('appointment') }}" method="POST" role="form">
            @csrf
            <legend>Form Appointment</legend>
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter Your Name" />@error('name')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="Enter Your Email" />@error('email')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="Enter Your Phone" />@error('phone')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="date" class="form-control" id="time" name="time"
                            placeholder="Input field" />@error('time')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="doctor">Doctor</label>

                        <select name="doctor" id="doctor" class="form-control" required="required">
                            <option value="">Select Doctor
                            </option>
                            @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name.' specialist '.$doctor->specialist }}
                            </option>
                            @endforeach
                        </select>@error('doctor')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="submit "><button type="submit" class="btn btn-primary form-control ">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section><!-- End Appointment Section -->
<style>
    .form-group {
        margin: 10px 0 !important;
    }

    form input {
        border: none !important;
        outline: none !important;
    }

    .submit {
        text-align: center;
        margin-top: 10px
    }

    .error {
        color: red;
    }
</style>
