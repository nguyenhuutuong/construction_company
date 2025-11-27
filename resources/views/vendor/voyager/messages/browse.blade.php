@extends('voyager::master')

@section('content')
    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        @forelse($dataTypeContent as $message)
                            <div class="message-item @if($message->is_read) read @else unread @endif">
                                <div class="message-sender">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $message->name }}</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></li>
                                            <li><a href="tel:{{ $message->phone }}">{{ $message->phone }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="message-date">{{ $message->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="message-body">{{ $message->message }}</div>
                                <div class="message-actions">
                                    @if($message->replies_count > 0)
                                        <span class="badge badge-success"><i class="voyager-check"></i> Replied</span>
                                    @else
                                        <span class="badge badge-warning"><i class="voyager-mail"></i> Not Replied</span>
                                    @endif

                                    <div class="pull-right">
                                        @if($message->replies_count > 0)
                                            <button class="btn btn-sm btn-success" data-toggle="collapse" data-target="#replies-{{ $message->id }}">
                                                <i class="voyager-eye"></i> View Replies
                                            </button>
                                        @endif
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#replyModal" data-id="{{ $message->id }}">
                                            <i class="voyager-paper-plane"></i> Reply
                                        </button>
                                    </div>
                                </div>
                            </div>

                            @if($message->replies->isNotEmpty())
                                <div id="replies-{{ $message->id }}" class="collapse well" style="margin-top: 15px;">
                                    <h4>Replies:</h4>
                                    @foreach($message->replies as $reply)
                                        <div class="reply-item" style="padding: 10px; border-bottom: 1px solid #f1f1f1;">
                                            <div class="reply-sender">
                                                <strong>{{ $reply->name }}</strong> ({{ $reply->email }})
                                                <span class="reply-date pull-right" style="color: #777;">{{ $reply->created_at->format('d/m/Y H:i A') }}</span>
                                            </div>
                                            <div class="reply-body" style="margin-top: 5px;">
                                                {{ $reply->message }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <hr>
                        @empty
                            <p>No messages.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Reply Modal --}}
    <div class="modal fade" id="replyModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Phản hồi tin nhắn</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('voyager.messages.reply') }}" id="replyForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="parent_id" value="">
                        <div class="form-group">
                            <label for="message">Nội dung</label>
                            <textarea name="message" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
<script>
    $(document).ready(function() {
        // Set parent_id in the reply modal when it opens
        $('#replyModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var messageId = button.data('id');
            var modal = $(this);
            modal.find('input[name="parent_id"]').val(messageId);
        });
    });
</script>
@endpush
