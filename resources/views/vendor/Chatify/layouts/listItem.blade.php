{{-- -------------------- Saved Messages -------------------- --}}
@if($get == 'saved')
    <table class="messenger-list-item" data-contact="{{ Auth::user()->id }}">
        <tr data-action="0">
            {{-- Avatar side --}}
            <td>
            <div class="saved-messages avatar av-m">
                <span class="far fa-bookmark"></span>
            </div>
            </td>
            {{-- center side --}}
            <td>
                <p data-id="{{ Auth::user()->id }}" data-type="user">Saved Messages <span>You</span></p>
                <span>Save messages secretly</span>
            </td>
        </tr>
    </table>
@endif

{{-- -------------------- Contact Item (for All Messages section) -------------------- --}}
@if($get == 'contact_item')
<table class="messenger-list-item" data-contact="{{ $user->id }}">
    <tr data-action="0">
        {{-- Avatar side --}}
        <td style="position: relative">
            @if($user->active_status)
                <span class="activeStatus"></span>
            @endif
            <div class="avatar av-m" style="background-image: url('{{ $user->avatar }}');">
                @if(isset($isModerator) && $isModerator)
                    <span class="moderator-badge" title="Moderator">M</span>
                @endif
            </div>
        </td>
        {{-- center side --}}
        <td>
            <p data-id="{{ $user->id }}" data-type="user">
                {{ strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name }}
                @if(isset($isModerator) && $isModerator)
                    <span class="moderator-tag">Moderator</span>
                @endif
                @if(isset($lastMessage) && $lastMessage)
                    <span class="contact-item-time" data-time="{{$lastMessage->created_at}}">
                        {{ $lastMessage->created_at->diffForHumans() }}
                    </span>
                @endif
            </p>
            <span>
                @if(isset($lastMessage) && $lastMessage)
                    @if($lastMessage->from_id == Auth::user()->id)
                        <span class="lastMessageIndicator">You :</span>
                    @endif
                    @if($lastMessage->attachment == null)
                        {{ Str::limit($lastMessage->body, 30) }}
                    @else
                        <span class="fas fa-file"></span> Attachment
                    @endif
                @elseif(isset($isModerator) && $isModerator)
                    <span class="no-chat-history">No chat history</span>
                @endif
                @if(isset($unseenCounter) && $unseenCounter > 0)
                    <b>{{ $unseenCounter }}</b>
                @endif
            </span>
        </td>
    </tr>
</table>
@endif

{{-- -------------------- Users List Item -------------------- --}}
@if($get == 'users' && !!$lastMessage)
<?php
$lastMessageBody = mb_convert_encoding($lastMessage->body, 'UTF-8', 'UTF-8');
$lastMessageBody = strlen($lastMessageBody) > 30 ? mb_substr($lastMessageBody, 0, 30, 'UTF-8').'..' : $lastMessageBody;
?>
<table class="messenger-list-item" data-contact="{{ $user->id }}">
    <tr data-action="0">
        {{-- Avatar side --}}
        <td style="position: relative">
            @if($user->active_status)
                <span class="activeStatus"></span>
            @endif
            <div class="avatar av-m" style="background-image: url('{{ $user->image ?? asset('/admin/dist/img/avatar.png') }}');"></div>
                </td>
        {{-- center side --}}
        <td>
        <p data-id="{{ $user->id }}" data-type="user">
            {{ strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name }}
            <span class="contact-item-time" data-time="{{$lastMessage->created_at}}">{{ $lastMessage->timeAgo }}</span></p>
        <span>
            {{-- Last Message user indicator --}}
            {!!
                $lastMessage->from_id == Auth::user()->id
                ? '<span class="lastMessageIndicator">You :</span>'
                : ''
            !!}
            {{-- Last message body --}}
            @if($lastMessage->attachment == null)
            {!!
                $lastMessageBody
            !!}
            @else
            <span class="fas fa-file"></span> Attachment
            @endif
        </span>
        {{-- New messages counter --}}
            {!! $unseenCounter > 0 ? "<b>".$unseenCounter."</b>" : '' !!}
        </td>
    </tr>
</table>
@endif

{{-- -------------------- Search Item -------------------- --}}
@if($get == 'search_item')
<table class="messenger-list-item" data-contact="{{ $user->id }}">
    <tr data-action="0">

        <td>
        <div class="avatar av-m"
        style="background-image: url('{{ $user->avatar }}');">
        </div>
        </td>

        <td>
            <p data-id="{{ $user->id }}" data-type="user">
            {{ strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name }}
        </td>
    </tr>
</table>
@endif

{{-- -------------------- Shared photos Item -------------------- --}}
@if($get == 'sharedPhoto')
<div class="shared-photo chat-image" style="background-image: url('{{ $image }}')"></div>
@endif

{{-- -------------------- Favorite Item -------------------- --}}
@if($get == 'favorite_item')
<table class="messenger-list-item" data-contact="{{ $user->id }}">
    <tr data-action="0">
        {{-- Avatar side --}}
        <td style="position: relative">
            @if($user->active_status)
                <span class="activeStatus"></span>
            @endif
        <div class="avatar av-m"
             style="background-image: url('{{ $user->avatar }}');">
        </div>
        </td>
        {{-- center side --}}
        <td>
            <p data-id="{{ $user->id }}" data-type="user">
                {{ strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name }}
            </p>
            <span class="favorite-message">
                <span class="fas fa-star"></span>
            </span>
        </td>
    </tr>
</table>
@endif


