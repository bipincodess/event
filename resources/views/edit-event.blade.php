@extends('layouts.app')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Edit Event</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{url('event') . '/' . $event->id}}" method="POST">
                            @csrf @method("PUT")
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="todoTitle">Title</label>
                                    <input type="text" name="title" class="form-control" id="todoTitle" value="{{$event->title}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Product">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="running" @if($event->status == "running") selected @endif>Running</option>
                                        <option value="finished" @if($event->status == "finished") selected @endif>Finished</option>
                                    </select>    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="todoTitle">Description</label>
                                    <textarea name="description" class="form-control" aria-label="With textarea" required>{{$event->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="todoTitle">Start Date</label>
                                    <input type="text" name="start_date" class="form-control datepicker-input" value="{{$event->start_date}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="todoTitle">End Date</label>
                                    <input type="text" name="end_date" class="form-control datepicker-input" value="{{$event->end_date}}" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection