<div class="col-md-3 d-flex align-items-stretch">
    <div class="row flex-grow">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Mail Box</h4>
                    <a href="{{route('user.messaging.create')}}" class="btn btn-secondary btn-fw col-12">
                        <i class="fa fa-plus-circle"></i>Compose</a>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <i class="fa fa-envelope"></i>
                            <a href="{{route('user.messaging.index')}}">Inbox</a>
                            <span class="badge badge-primary badge-pill">{{$totalInbox->count()}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <i class="fa fa-send"></i>
                            <a href="{{route('user.messaging.sent')}}">Sent</a>
                            <span class="badge badge-primary badge-pill">{{$totalSent->count()}}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                           <i class="fa fa-star"></i>
                            <a href="{{route('user.messaging.starredMessage')}}">Starred</a>

                            <span class="badge badge-primary badge-pill">{{$totalStarred->count()}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <i class="fa fa-trash"></i>
                            <a href="{{route('user.messaging.deleted')}}">Deleted</a>

                            <span class="badge badge-primary badge-pill">{{$totalDeleted->count()}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <i class="fa fa-users"></i>
                            <a href="{{route('user.users.index')}}">Contact</a>

                            <span class="badge badge-primary badge-pill">{{$countUsers->count()}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
