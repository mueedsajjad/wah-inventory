
    <p class="text-center">
        <strong>{{$store->name}}</strong>
    </p>

    @foreach($details as $data)
    <div class="progress-group">
        {{$data->name}}
        <span class="float-right"><b>{{$data->quantity}}</b>/10000</span>
        <div class="progress progress-sm">
            <div class="progress-bar bg-danger" style="width: 80%"></div>
        </div>
    </div>
    @endforeach
    <!-- /.progress-group -->

{{--    <div class="progress-group">--}}
{{--        Complete Purchase--}}
{{--        <span class="float-right"><b>310</b>/400</span>--}}
{{--        <div class="progress progress-sm">--}}
{{--            <div class="progress-bar bg-danger" style="width: 75%"></div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- /.progress-group -->--}}
{{--    <div class="progress-group">--}}
{{--        <span class="progress-text">Visit Premium Page</span>--}}
{{--        <span class="float-right"><b>480</b>/800</span>--}}
{{--        <div class="progress progress-sm">--}}
{{--            <div class="progress-bar bg-success" style="width: 60%"></div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- /.progress-group -->--}}
{{--    <div class="progress-group">--}}
{{--        Send Inquiries--}}
{{--        <span class="float-right"><b>250</b>/500</span>--}}
{{--        <div class="progress progress-sm">--}}
{{--            <div class="progress-bar bg-warning" style="width: 50%"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- /.progress-group -->
