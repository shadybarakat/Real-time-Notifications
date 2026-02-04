<!doctype html>
<html lang="en">
@include('dashboard.partials.head')

<body class="vertical light ltr">
    <div class="wrapper">

        @include('dashboard.partials.header')

        @include('dashboard.partials.sidebar')

        <main role="main" class="main-content">
            <div class="container-fluid">
                @yield('content')
            </div>

            {{-- Notification Modal --}}
            <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog"
                aria-labelledby="defaultModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="notificationsModal">
                            <div class="list-group list-group-flush my-n3">
                                @if (count(Auth::guard('admin')->user()->notifications))
                                    @foreach (Auth::guard('admin')->user()->notifications as $notification)
                                        <div class="list-group-item @if($notification->read() == null) bg-light @else bg-transparent @endif">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="fe fe-box fe-24"></span>
                                                </div>
                                                <div class="col">
                                                    <small><strong>New User Register</strong></small>
                                                    <div class="my-0 text-muted small">{{ $notification->data['message'] }}</div>
                                                    <small class="badge badge-pill badge-light text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                                </div>
                                            </div>
                                        </div> <!-- / .row -->
                                    @endforeach
                                @endif
                            </div> <!-- / .list-group -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-block" id="clearNotifications" data-dismiss="modal">Clear
                                All</button>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div> <!-- .wrapper -->

    @include('dashboard.partials.scripts')
    @yield('scripts')
</body>

</html>
