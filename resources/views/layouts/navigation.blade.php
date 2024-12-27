
@include('layouts.style')

<div class="task_header p-3 rounded">
    <div class="row">
        <div class="col-md-12 m-auto">
            <ul class="navbar-nav mr-auto m-auto">
                <li class="nav-item active">
                    <a class="" href=""><b>Dashboard</b></a>
                </li>

                <li class="nav-item active">
                    <a class="" href=""><b>Token List</b></a>
                </li>
                {{-- <li class="nav-item active">
                    <a class="" href="{{url('/event')}}"><b>Event Create</b></a>
                </li>
                <li class="nav-item">
                    <a class="" href="{{url('/booking')}}"><b>Booking Seat</b></a>
                </li>
                <li class="nav-item">
                    <a class="" href="{{url('/custom-form')}}"><b>Editor</b></a>
                </li> --}}
                <li class="nav-item active">
                    <form method="POST" action="">
                        @csrf 
                        <a class="text-white bg-danger rounded" href=""  onclick="event.preventDefault();
                                            this.closest('form').submit();"><b>Logout</b></a>

                        
                    </form>
                    
                </li>
            </ul>
        </div>
    </div>
</div>
