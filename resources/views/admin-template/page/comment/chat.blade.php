{{--<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css' rel='stylesheet'>--}}
<link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
<style>
    .chat-event {
        cursor: pointer;
    }

    .col-3.chat-event {
        background-repeat: no-repeat;
        background-size: 64px 64px;
        height: 64px;
        width: 64px;
    }
</style>
<div class="card">
    <div class="card-body" style="height: 418px;overflow-y: scroll">
        <h4 class="mb-4 fs-16">Bình luận về yêu cầu này</h4>
        @foreach($task->comments as $comment)
            <div class="row mt-1">
                <div class="col">
                    <div>
                        <div class="d-flex justify-content-between mb-2">
                            <div class="d-flex align-items-center">
                                <img src="{{asset('admin-asset/assets/images/users/avatar-9.jpg')}}"
                                     class="me-2 rounded-circle" height="36" alt="Arya Stark">
                                <h5 class="mt-0 mb-0 fs-14">
                                    {{ $comment->member->name }}
                                </h5>
                            </div>
                            <span class="float-end text-muted fs-12">{{ $comment->created_at }} </span>
                        </div>
                        <div class="flex-grow-1">
                            @switch($comment->type)
                                @case('media')
                                @case('media_upload')
                                <img style="max-width: 150px; max-height: 150px" src="{{$comment->content}}">
                                @break
                                @case('file')
                                <a href="{{route('download', ['file' => $comment->content])}}">{{route('download', ['file' => $comment->content])}}</a>
                                @break
                                @default
                                <p class="mt-1 mb-0 text-muted">
                                    {{ $comment->content }} 123
                                </p>
                                @break
                            @endswitch
                        </div>
                    </div> <!-- end comment -->
                    <hr>
                </div> <!-- end col -->
            </div>
        @endforeach
    </div>
    <div class="row mt-1">
        <div class="col">
            <div class="border rounded">
                <form id="chat-form" action="{{route('comment-task', $task->id)}}" class="comment-area-box"
                      method="POST">
                    @csrf
                    <textarea id="chat-textarea" name="comment" rows="3" class="form-control border-0 resize-none"
                              placeholder="Your comment..."></textarea>

                    <textarea id="chat-textarea-hidden" rows="3" class="form-control border-0 resize-none"
                              placeholder="Your comment..." hidden></textarea>
                    <div class="p-2 bg-light">
                        <div class="float-end" style="margin-bottom: 1%">
                            <a class="btn btn-primary" style="padding: 5px 10px;" type="button" data-bs-toggle="modal"
                               data-bs-target="#myModal"> <i class="far fa-file"></i> Tải tệp
                            </a>
                            <a
                                id="emoji-select"
                                class="btn btn-warning border-1"
                                style="padding: 5px 10px;"
                                type="button"
                                role="button"
                                data-bs-toggle="popover-emo"
                            ><i class="far fa-smile"></i> Emoji
                            </a>
                            <a
                                id="sticker-select"
                                class="btn btn-sm btn-danger"
                                role="button"
                                style="padding: 5px 10px;"
                                data-bs-toggle="popover"
                            ><i class="uil-comment-image"></i> Đính sticker</a>
                            <button id="chat-submit" type="submit" class="btn btn-sm btn-success"
                                    style="padding: 5px 10px;">
                                <i class="uil uil-message me-1"></i> Gửi bình luận
                            </button>
                        </div>
                    </div>
                    <input name="type" value="text" hidden>
                    <input name="media_type" value="text" hidden>
                </form>
            </div> <!-- end .border-->
        </div> <!-- end col-->
    </div>
</div>

<section class="center">
    <div hidden>
        <div data-name="popover-emoji">
            <div id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="d-flex flex-wrap" role="row">
                    <div class="col-2 p-0 chat-event" data-type="emoji"
                         data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t6/1/30/1f600.png">
                        <div role="button" tabindex="0">
                            <div><span> <img height="30" width="30" alt="😀"
                                             referrerpolicy="origin-when-cross-origin"
                                             src="https://static.xx.fbcdn.net/images/emoji.php/v9/t6/1/30/1f600.png"> </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 p-0 chat-event" data-type="emoji"
                         data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t89/1/30/1f603.png">
                        <div role="button" tabindex="0">
                            <div><span> <img height="30" width="30" alt="😃"
                                             referrerpolicy="origin-when-cross-origin"
                                             src="https://static.xx.fbcdn.net/images/emoji.php/v9/t89/1/30/1f603.png"> </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 p-0 chat-event" data-type="emoji"
                         data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/ta/1/30/1f604.png">
                        <div role="button" tabindex="0">
                            <div><span> <img height="30" width="30" alt="😄"
                                             referrerpolicy="origin-when-cross-origin"
                                             src="https://static.xx.fbcdn.net/images/emoji.php/v9/ta/1/30/1f604.png"> </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 p-0 chat-event" data-type="emoji"
                         data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t87/1/30/1f601.png">
                        <div role="button" tabindex="0">
                            <div><span> <img height="30" width="30" alt="😁"
                                             referrerpolicy="origin-when-cross-origin"
                                             src="https://static.xx.fbcdn.net/images/emoji.php/v9/t87/1/30/1f601.png"> </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 p-0 chat-event" data-type="emoji"
                         data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/tc/1/30/1f606.png">
                        <div role="button" tabindex="0">
                            <div><span> <img height="30" width="30" alt="😆"
                                             referrerpolicy="origin-when-cross-origin"
                                             src="https://static.xx.fbcdn.net/images/emoji.php/v9/tc/1/30/1f606.png"> </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 p-0 chat-event" data-type="emoji"
                         data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/tab/1/30/1f979.png">
                        <div role="button" tabindex="0">
                            <div><span> <img height="30" width="30" alt="🥹"
                                             referrerpolicy="origin-when-cross-origin"
                                             src="https://static.xx.fbcdn.net/images/emoji.php/v9/tab/1/30/1f979.png"> </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 p-0 chat-event" data-type="emoji"
                         data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t8b/1/30/1f605.png">
                        <div role="button" tabindex="0">
                            <div><span> <img height="30" width="30" alt="😅"
                                             referrerpolicy="origin-when-cross-origin"
                                             src="https://static.xx.fbcdn.net/images/emoji.php/v9/t8b/1/30/1f605.png"> </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 p-0 chat-event" data-type="emoji"
                         data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t8/1/30/1f602.png">
                        <div role="button" tabindex="0">
                            <div><span> <img height="30" width="30" alt="😂"
                                             referrerpolicy="origin-when-cross-origin"
                                             src="https://static.xx.fbcdn.net/images/emoji.php/v9/t8/1/30/1f602.png"> </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 p-0 chat-event" data-type="emoji"
                         data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t8a/1/30/1f923.png">
                        <div role="button" tabindex="0">
                            <div><span> <img height="30" width="30" alt="🤣"
                                             referrerpolicy="origin-when-cross-origin"
                                             src="https://static.xx.fbcdn.net/images/emoji.php/v9/t8a/1/30/1f923.png"> </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 p-0 chat-event" data-type="emoji"
                         data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t24/1/30/1f972.png">
                        <div role="button" tabindex="0">
                            <div><span> <img height="30" width="30" alt="🥲"
                                             referrerpolicy="origin-when-cross-origin"
                                             src="https://static.xx.fbcdn.net/images/emoji.php/v9/t24/1/30/1f972.png"> </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 p-0 chat-event" data-type="emoji"
                         data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/tc3/1/30/263a.png">
                        <div role="button" tabindex="0">
                            <div><span> <img height="30" width="30" alt="☺️"
                                             referrerpolicy="origin-when-cross-origin"
                                             src="https://static.xx.fbcdn.net/images/emoji.php/v9/tc3/1/30/263a.png"> </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 p-0 chat-event" data-type="emoji"
                         data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/tb7/1/30/1f60a.png">
                        <div role="button" tabindex="0">
                            <div><span> <img height="30" width="30" alt="😊"
                                             referrerpolicy="origin-when-cross-origin"
                                             src="https://static.xx.fbcdn.net/images/emoji.php/v9/tb7/1/30/1f60a.png"> </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 p-0 chat-event" data-type="emoji"
                         data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t8d/1/30/1f607.png">
                        <div role="button" tabindex="0">
                            <div><span> <img height="30" width="30" alt="😇"
                                             referrerpolicy="origin-when-cross-origin"
                                             src="https://static.xx.fbcdn.net/images/emoji.php/v9/t8d/1/30/1f607.png"> </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 p-0 chat-event" data-type="emoji"
                         data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t84/1/30/1f642.png">
                        <div role="button" tabindex="0">
                            <div><span> <img height="30" width="30" alt="🙂"
                                             referrerpolicy="origin-when-cross-origin"
                                             src="https://static.xx.fbcdn.net/images/emoji.php/v9/t84/1/30/1f642.png"> </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 p-0 chat-event" data-type="emoji"
                         data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1/30/1f643.png">
                        <div role="button" tabindex="0">
                            <div><span> <img height="30" width="30" alt="🙃"
                                             referrerpolicy="origin-when-cross-origin"
                                             src="https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1/30/1f643.png"> </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 p-0 chat-event" data-type="emoji"
                         data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t8f/1/30/1f609.png">
                        <div role="button" tabindex="0">
                            <div><span> <img height="30" width="30" alt="😉"
                                             referrerpolicy="origin-when-cross-origin"
                                             src="https://static.xx.fbcdn.net/images/emoji.php/v9/t8f/1/30/1f609.png"> </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div hidden>
        <div data-name="popover-sticker" style="width: 200px;height: 200px">
            <div id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    @php
                        $temporySticker = [
'https://s3.getstickerpack.com/storage/uploads/sticker-pack/love-kitten/sticker_1.gif?987a5e1b43002069876d10d43b85ec42',
'https://s3.getstickerpack.com/storage/uploads/sticker-pack/love-kitten/sticker_2.gif?987a5e1b43002069876d10d43b85ec42',
'https://s3.getstickerpack.com/storage/uploads/sticker-pack/love-kitten/sticker_3.gif?987a5e1b43002069876d10d43b85ec42',
'https://s3.getstickerpack.com/storage/uploads/sticker-pack/love-kitten/sticker_4.gif?987a5e1b43002069876d10d43b85ec42',
'https://s3.getstickerpack.com/storage/uploads/sticker-pack/love-kitten/sticker_5.gif?987a5e1b43002069876d10d43b85ec42',
'https://s3.getstickerpack.com/storage/uploads/sticker-pack/love-kitten/sticker_6.gif?987a5e1b43002069876d10d43b85ec42',
'https://s3.getstickerpack.com/storage/uploads/sticker-pack/love-kitten/sticker_7.gif?987a5e1b43002069876d10d43b85ec42',
'https://s3.getstickerpack.com/storage/uploads/sticker-pack/love-kitten/sticker_8.gif?987a5e1b43002069876d10d43b85ec42',
'https://s3.getstickerpack.com/storage/uploads/sticker-pack/love-kitten/sticker_9.gif?987a5e1b43002069876d10d43b85ec42',
    ]

                    @endphp

                    <div class="d-flex flex-wrap">
                        @foreach($temporySticker as $sticker)
                        <div class="col-3 p-0 chat-event"
                             style="background-image: url({{$sticker}});"
                             data-type="sticker"
                             data-url="{{$sticker}}"
                        >
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="d-flex flex-wrap" role="row">
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t6/1/30/1f600.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😀"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t6/1/30/1f600.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t89/1/30/1f603.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😃"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t89/1/30/1f603.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/ta/1/30/1f604.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😄"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/ta/1/30/1f604.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t87/1/30/1f601.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😁"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t87/1/30/1f601.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/tc/1/30/1f606.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😆"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/tc/1/30/1f606.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/tab/1/30/1f979.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="🥹"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/tab/1/30/1f979.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t8b/1/30/1f605.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😅"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t8b/1/30/1f605.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t8/1/30/1f602.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😂"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t8/1/30/1f602.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t8a/1/30/1f923.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="🤣"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t8a/1/30/1f923.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t24/1/30/1f972.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="🥲"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t24/1/30/1f972.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/tc3/1/30/263a.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="☺️"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/tc3/1/30/263a.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/tb7/1/30/1f60a.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😊"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/tb7/1/30/1f60a.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t8d/1/30/1f607.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😇"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t8d/1/30/1f607.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t84/1/30/1f642.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="🙂"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t84/1/30/1f642.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1/30/1f643.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="🙃"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1/30/1f643.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t8f/1/30/1f609.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😉"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t8f/1/30/1f609.png"> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Thông tin thành viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="chat-form" action="{{route('comment-task', $task->id)}}" class="comment-area-box"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="comment" onchange="loadFile(event)" required>
                        <input id="file_type" name="type" value="file" hidden>
                        <input id="file_media_type" name="media_type" value="file" hidden>
                        <img id="output" style="width: 200px; height: 200px"/>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </div>
                    </form>
                    <script>
                        const loadFile = function (event) {
                            const files = event.target.files;
                            const extension = files[0].type
                            const fileExtension = extension.split('/')[1];

                            const validFilePath = ['jpeg', 'jpg', 'png', 'gif']
                            if (validFilePath.includes(fileExtension)) {
                                $("#file_type").val('media_upload')
                            }
                            $("#file_media_type").val(fileExtension)

                            const output = document.getElementById('output');
                            output.src = URL.createObjectURL(files[0]);
                            output.onload = function () {
                                URL.revokeObjectURL(output.src) // free memory
                            }
                        };
                    </script>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</section>

{{-- Chart sticker js --}}
{{--<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>--}}
{{--<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script>--}}
{{--<script type='text/javascript' src='{{asset('admin-asset/assets/js/chat-sticker.js')}}'></script>--}}

