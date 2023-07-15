@extends('layouts.app')
@section('content')
<div class="page-container">
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Filter Event</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{url('event')}}" method="GET">
                            <div class="form-group col-md-12">
                                <label for="Product">Type</label>
                                <select name="filter" class="form-control" required>
                                    <option value="finished" @if(isset($_GET['filter']) && $_GET['filter'] == "finished") selected @endif>Finished Events</option>
                                    <option value="upcoming"  @if(isset($_GET['filter']) && $_GET['filter'] == "upcoming") selected @endif>Upcoming Events</option>
                                    <option value="event_seven_days" @if(isset($_GET['filter']) && $_GET['filter'] == "event_seven_days") selected @endif>Events within 7 days</option>
                                    <option value="finished_seven_days" @if(isset($_GET['filter']) && $_GET['filter'] == "finished_seven_days") selected @endif>Finished Events within 7 days</option>
                                </select>    
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{url('event')}}" class="btn btn-secondary">Clear Filter</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-header">
            <h2 class="header-title">Events</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover e-commerce-table" id="data-table">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($events as $event)
                                        <tr>
                                            <td> {{$i}} </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <h6 class="m-b-0">{{$event['title']}}</h6>
                                                </div>
                                            </td>
                                            <td>{{$event['description']}}</td>
                                            <td>{{$event['start_date']}}</td>
                                            <td>{{$event['end_date']}}</td>
                                            <td>{{$event['status']}}</td>
                                            <td class="text-right">
                                                <a href="{{url('event') . '/' . $event['id'] . '/edit'}}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                    <i class="anticon anticon-edit"></i>
                                                </a>
                                                
                                                <a class="btn btn-icon btn-hover btn-sm btn-rounded delete-event-btn" data-value="{{$event['id']}}">
                                                    <i class="anticon anticon-delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @php $i = $i + 1; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="page-header">
            <h2 class="header-title">Add Event</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{url('event')}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="todoTitle">Title</label>
                                    <input type="text" name="title" class="form-control" id="todoTitle" placeholder="Make a Coffee" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="todoTitle">Description</label>
                                    <textarea name="description" class="form-control" aria-label="With textarea" required></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="todoTitle">Start Date</label>
                                    <input type="text" name="start_date" class="form-control datepicker-input" placeholder="Pick a date" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="todoTitle">End Date</label>
                                    <input type="text" name="end_date" class="form-control datepicker-input" placeholder="Pick a date" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
    <script>
        const systemURL = "{{url('/')}}";
        /** delete the event list */
        $(".delete-event-btn").on('click',function(e){
            e.preventDefault();
            var ID = $(this).attr('data-value');
            alert(ID);
            $.ajax({
                url: systemURL + '/event' + '/' + ID,
                type: 'delete',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(result) {
                    location.reload();
                }
            });
        });
        /** delete the shopping list */
    </script>
@endsection