@php $data = session()->get('flashMessage'); @endphp
@if($data)
    <div class="notification-toast top-middle" id="notification-toast">
        <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="fas fa-broadcast-tower text-primary m-r-5"></i>
                <strong class="mr-auto">{{$data['status']}}</strong>
                <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <div class="row">
                    <div class="col-md-12">
                        @foreach($data['message'] as $message)
                            <b>{{$message}}</b> <br/>
                        @endforeach
                    </div>
                    <div class="col-md-12">
                        @if($data['status'] == "Success")
                            <img align="right" style="width:auto; height:100px;" src="{{@asset('assets/images/avatars/happy-assistant.gif')}}" />
                        @elseif($data['status'] == "Error")
                            <img align="right" style="width:auto; height:100px;" src="{{@asset('assets/images/avatars/sad-assistant.gif')}}" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php session()->forget('flashMessage'); @endphp
    <script>
        setTimeout(function() { $("#notification-toast").hide(); }, 5000);
    </script>
@endif
